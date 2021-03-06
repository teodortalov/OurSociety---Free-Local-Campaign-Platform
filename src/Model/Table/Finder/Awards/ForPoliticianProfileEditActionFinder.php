<?php
declare(strict_types=1);

namespace OurSociety\Model\Table\Finder\Awards;

use Cake\ORM\Query;
use OurSociety\Model\Table\Finder\Finder;

class ForPoliticianProfileEditActionFinder extends Finder
{
    public function __invoke(Query $query, array $options = []): Query
    {
        $identity = $this->getIdentity($options);

        return $query->select([
            $this->aliasField($query, 'id'),
            $this->aliasField($query, 'name'),
            $this->aliasField($query, 'description'),
            $this->aliasField($query, 'obtained'),
        ])->matching('Politicians', function (Query $query) use ($identity): Query {
            return $query->where([
                $this->aliasField($query, 'id') => $identity->id,
            ]);
        });
    }
}
