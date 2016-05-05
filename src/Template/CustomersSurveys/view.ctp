<div class="row">
<nav class="col-xs-12 col-sm-3" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customers Survey'), ['action' => 'edit', $customersSurvey->id],['class'=>'testy']) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customers Survey'), ['action' => 'delete', $customersSurvey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersSurvey->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers Surveys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customers Survey'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customersSurveys view lcol-xs-12 col-sm-9 content">
    <h3><?= h($customersSurvey->timestamp.' '.$customersSurvey->Surveys->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        <?php
        foreach($customersSurvey->CustomersSurveysAnswers as $cSurveyAnswer) {
            echo '<tr>';
            echo '<td><strong>' . $cSurveyAnswer->SurveysQuestions->title . '</strong></td>';
            echo '<td>' . $cSurveyAnswer->answer . '</td>';
            echo '</td></tr>';
        }
        ?>
        <tr>
            <th>Summe</th>
            <td><?php echo $customersSurvey->surveySum; ?></td>
        </tr>
    </table>
</div>
</div>
