<!DOCTYPE html>
<?php

use Cake\Core\Configure;

$cakeDescription = Configure::read('Cliente.nome');
?>
<html>
    <head>
        <meta charset="utf-8">

        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>
            <?= $cakeDescription ?>:
            Acesso ao Sistema
        </title>

        <?= $this->element('admin/head-login') ?>
        <?= $this->Html->meta('icon') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>

    <body class="">

    <div id="particles">
        <div id="webcoderskull">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <div class="login-logo">
                        <a href="<?= Configure::read('Cliente.link') ?>">
                            <?= $this->Html->image('logo.png', ['class' => 'img-circle logo-cliente']); ?>
                            <?php //echo Configure::read('Cliente.nome') ?>
                        </a>
                    </div>
                    <div class="text-left">
                        <?= $this->Flash->render() ?>
                    </div>

                    <?= $this->fetch('content') ?>

                </div>
                <!-- /.login-box-body -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->
    </body>
</html>
