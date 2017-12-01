<?php

use OurSociety\View\Component\Button\ToggleButton;

/**
 * @var \OurSociety\View\AppView $this The view class.
 * @var \OurSociety\Model\Entity\User $identity The currently logged in user.
 * @var \OurSociety\Model\Entity\Article $article The currently viewed article.
 * @var \OurSociety\Model\Entity\ElectoralDistrict $municipality The currently viewed municipality.
 */

$this->extend('/Common/Articles/view');

if ($identity && $identity->isInMunicipality($municipality)) {
    $this->Breadcrumbs->add(__('My Municipality'), $municipality->getRoute());
} else {
    $this->Breadcrumbs->add(__('Municipalities'), $municipality->getBrowseRoute());
    $this->Breadcrumbs->add($municipality->name, $municipality->getRoute());
}
$this->Breadcrumbs->add(__('Articles'), $municipality->getArticlesRoute());
$this->Breadcrumbs->add($article->name);

if ($article):
    $this->start('actions');
    echo $this->Component->render(new \OurSociety\View\Component\Button\ButtonGroup([
        new ToggleButton($article, [
            'field' => 'published',
            'title' => ['Publish', 'Unpublish'],
            'url' => [
                'prefix' => 'admin',
                'controller' => 'Articles',
                'action' => 'toggle_published',
                $article->slug,
            ],
        ]),
        new ToggleButton($article, [
            'field' => 'approved',
            'title' => ['Approve', 'Reject'],
            'url' => [
                'prefix' => 'admin',
                'controller' => 'Articles',
                'action' => 'toggle_approved',
                $article->slug,
            ],
        ]),
    ]));
    $this->end();
endif;
