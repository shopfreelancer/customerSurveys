<?php
$cakeDescription = 'Surveylicious - Surveys never made so easy';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('main.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>
<div class="outer_wrap container">

    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li class="active" role="presentation"><a href="#">Home</a></li>
                <li role="presentation"><?= $this->Html->link(__('Customers'), ['controller'=>'Customers' ,'action' => 'index']) ?></li>
                 <li role="presentation"><?= $this->Html->link(__('Surveys'), ['controller'=>'Surveys' ,'action' => 'index']) ?></li>
            </ul>
        </nav>
        <h3 class="text-muted">Surveylicos</h3>
    </div>
    <div class="headline">
        <h1><?= $this->fetch('title') ?></h1>
    </div>


    <?= $this->Flash->render() ?>
    <div class="main_part clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<?= $this->fetch('scriptBottom') ?>
<?= $this->Html->script('main.js'); ?>

</body>
</html>
