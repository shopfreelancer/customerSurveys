<?php $this->assign('title', "Customer Surveys for {$customer->companyname}"); ?>
<?= $this->Html->link(__('Back to Customer'), ['action' => 'view', $customer->id],['class' => 'btn btn-primary']) ?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('timestamp') ?></th>
            <th><?= $this->Paginator->sort('sum') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($customersSurveys as $customersSurvey): ?>
            <tr>
                <td><?= $customersSurvey->Surveys->title ?></td>
                <td><?= $customersSurvey->timestamp ?></td>
                <td><?= $customersSurvey->surveySum;?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller'=> 'CustomersSurveys','action' => 'view', $customersSurvey->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller'=> 'CustomersSurveys','action' => 'edit', $customersSurvey->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=> 'CustomersSurveys','action' => 'delete', $customersSurvey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersSurvey->id)]) ?>
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
        <p><?= $this->Paginator->counter('{{count}} surveys found') ?></p>
    </div>
</div>
<div class="row">
    <?= $this->Form->create(null, [
        'url' => ['controller' => 'CustomersSurveys', 'action' => 'add'],
        'id' => "js_add_customers_survey_form"
    ]);
    echo $this->Form->hidden('customers_id',['value'=>$customersId]);
    ?>
    <?= '<div class=" col-xs-12 col-sm-8">'.$this->Form->label('surveys', 'Create new Survey for this customer:').'</div>' ?>
    <div id="new survey" class="col-xs-12 col-sm-4">
        <?php echo $this->Form->select(
            'surveys_id',
            $surveys, [
                'empty' => 'show all',
                'class'=> "form-control"
            ]
        );
        ?>
    </div>
    <?= $this->Form->end() ?>
</div>
