<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Survey'), ['action' => 'edit', $survey->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Survey'), ['action' => 'delete', $survey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $survey->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="surveys view large-9 medium-8 columns content">
    <h3><?= h($survey->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($survey->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($survey->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Position') ?></th>
            <td><?= $this->Number->format($survey->position) ?></td>
        </tr>
        <tr>
            <th><?= __('Survey Id') ?></th>
            <td><?= $this->Number->format($survey->survey_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($survey->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Surveys') ?></h4>
        <?php if (!empty($survey->surveys)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Survey Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($survey->surveys as $surveys): ?>
            <tr>
                <td><?= h($surveys->id) ?></td>
                <td><?= h($surveys->title) ?></td>
                <td><?= h($surveys->description) ?></td>
                <td><?= h($surveys->position) ?></td>
                <td><?= h($surveys->survey_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Surveys', 'action' => 'view', $surveys->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Surveys', 'action' => 'edit', $surveys->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Surveys', 'action' => 'delete', $surveys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveys->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
