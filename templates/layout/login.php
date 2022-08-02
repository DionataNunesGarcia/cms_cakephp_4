<!DOCTYPE html>
<?php

use Cake\Core\Configure;

$cakeDescription = Configure::read('Client.name');
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

                    <div class="modal fade" id="forget-password" data-backdrop="false" role="dialog">
                        <div class="modal-dialog" role="document">
                            <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'forgetPassword', 'prefix' => 'Admin']]) ?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">
                                        Resetar sua Senha
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?=
                                    $this->Form->control('email', [
                                        'label' => 'Informe seu e-mail para receber uma nova senha.',
                                        'placeholder' => 'Seu e-mail',
                                        'class' => 'username form-control',
                                        'required' => true,
                                        'autofocus' => true
                                    ]);
                                    ?>
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <?= $this->Form->button(__('Gerar Senha'), ['class' => 'login-btn btn btn-success', 'type' => 'submit'] ); ?>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                    <!-- /.login-box -->
                </div>
                <!-- /.login-box-body -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->
    </body>
</html>
