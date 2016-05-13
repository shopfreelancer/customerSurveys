<div class="row">
<div class="customers col-xs-12 col-sm-10 content">
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('companyname') ?></th>
                <th><?= $this->Paginator->sort('firstname') ?></th>
                <th><?= $this->Paginator->sort('lastname') ?></th>
                <th><?= $this->Paginator->sort('country_id') ?></th>


                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= h($customer->companyname) ?></td>
                <td><?= h($customer->firstname) ?></td>
                <td><?= h($customer->lastname) ?></td>
                <td><?= h($customer->countryName) ?></td>


                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $customer->id],['title' =>__('View'),'class'=>'btn btn-default glyphicon glyphicon-check']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $customer->id],['title' =>__('Edit'),'class'=>'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $customer->id],['title' =>__('Delete'),'class'=>'btn btn-default glyphicon glyphicon-remove','confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
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
<nav class="col-xs-12 col-sm-2 columns" id="actions-sidebar">
    <ul class="side-nav">

        <li><?= $this->Html->link(
        $this->Html->tag('span',__('New Customer')).
        $this->Html->tag('span','',['class'=>'glyphicon glyphicon-plus'])
        , ['action' => 'add'],['title'=>__('New Customer'),'escape'=>false,'class'=>'btn btn-primary']) ?></li>
    </ul>
</nav>
</div>
