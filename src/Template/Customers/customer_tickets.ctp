<h2>Customer Tickets</h2>
<div class="filter-column row">
    <?= $this->Form->create('customersTicketStatus') ?>
    <?= '<div class="col-xs-12 col-sm-2">'.$this->Form->label('customersTicketsStatus', 'Filter by Ticket Status').'</div>' ?>
    <div id="js_customer_tickets_status_filter" class="col-xs-12 col-sm-4">
        <?php echo $this->Form->select(
            'customersTicketsStatus',
            $customersTickets->first()->allStatusNames, [
                'empty' => 'show all',
                'value' => $customersTicketsStatus,
                'class'=> "form-control"
            ]
        );
        ?>
    </div>
    <?= $this->Form->end() ?>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th>Title</th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($customersTickets as $ticket): ?>
            <?= '<tr>'; ?>
            <?= '<td>'.$ticket->id.'</td>'; ?>
            <?= '<td>' .$ticket->title.'</td>'; ?>
            <?= '<td>' .$ticket->created->format('d.m.Y').'</td>'; ?>
            <?= '<td>' .$ticket->ticketStatusName.'</td>'; ?>
            <?= '<td>'.$this->Html->link("", ['controller'=>'CustomersTickets','action' => 'edit', $ticket->id],
                ['class'=>'btn btn-default glyphicon glyphicon-edit']).

             $this->Form->postLink("", ['controller'=>'customers-tickets','action' => 'delete', $ticket->id],['class'=>'btn btn-default glyphicon glyphicon-remove','confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)])

           .'</td>'; ?>
            <?= '</tr>'; ?>
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
        <p><?= $this->Paginator->counter('{{count}} tickets total found') ?></p>
    </div>
</div>
