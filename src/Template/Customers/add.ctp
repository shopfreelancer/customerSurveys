<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="customers form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Add Customer') ?></legend>
        <?php
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('salutation');
            echo $this->Form->input('companyname');
            echo $this->Form->input('street');
            echo $this->Form->input('postcode');
            echo $this->Form->input('city');
            echo $this->Form->input('country_id');
            echo $this->Form->input('phone');
            echo $this->Form->input('www');
            echo $this->Form->input('email');
            echo $this->Form->input('ustid');
            echo $this->Form->input('taxnumber');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
