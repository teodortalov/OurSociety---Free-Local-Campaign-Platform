<?php
declare(strict_types=1);

namespace OurSociety\Controller\Citizen;

use Cake\ORM\TableRegistry;
use OurSociety\Controller\AppController;
use Psr\Http\Message\ResponseInterface as Response;

class DashboardController extends AppController
{
    /**
     * @route GET /citizen
     * @routeName citizen:dashboard
     */
    public function dashboard(): ?Response
    {
        $this->Auth->refreshSession();

        $user = $this->getCurrentUser();

        if ($user->answer_count === 0) {
            $this->Flash->info(__('Please answer the following questions, then we will take you to your dashboard.'));

            return $this->redirect(['_name' => 'citizen:questions']);
        }

        $this->set([
            'levelQuestionTotal' => TableRegistry::get('Questions')->getLevelQuestionTotal($user),
            'politicianMatch' => TableRegistry::get('ValueMatches')->find()->contain(['Politicians'])->where([
                'citizen_id' => $user->id,
                'category_id IS' => null,
            ])->first(),
        ]);

        return null;
    }
}
