<?= $this->Flash->render('auth') ?>
<div class="row">
    <div class="col-sm-6 col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Login</h3>
            </div>

            <div class="box-body form-vertical">
                <?= $this->Form->create() ?>
                <fieldset>
                    <legend><?= __('Please enter your email and password') ?></legend>
                    <?= $this->Form->input('email') ?>
                    <?= $this->Form->input('password') ?>
                </fieldset>
                <?= $this->Form->button(__('Login')); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
