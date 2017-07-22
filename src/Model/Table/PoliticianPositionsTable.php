<?php
declare(strict_types = 1);

namespace OurSociety\Model\Table;

use Cake\Datasource\EntityInterface as Entity;
use Cake\ORM\Association;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use OurSociety\Model\Entity\PoliticianPosition;

/**
 * PoliticianPositions Model
 *
 * @property PoliticiansTable|Association\BelongsTo $Politicians
 *
 * @method PoliticianPosition get($primaryKey, $options = [])
 * @method PoliticianPosition newEntity($data = null, array $options = [])
 * @method PoliticianPosition[] newEntities(array $data, array $options = [])
 * @method PoliticianPosition|bool save(Entity $entity, $options = [])
 * @method PoliticianPosition patchEntity(Entity $entity, array $data, array $options = [])
 * @method PoliticianPosition[] patchEntities($entities, array $data, array $options = [])
 * @method PoliticianPosition findOrCreate($search, callable $callback = null, $options = [])
 */
class PoliticianPositionsTable extends AppTable
{
    /**
     * {@inheritdoc}
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->belongsTo('Politicians', ['className' => UsersTable::class]);
    }

    /**
     * {@inheritdoc}
     */
    public function validationDefault(Validator $validator): Validator
    {
        return parent::validationDefault($validator)
            // name
            ->notEmpty('name')
            ->requirePresence('name', 'create')
            // company
            ->notEmpty('company')
            ->requirePresence('company', 'create')
            // started
            ->date('started')
            ->notEmpty('started')
            ->requirePresence('started', 'create')
            // ended
            ->allowEmpty('ended')
            ->date('ended');
    }

    /**
     * {@inheritdoc}
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        return parent::buildRules($rules)
            ->add($rules->existsIn(['politician_id'], 'Politicians'));
    }
}