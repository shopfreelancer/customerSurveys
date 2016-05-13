<?php
    $this->assign('title','Customers<small>all customers</small>');

    $this->start('sidebar');
        echo '<li>'.$this->Html->link(
        $this->Html->tag('i','', ['class'=>' glyphicon glyphicon-plus','escape'=>false]).
        $this->Html->tag('span',__('Create new Customer'))
        , ['action' => 'add'],['title'=>__('New Customer'),'escape'=>false]).'</li>';
    $this->end();
?>

<section class="content">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
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
            </div>
            <div class="box-footer clearfix">
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
