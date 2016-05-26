
<?php
$this->start('sidebar');
echo '<li>'. $this->Html->link('<i class="fa fa-files-o"></i>'. __('List Customers'), ['controller' => 'Customers','action' => 'index'],['escape'=>false]) .'</li>';
echo '<li>'. $this->Html->link('<i class="fa fa-pencil"></i>'. __('Edit Customer'), ['controller' => 'Customers','action' => 'edit',$customer->id],['escape'=>false]) .'</li>';

echo '<li>'. $this->Form->postLink(
        '<i class="fa fa-remove"></i>'.
        __('Delete Customer'),
        ['action' => 'delete', $customer->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id),'escape'=>false]
    ) .'</li>';
echo '<li>'. $this->Html->link('<i class="fa fa-plus-circle"></i>'.__('New Ticket'), ['controller' => 'CustomersTickets', 'action' => 'add',$customer->id],['escape'=>false])  .'</li>';
echo '<li>'. $this->Html->link('<i class="fa fa-file-o"></i>'.__('List CustomerSurveys'), ['action' => 'surveys', $customer->id],['escape'=>false]) . '</li>';

$this->end();
?>

<div class="customers view large-9 medium-8 columns content">
    <table class="table table-striped">
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
            <th><?= __('Country') ?></th>
            <td><?= h($customer->countryName) ?></td>
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
