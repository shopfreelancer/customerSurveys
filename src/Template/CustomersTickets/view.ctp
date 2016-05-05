<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customers Ticket'), ['action' => 'edit', $customersTicket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customers Ticket'), ['action' => 'delete', $customersTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersTicket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customers Ticket'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customersTickets view large-9 medium-8 columns content">
    <h3><?= h($customersTicket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($customersTicket->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customersTicket->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $this->Number->format($customersTicket->active) ?></td>
        </tr>
        <tr>
            <th><?= __('Customers Id') ?></th>
            <td><?= $this->Number->format($customersTicket->customers_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($customersTicket->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($customersTicket->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($customersTicket->comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Hours') ?></h4>
        <?= $this->Text->autoParagraph(h($customersTicket->hours)); ?>
    </div>
    <div class="row">
        <h4><?= __('Minutes') ?></h4>
        <?= $this->Text->autoParagraph(h($customersTicket->minutes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Price Rate') ?></h4>
        <?= $this->Text->autoParagraph(h($customersTicket->price_rate)); ?>
    </div>
</div>
