<?php
/**
 * @var \OurSociety\View\AppView $this The view class.
 * @var \OurSociety\Model\Entity\User $identity The currently logged in user.
 * @var \OurSociety\Model\Entity\Article $article The currently viewed article.
 * @var \OurSociety\Model\Entity\User $politician The currently viewed politician.
 */

$this->extend('/Common/Articles/view');

$this->Breadcrumbs->add(__('Dashboard'), $identity->getDashboardRoute());
$this->Breadcrumbs->add(__('Representatives'), ['_name' => 'politicians']);
$this->Breadcrumbs->add($politician->name, $politician->getPublicProfileRoute());
$this->Breadcrumbs->add(__('Articles'), $politician->getPublicProfileRoute(['#' => 'articles']));
$this->Breadcrumbs->add($article->name);
