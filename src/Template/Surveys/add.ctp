<?php
$this->start('sidebar');
echo '<li>' . $this->Html->link('<i class="fa fa-files-o"></i>'.__('List Surveys'), ['action' => 'index'],['escape'=>false]) . '</li>';
echo '<li>' . $this->Form->postLink('<i class="fa fa-remove"></i>'.__('Delete Survey'), ['action' => 'delete', $survey->id], ['escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $survey->id)]) . '</li>';
echo '<li>' . $this->Html->link('<i class="fa fa-plus-circle"></i>'.__('New Survey'), ['controller' => 'Surveys', 'action' => 'add'],['escape'=>false]) . '</li>';
$this->end();
?>
<div class="surveys form large-9 medium-8 columns content">
    <?= $this->Form->create($survey) ?>
    <fieldset>
        <legend><?= __('Add Survey') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        echo "add survey question";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
