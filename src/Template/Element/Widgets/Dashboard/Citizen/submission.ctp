<?php
/**
 * @var \OurSociety\View\AppView $this The view.
 * @var \OurSociety\Model\Entity\User $identity The currently logged in user.
 * @var \OurSociety\Model\Entity\Submission|null $submission The entity to use as form context.
 */

$submission = $submission ?? \OurSociety\ORM\TableRegistry::get('Submissions')->newEntity();
?>

<div class="card mb-3">
    <h4 class="card-header">
        <?= __('What should OurSociety be thinking about?') ?>
    </h4>
    <div class="card-body">
        <div class="row">
            <div class="col-lg">
                <p>
                    <?= __('OurSociety functions best when our thoughts and ideas are challenged to grow.') ?>
                    <?= __(
                        'Questions submitted by our Citizen Users may be added to our Societal Value question database ' .
                        'and/or be used when asking candidates with opposing viewpoints to debate specific questions or topics.'
                    ) ?>
                </p>
                <p>
                    <?= __('We encourage thoughtful questions about the challenges you view our society facing.') ?>
                    <?= __('Please include any source/reference data you feel would contribute to the dialogue.') ?>
                </p>
            </div>
            <div class="col-lg">
                <?= $this->Form->create($submission, [
                    'url' => ['controller' => 'Submissions', 'action' => 'add'],
                ]) ?>
                <?= $this->Form->hidden('user_id', ['value' => $identity->id]) ?>
                <?= $this->Form->control('body', [
                    'type' => 'textarea',
                    'label' => false,
                    'placeholder' => __('Type your question here - be sure to read the participation guidelines!'),
                ]) ?>
                <div class="row">
                    <div class="col-sm">
                        <p class="small text-muted">
                            <?= __('Read our {participation_guidelines} here.', [
                                'participation_guidelines' => $this->Html->link(
                                    __('participation guidelines'),
                                    '/participation-guidelines'
                                ),
                            ]) ?>
                        </p>
                    </div>
                    <div class="col-sm-auto">
                        <?= $this->Form->submit('Submit your question', ['class' => ['btn-secondary']]) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
