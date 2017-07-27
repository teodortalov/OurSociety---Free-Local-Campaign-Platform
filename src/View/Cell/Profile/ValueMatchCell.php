<?php
declare(strict_types=1);

namespace OurSociety\View\Cell\Profile;

use Cake\View\Cell;
use OurSociety\Model\Entity\User;
use OurSociety\Model\Table\UsersTable;

/**
 * Picture cell
 */
class ValueMatchCell extends Cell
{
    private const LIMIT = 4;

    /**
     * Default display method.
     *
     * @param User $politician
     * @param User|null $citizen
     * @param int|null $limit
     * @return void
     */
    public function display(User $politician, ?User $citizen = null, ?int $limit = self::LIMIT): void
    {
        /** @var UsersTable $users */
        $users = $this->loadModel('Users');
        $citizen = $citizen ?: $politician;

        $this->set([
            'currentUser' => $this->request->session()->read('Auth.User'),
            'match' => $users->getMatchPercentage($citizen, $politician),
            'similarities' => $users->Categories->getMatchPercentages($citizen, $politician, false, $limit)->toArray(),
            'differences' => $users->Categories->getMatchPercentages($citizen, $politician, true, $limit)->toArray(),
            'politician' => $politician,
            'limit' => $limit,
        ]);
    }

    public function topics(string $name, array $topics): void
    {
        $this->set(['name' => $name, 'topics' => $topics]);
    }
}
