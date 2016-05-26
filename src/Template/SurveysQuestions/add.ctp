<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Surveys Questions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="surveysQuestions form large-9 medium-8 columns content">
    <?= $this->Form->create($surveysQuestion) ?>
    <fieldset>
        <legend><?= __('Add Surveys Question') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('weighting');
            echo $this->Form->input('position');
            echo $this->Form->input('surveys_id', ['options' => $surveys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
