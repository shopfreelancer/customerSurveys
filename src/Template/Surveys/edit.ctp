<?php
$this->assign('title','Edit Survey');

$this->start('sidebar');
echo '<li>'. $this->Html->link(__('List Surveys'), ['action' => 'index']) .'</li>';
echo '<li>'. $this->Form->postLink(
        '<i class="fa fa-remove"></i>'.
    __('Delete Survey'),
    ['action' => 'delete', $survey->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $survey->id),'escape'=>false]
) .'</li>';
echo '<li>'. $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add'])  .'</li>';
$this->end();
?>

<div class="surveys form large-9 medium-8 columns content">
    <?= $this->Form->create($survey) ?>
    <fieldset>
        <legend><?= $survey->title ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <div class="related">
        <h4><?= __('Questions') ?></h4>
        <?php if (!empty($survey->SurveysQuestions)): ?>
            <table class="table table-striped survey-questions-sortable" cellpadding="0" cellspacing="0">
                <tr>
                    <th></th>
                    <th><?= __('Title') ?></th>
                    <th><?= __('weighting') ?></th>
                    <th><?= __('Position') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($survey->SurveysQuestions as $key => $surveysQuestion): ?>
                    <tr data-position="<?= $surveysQuestion->position ?>" data-id="<?= $surveysQuestion->id ?>">
                        <td>
                            <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                            <?= $this->Form->input("Surveys.SurveysQuestions.{$key}.id",['type'=>'hidden']); ?>
                            <?= $this->Form->input("Surveys.SurveysQuestions.{$key}.position",['type'=>'hidden','class'=>'survey_question_pos']); ?>
                        </td>
                        <td><?= h($surveysQuestion->title) ?></td>
                        <td><?= h($surveysQuestion->weigthing) ?></td>
                        <td><?= h($surveysQuestion->position) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('', ['controller' => 'SurveysQuestions', 'action' => 'editModal', $surveysQuestion->id],['class'=>'js-edit-survey-question-modal btn btn-default glyphicon glyphicon-pencil','data-id'=>$surveysQuestion->id]) ?>
                            <?= $this->Form->postLink('', ['controller' => 'Surveys', 'action' => 'delete', $surveysQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveysQuestion->id),'class'=>'btn btn-default glyphicon glyphicon-remove']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
