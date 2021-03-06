<?php
/**
 * @var \OurSociety\View\AppView $this The view.
 * @var \OurSociety\Model\Entity\User $politician The politician.
 */
?>

<div class="media">
    <div class="media-body">
        <div class="row">
            <div class="col">
                <h4 class="media-heading">
                    <?= __('Education') ?>
                </h4>
            </div>
            <div class="col-auto">
                <?= $this->fetch('actions_education') ?>
            </div>
        </div>
        <?php if (count($politician->qualifications) === 0): ?>
            <p><?= __("This representative hasn't added any qualifications.") ?></p>
        <?php else: ?>
            <ul>
                <?php foreach ($politician->qualifications as $qualification): ?>
                    <li>
                        <strong><?= $qualification->name ?></strong>,
                        <?= $qualification->institution ?>
                        <span class="text-muted small">
                            <?= sprintf(
                                '%s–%s',
                                $qualification->started->toFormattedDateString(),
                                $qualification->ended ? $qualification->ended->toFormattedDateString() : 'Present'
                            ) ?>
                        </span>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </div>
</div>
