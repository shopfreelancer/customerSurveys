<?php

$this->start('sidebar');
echo '<li>'. $this->Html->link('<i class="fa fa-pencil"></i>'. __('Edit Customer'), ['controller' => 'Customers','action' => 'edit', $customersSurvey->customers_id
],['escape'=>false]) .'</li>';
echo '<li>'. $this->Html->link('<i class="fa fa-file-o"></i>'.__('List CustomerSurveys'), ['controller' => 'Customers','action' => 'surveys', $customersSurvey->customers_id],['escape'=>false]) . '</li>';
$this->end();
?>
<div class="customersSurveys row">

    <?= $this->Form->create($customersSurvey) ?>
    <?= $this->Form->input('action',['type'=>'hidden','value'=>'save']) ?>
    <div class="col-xs-12 col-sm-6">
    <fieldset>
        <legend><?= $customersSurvey->Surveys->title ?></legend>
        <?php
        echo $this->Form->input('CustomersSurveys.timestamp',['type'=>'date']);
        echo $this->Form->input('CustomersSurveys.customers_id',['type'=>'hidden']);
        foreach($customersSurvey->CustomersSurveysAnswers as $key => $customersSurveysAnswer) {
            echo '<div class="row">';
            echo '<div class="col-xs-12 col-sm-6">';
            echo $this->Form->hidden("CustomersSurveys.CustomersSurveysAnswers.{$key}.id");
            echo $customersSurveysAnswer->SurveysQuestions->title;
            echo '</div><div class="col-xs-12 col-sm-6">';
            echo $this->Form->input("CustomersSurveys.CustomersSurveysAnswers.{$key}.answer",
                ['type' => 'number', 'step' => "0.5", 'default' => 2,'label'=>false]);
            echo '</div></div>';
        }
        ?>
    </fieldset>
      <?= $this->Html->link(__('Cancel'), ['controller' => 'Customers', 'action' => 'surveys',$customersSurvey->customers_id],['class' => 'btn btn-default ']) ?>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary pull-right']) ?>
        <?= $this->Form->end() ?>
    </div>

</div>
