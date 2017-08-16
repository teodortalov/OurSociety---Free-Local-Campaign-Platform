<?php
/**
 * @var \OurSociety\View\AppView $this
 */

$this->Breadcrumbs->add('Dashboards');
$this->Breadcrumbs->add('Dashboard Overview');

$this->extend('/Common/Dashboard/dashboard');

$this->start('dashboard');
$numbers = [
    ['name' => 'questions_answered_total', 'label' => 'Above 90%', 'style' => 'green', 'icon' => 'percent'],
    ['name' => 'questions_answered_citizens', 'label' => 'Above 80%', 'style' => 'green', 'icon' => 'percent'],
    ['name' => 'questions_answered_politicians', 'label' => 'Above 60%', 'style' => 'blue', 'icon' => 'percent'],
    ['name' => 'questions_percentage_total', 'label' => 'Above 40%', 'style' => 'blue', 'icon' => 'percent'],
    ['name' => 'questions_percentage_citizens', 'label' => 'Above 20%', 'style' => 'pink', 'icon' => 'percent'],
    ['name' => 'questions_percentage_politicians', 'label' => 'Below 10%', 'style' => 'pink', 'icon' => 'percent'],
];
?>
<div class="row pb-3">
    <?php foreach ($numbers as $number): ?>
        <div class="col-6 col-sm-4 col-xl-2">
            <?= $this->cell(
                'Dashboard/NumberWidget',
                [],
                ['period' => $this->request->getQuery('range', 'week')] + $number
            ) ?>
        </div>
    <?php endforeach ?>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <canvas id="chartVotes" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <canvas id="chartVotes" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <canvas id="chartVotes" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<?php $this->end() ?>
