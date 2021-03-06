<?php
declare(strict_types=1);

namespace OurSociety\Model\Table;

use Cake\Datasource\EntityInterface as Entity;
use Cake\Localized\Validation\UsValidation;
use Cake\ORM\Association;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Utility\Text;
use Cake\Validation as Cake;
use Josegonzalez\Upload\Model\Behavior\UploadBehavior;
use OurSociety\Model\Behavior\CounterCacheBehavior;
use OurSociety\Model\Behavior\SearchEngineBehavior;
use OurSociety\Model\Entity\User;
use OurSociety\Model\Entity\ValueMatch;
use OurSociety\ORM\TableRegistry;
use OurSociety\Validation\Validator as AppValidator;

/**
 * Users Model
 *
 * @property AnswersTable|Association\HasMany $Answers
 * @property CategoriesTable|Association\BelongsToMany $Categories
 * @property NotificationsTable|Association\HasMany $Notifications
 * @property ValueMatchesTable|Association\HasMany $ValueMatches
 *
 * @method Query findById(string $name)
 * @method Query findByName(string $name)
 * @method Query findByRole(string $role)
 * @method User get($primaryKey, $options = [])
 * @method User newEntity($data = null, array $options = [])
 * @method User[] newEntities(array $data, array $options = [])
 * @method User|bool save(Entity $entity, $options = [])
 * @method User patchEntity(Entity $entity, array $data, array $options = [])
 * @method User[] patchEntities($entities, array $data, array $options = [])
 * @method User findOrCreate($search, callable $callback = null, $options = [])
 * @method UsersTable static instance(?string $alias = null, ?array $options = [])
 */
class UsersTable extends AppTable
{
    use Users\SearchConfiguration;

    public const ERROR_EMAIL_UNIQUE = 'This email address is already in use. Each account must have a unique email address.';

    public const ERROR_ROLE_NOT_IN_LIST = 'The only valid roles are "{0}".';

    public const LIMIT_DASHBOARD = 5;

    public static function instance(array $options = null): self
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return TableRegistry::get('Users', $options ?? []);
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->addBehavior(SearchEngineBehavior::class, [
            //'finder' => 'publicSearch' // TODO: Caused infinite nesting when running `bin/cake search import users`
        ]);
        $this->hasMany('Answers');
        $this->hasMany('Notifications');
        $this->belongsToMany('Categories');
        $this->belongsTo('OfficeTypes');
        $this->belongsTo('ElectoralDistricts')->setFinder('isMunicipality')->setStrategy('select');
        $this->belongsToMany('PoliticianMatches', [
            'joinTable' => 'value_matches',
            'through' => 'ValueMatches',
            'className' => self::class,
            'foreignKey' => 'citizen_id',
            'targetForeignKey' => 'politician_id',
        ]);
        $this->hasMany('ValueMatches')->setForeignKey('citizen_id');

        $this->addBehavior(CounterCacheBehavior::class, [
            'ElectoralDistricts' => [
                'citizen_count' => ['finder' => 'isCitizen'],
                'politician_count' => ['finder' => 'isPolitician'],
            ],
        ]);
        //$this->addBehavior('CakeDC/Enum.Enum', ['lists' => ['role' => ['strategy' => 'const', 'prefix' => 'ROLE']]]);
        $this->addBehavior(UploadBehavior::class, [
            'picture' => [
                'path' => 'webroot{DS}upload{DS}profile{DS}picture{DS}{primaryKey}',
                'nameCallback' => function ($data, $options): string {
                    $filename = Text::uuid();

                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                    if ($extension !== '') {
                        $filename .= '.' . $extension;
                    }

                    return $filename;
                },
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Cake\ORM\Table::validateUnique
     */
    public function validationDefault(Cake\Validator $validator): AppValidator
    {
        return parent::validationDefault($validator)
            ->setProvider('default', new Cake\Validation)// TODO: Find out why our validation class breaks email validation.
            // email
            //->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __(self::ERROR_EMAIL_UNIQUE)]) // TODO: Breaks reset password action
            //->email('email', false, 'Please enter a valid email address')
            ->notBlank('email')
            ->requirePresence('email', 'create')
            // zip
            ->setProvider('us', UsValidation::class)
            ->add('zip', 'zip', ['rule' => 'postal', 'provider' => 'us', 'message' => 'Please enter a valid ZIP code (e.g. 12345 or 12345-6789)'])
            // password
            ->minLength('password', 4)// TODO: This is after hashing :(
            ->requirePresence('password', 'create')
            // name
            ->notBlank('name')
            ->requirePresence('name', 'create')
            // token
            ->allowEmpty('token')
            // picture
            ->allowEmpty('picture')
            // token_expires
            ->allowEmpty('token_expires')
            ->dateTime('token_expires')
            // verified
            ->allowEmpty('verified')
            ->dateTime('verified')
            // role
            ->inList('role', User::ROLES, __(self::ERROR_ROLE_NOT_IN_LIST, implode('", "', User::ROLES)))
            ->notBlank('role')
            //->requirePresence('role', 'create') // TODO: Breaks registration
            // answer_count
            ->integer('answer_count')
            ->notEmpty('answer_count')
            //->requirePresence('answer_count', 'create') // TODO: Breaks registration
            // born
            ->allowEmpty('born')
            //->date('born') // TODO: Broken since validation changes.
            // last_seen
            ->allowEmpty('last_seen')
            ->dateTime('last_seen');
    }

    /**
     * {@inheritdoc}
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        return parent::buildRules($rules)
            ->add($rules->isUnique(['email'], __(self::ERROR_EMAIL_UNIQUE)));
    }

    public function getListGroupedByRole(): Query
    {
        return $this
            ->find('list', ['keyField' => 'slug', 'groupField' => 'role'])
            ->order(['Users.role' => 'ASC', 'Users.name' => 'ASC']);
    }

    public function getBySlug(string $slug, string $role = null): Entity
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this
            ->find('slugged', ['slug' => $slug])
            ->find('politicianForCitizen', ['role' => $role ?? User::ROLE_CITIZEN])
            ->firstOrFail();
    }

    /**
     * Get value match.
     *
     * @param User $userFrom
     * @param User $userTo
     * @return float The value match percentage.
     */
    public function getMatchPercentage(User $userFrom, User $userTo): float
    {
        if ($userFrom->id === $userTo->id) {
            return 100;
        }

        /** @var ValueMatch $match */
        $match = $this->ValueMatches->find()->where([
            'citizen_id' => $userFrom->id,
            'politician_id' => $userTo->id,
            'category_id IS' => null,
        ])->first();

        return $match !== null ? $match->true_match_percentage : 0;
    }
}
