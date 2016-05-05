<h2>Customer Surveys</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('date') ?></th>
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
        <p><?= $this->Paginator->counter('{{count}} tickets total found') ?></p>
    </div>
</div>
