<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List CustomerSurveys'), ['action' => 'surveys', $customer->id]) ?> </li>

    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Firstname') ?></th>
            <td><?= h($customer->firstname) ?></td>
        </tr>
        <tr>
            <th><?= __('Lastname') ?></th>
            <td><?= h($customer->lastname) ?></td>
        </tr>
        <tr>
            <th><?= __('Salutation') ?></th>
            <td><?= h($customer->salutation) ?></td>
        </tr>
        <tr>
            <th><?= __('Companyname') ?></th>
            <td><?= h($customer->companyname) ?></td>
        </tr>
        <tr>
            <th><?= __('Street') ?></th>
            <td><?= h($customer->street) ?></td>
        </tr>
        <tr>
            <th><?= __('Postcode') ?></th>
            <td><?= h($customer->postcode) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($customer->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Country Id') ?></th>
            <td><?= h($customer->country_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($customer->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Www') ?></th>
            <td><?= h($customer->www) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Ustid') ?></th>
            <td><?= h($customer->ustid) ?></td>
        </tr>
        <tr>
            <th><?= __('Taxnumber') ?></th>
            <td><?= h($customer->taxnumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
    </table>
</div>

<?php
if($customersTickets->first()){
   include('customer_tickets.ctp');
}
?>
