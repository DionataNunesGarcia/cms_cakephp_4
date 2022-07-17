<!DOCTYPE html>
<?php

use App\Utils\TranslateControllerActions;
use Cake\Core\Configure;
use Cake\Routing\Router;

$cakeDescription = Configure::read('Client.name');
$skin = Configure::read('Client.skin') ?  Configure::read('Client.skin') : 'skin-black';
$title = TranslateControllerActions::translateController($this->request->getParam('controller'));

//$permissoes = isset($userSession['permissoes']) ? json_encode($userSession['permissoes']) : json_encode(['']);

$url = Router::url('/', true);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>
            <?= $cakeDescription ?>:
            <?= $title ?>
        </title>

        <?= $this->Html->meta('icon') ?>
        <?= $this->element('admin/head-css') ?>
        <?= $this->element('admin/head-js') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

        <!-- Fetch Custom Scripts -->
        <?= $this->fetch('custom') ?>
    </head>
    <body class="hold-transition <?= $skin ?> sidebar-mini" data-url="<?= $url ?>" data-title="<?= $cakeDescription ?>: <?= $title ?>">
        <div class="wrapper">
            <div id="loading">
                <div class="ring">
                    <span></span>
                </div>
            </div>
            <?php // $this->Form->hidden('valida_permissoes', ['id' => 'valida_permissoes', 'value' => $permissoes]) ?>

            <?= $this->element('admin/top-menu') ?>

            <?= $this->element('admin/sidebar-menu') ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <section class="content-header">
                    <h1>
                        <?= $title ?>
                    </h1>

                    <?= $this->element('admin/breadcrumbs') ?>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </section>
                <!-- /.content -->
            </div>
            <div class="modal fade" id="visualizar_mensagem" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true"></div>
            <!-- /.content-wrapper -->
            <?= $this->element('admin/footer') ?>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
    </body>
</html>
