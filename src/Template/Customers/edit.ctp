<?php
    $this->assign('title','Edit Customer<small>'. $customer->companyname .'</small>');

    $this->start('sidebar');
        echo '<li>'.$this->Form->postLink(
                        __('Delete Customer'),
                        ['action' => 'delete', $customer->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]
                    ).'</li>';

    $this->end();
?>

<div class="row">
    <div class="col-sm-6 col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $customer->companyname ?></h3>
            </div>

            <?= $this->Form->create($customer) ?>
            <div class="box-body form-vertical">
            <fieldset>
                <?php
                    echo $this->Form->input('firstname');
                    echo $this->Form->input('lastname');
                    echo $this->Form->input('salutation');
                    echo $this->Form->input('companyname');
                    echo $this->Form->input('street');
                    echo $this->Form->input('postcode');
                    echo $this->Form->input('city');
                    echo $this->Form->input('country_id', array(
                            'default' => $customer->country_id,
                            'label' => "Country"
                        )
                    );
                    echo $this->Form->input('phone');
                    echo $this->Form->input('www');
                    echo $this->Form->input('email');
                    echo $this->Form->input('ustid');
                    echo $this->Form->input('taxnumber');
                    echo $this->Form->input('description');
                ?>
            </fieldset>
                <?= $this->Html->link(__('Cancel'), ['controller' => 'Customers', 'action' => 'view',$customer->id],['class' => 'btn btn-default ']) ?>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary pull-right']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
