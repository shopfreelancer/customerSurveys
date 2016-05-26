<?php
$this->start('sidebar');
echo '<li>'.$this->Html->link(
        '<i class="fa fa-plus-circle"></i>'.
        $this->Html->tag('span',__('New Survey'))
        , ['action' => 'add'],['title'=>__('New Survey'),'escape'=>false,'class'=>'']) .'</li>';
$this->end();
?>
<div class="surveys index large-9 medium-8 columns content">
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($surveys as $survey): ?>
            <tr>
                <td><?= h($survey->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'edit', $survey->id],['title' =>__('Edit'),'class'=>'btn btn-default glyphicon glyphicon-pencil']) ?>
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
