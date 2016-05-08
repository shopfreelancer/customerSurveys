<div class="customersSurveys form large-9 medium-8 columns content">
    <?= $this->Form->create($customersSurvey) ?>
    <?= $this->Form->input('action',['type'=>'hidden','value'=>'save']) ?>
    <fieldset>
        <legend><?= $survey->title ?></legend>
        <?php
            echo $this->Form->input('CustomersSurveys.timestamp',['type'=>'date']);
            echo $this->Form->input('CustomersSurveys.surveys_id',['type'=>'hidden','value'=>$survey->id]);
            echo $this->Form->input('CustomersSurveys.customers_id',['type'=>'hidden','value'=>$customersId]);
            foreach($customersSurvey->CustomersSurveysAnswers as $key => $customersSurveysAnswer) {
                echo $this->Form->input("CustomersSurveys.CustomersSurveysAnswers.{$key}.answer",
                    ['type' => 'number', 'step' => "0.5", 'default' => 2]);
                echo $this->Form->input("CustomersSurveys.CustomersSurveysAnswers.{$key}.surveys_questions_id",
                    ['type'=>'hidden']);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
