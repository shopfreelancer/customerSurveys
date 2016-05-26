<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Surveys Question'), ['action' => 'edit', $surveysQuestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Surveys Question'), ['action' => 'delete', $surveysQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveysQuestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Surveys Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Surveys Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="surveysQuestions view large-9 medium-8 columns content">
    <h3><?= h($surveysQuestion->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($surveysQuestion->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Survey') ?></th>
            <td><?= $surveysQuestion->has('survey') ? $this->Html->link($surveysQuestion->survey->title, ['controller' => 'Surveys', 'action' => 'view', $surveysQuestion->survey->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($surveysQuestion->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weighting') ?></th>
            <td><?= $this->Number->format($surveysQuestion->weighting) ?></td>
        </tr>
        <tr>
            <th><?= __('Position') ?></th>
            <td><?= $this->Number->format($surveysQuestion->position) ?></td>
        </tr>
    </table>
</div>
