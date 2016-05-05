<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customers Ticket'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersTickets index large-9 medium-8 columns content">
    <h3><?= __('Customers Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('customers_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customersTickets as $customersTicket): ?>
            <tr>
                <td><?= $this->Number->format($customersTicket->id) ?></td>
                <td><?= h($customersTicket->title) ?></td>
                <td><?= h($customersTicket->created) ?></td>
                <td><?= $this->Number->format($customersTicket->active) ?></td>
                <td><?= h($customersTicket->Customers->companyname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customersTicket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customersTicket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customersTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersTicket->id)]) ?>
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
