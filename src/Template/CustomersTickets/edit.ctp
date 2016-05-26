<?php
$this->start('sidebar');
echo '<li>'. $this->Html->link('<i class="fa fa-dashboard"></i>'. __('Customers Details'), ['controller' => 'Customers','action' => 'view',$customersTicket->customers_id],['escape'=>false]) .'</li>';
echo '<li>'. $this->Form->postLink(
        '<i class="fa fa-remove"></i>'.
    __('Delete Ticket'),
    ['action' => 'delete', $customersTicket->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $customersTicket->id),'escape'=>false]
    ) .'</li>';
echo '<li>'. $this->Html->link('<i class="fa fa-plus-circle"></i>'.__('New Ticket'), ['controller' => 'CustomersTickets', 'action' => 'add',$customersTicket->customers_id],['escape'=>false])  .'</li>';
$this->end();
?>

<div class="customersTickets form-horizontal">
    <?= $this->Form->create($customersTicket) ?>
    <fieldset>
        <legend><?= __('Edit Customers Ticket') ?></legend>
        <div class="form-group">
            <?= $this->Form->label('title', null, ['class' => 'control-label col-xs-2']) ?>
            <div class="col-xs-10">
                <?= $this->Form->text('title',['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->label('description', null, ['class' => 'control-label col-xs-2']) ?>
            <div class="col-xs-10">
                <?= $this->Form->textarea('description',['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->label('comment', null, ['class' => 'control-label col-xs-2']) ?>
            <div class="col-xs-10">
                <?= $this->Form->textarea('comment',['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->label('price_rate', null, ['class' => 'control-label col-xs-2']) ?>
            <div class="col-xs-10">
                <?= $this->Form->text('price_rate',['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->label('ticket_time', null, ['class' => 'control-label col-xs-2']) ?>
            <div class="col-xs-10">
                <?= $this->Form->time('ticket_time') ?>
            </div>


        </div>
        <div class="form-group">
            <?= $this->Form->label('price_rate', null, ['class' => 'control-label col-xs-2']) ?>
            <div class="col-xs-10">
                <?= $this->Form->text('price_rate',['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?php ;?>
            <?= $this->Form->label('status', null, ['class' => 'control-label col-xs-2']) ?>
            <div class="col-xs-10">
                <?= $this->Form->select('status',$customersTicket->allStatusNames,['class' => 'form-control']) ?>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>