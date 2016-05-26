<div class="surveysQuestions form clearfix">
<?= $this->Form->create($surveysQuestion) ?>
    <fieldset>
        <?php

            echo $this->Form->input('title');
            echo $this->Form->input('weighting');
            echo $this->Form->input('position');
        ?>
    </fieldset>
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary pull-right']) ?>

</div>