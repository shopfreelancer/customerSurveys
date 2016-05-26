<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Surveys Question'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="surveysQuestions index large-9 medium-8 columns content">
    <h3><?= __('Surveys Questions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('weighting') ?></th>
                <th><?= $this->Paginator->sort('position') ?></th>
                <th><?= $this->Paginator->sort('surveys_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($surveysQuestions as $surveysQuestion): ?>
            <tr>
                <td><?= $this->Number->format($surveysQuestion->id) ?></td>
                <td><?= h($surveysQuestion->title) ?></td>
                <td><?= $this->Number->format($surveysQuestion->weighting) ?></td>
                <td><?= $this->Number->format($surveysQuestion->position) ?></td>
                <td><?= $surveysQuestion->has('survey') ? $this->Html->link($surveysQuestion->survey->title, ['controller' => 'Surveys', 'action' => 'view', $surveysQuestion->survey->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $surveysQuestion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $surveysQuestion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $surveysQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveysQuestion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
