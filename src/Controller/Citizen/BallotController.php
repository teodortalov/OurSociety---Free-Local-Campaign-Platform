<?php
declare(strict_types=1);

namespace OurSociety\Controller\Citizen;

use OurSociety\Controller\AppController;
use OurSociety\Model\Entity\Contest;
use OurSociety\Model\Entity\Election;
use OurSociety\Model\Entity\ElectoralDistrict;
use OurSociety\Model\Table\ElectionsTable;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Ballot Controller
 */
class BallotController extends AppController
{
    public function index(): ?Response
    {
        $user = $this->getIdentity();

        $electoralDistrictsTable = $this->loadModel('ElectoralDistricts');

        /** @var ElectoralDistrict $electoralDistrict */
        $electoralDistrict = $user->electoral_district;
        $elections = [[]];

        while ($electoralDistrict->parent !== null) {
            $electoralDistrict = $electoralDistrictsTable->find()->where([
                'id' => $electoralDistrict->parent->id,
            ])->contain(['Elections'])->firstOrFail();

            if (count($electoralDistrict->elections) > 0) {
                $elections[] = $electoralDistrict->elections;
            }
        }

        /** @var Election[] $elections */
        $elections = array_merge(...$elections);

        if (count($elections) === 1) {
            return $this->redirect(['_name' => 'citizen:ballot', 'election' => $elections[0]->slug]);
        }

        $this->set(compact('elections'));

        return null;
    }

    public function view(string $electionSlug): ?Response
    {
        $this->viewBuilder()->setLayout('site'); // TODO: Remove when default layout is Bootstrap 4.

        $user = $this->getIdentity();

        $senateOfficeType = $electionsTable = $this->loadModel('OfficeTypes')->find('list',
            [
                'conditions' => ['name' => 'Senate']
            ]
        );

        $senate = array_keys($senateOfficeType->toArray());
        $senate = reset($senate);

        /** @var ElectionsTable $electionsTable */
        $electionsTable = $this->loadModel('Elections');
        $election = $electionsTable->find('slugged', ['slug' => $electionSlug])->firstOrFail();

        /** @var ElectoralDistrict $electoralDistrict */
        $electoralDistrict = $user->electoral_district;
        $contests = [[]];
        do {
            $electoralDistrict = $electionsTable->ElectoralDistricts->find()
                ->where([
                    'ElectoralDistricts.id' => $electoralDistrict->parent->id,
                ])
                ->contain([
                    'Contests' => [
                        'Candidates' => [
                            'CandidatePreElectionStatuses',
                            'CandidatePostElectionStatuses',
                            'Politician'
                        ],
                        'Offices',
                    ],
                ])
                ->firstOrFail();

            if (count($electoralDistrict->contests) > 0) {
                $contests[] = $electoralDistrict->contests;
            }
        } while ($electoralDistrict->parent !== null);

        /** @var Contest[] $contests */
        $contests = collection(array_merge(...$contests))
            ->filter(function (Contest $contest) use ($election): bool {
                return $contest->election_id === $election->id;
            })
            ->toArray();


        $this->set(compact('election', 'contests', 'senate'));

        return null;
    }
}
