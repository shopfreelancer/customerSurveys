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

    <?= $this->Html->css('AdminLTE.css') ?>
    <?= $this->Html->css('skins/_all-skins.min.css') ?>
    <?= $this->Html->css('main.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body class="skin-blue fixed">
<div class="wrapper">
    <header class="main-header">
    <a class="logo" href="#">Surveylicos</a>
    <nav class="navbar navbar-static-top" role="navigation">
    <a class="sidebar-toggle" role="button" data-toggle="offcanvas" href="#">
    <span class="sr-only">Toggle navigation</span>
    </a>
            <ul class="nav navbar-nav">
                <li role="presentation"><?= $this->Html->link(__('Customers'), ['controller'=>'Customers' ,'action' => 'index']) ?></li>
                 <li role="presentation"><?= $this->Html->link(__('Surveys'), ['controller'=>'Surveys' ,'action' => 'index']) ?></li>
            </ul>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
            <?php echo $this->fetch('sidebar'); ?>
            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?= $this->fetch('title') ?></h1>
        </section>
        <section class="content">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </section>
    </div>

    <footer class="main-footer">
    <div class="pull-right hidden-xs"> Making Surveys easy</div>
    <strong>
    Copyright © 2016
    <a href="#">Surveylicous</a>
    .
    </strong>
    All rights reserved.
    </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<?= $this->fetch('scriptBottom') ?>
<?= $this->Html->script('main.js'); ?>
<?= $this->Html->script('slimscroll.min.js'); ?>
<?= $this->Html->script('app.min.js'); ?>

</body>
</html>
