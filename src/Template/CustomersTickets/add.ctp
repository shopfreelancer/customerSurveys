<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Customers Tickets'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="customersTickets form large-9 medium-8 columns content">
    <?= $this->Form->create($customersTicket) ?>
    <fieldset>
        <legend><?= __('Add Customers Ticket') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('comment');
            echo $this->Form->input('hours');
            echo $this->Form->input('minutes');
            echo $this->Form->input('price_rate');
            echo $this->Form->input('active');
            echo $this->Form->input('customers_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
