<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="nav sidebar-menu">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customers Survey'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersSurveys content">
    <h3><?= __('Customers Surveys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customersSurveys as $customersSurvey): ?>
            <tr>
                <td><?= $this->Number->format($customersSurvey->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customersSurvey->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customersSurvey->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customersSurvey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersSurvey->id)]) ?>
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
