<?php
use Cake\Core\Configure;
use App\Utils\ConvertDates;
?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= $this->Url->build('/admin/'); ?>" class="logo" data-auth="false">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <?= $this->Html->image('logo.png', ['class' => 'img-circle logo-cliente']); ?>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <?= $this->Html->image('logo.png', ['class' => 'img-circle logo-cliente']); ?>
            <?= Configure::read('Cliente.logo.large') ?>
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success" id="total-mensagens">0</span>
                    </a>
                    <ul class="dropdown-menu" id="menu-mensagens">
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-auth="false">
                        <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                        <span class="hidden-xs">
                            <i class="fa fa-user"></i>
                            <?= ucfirst($userSession['user']); ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php
                            $image = 'user-default.png';
                            if (!empty($userSession['avatar']) && file_exists(WWW_ROOT . 'Uploads' . DS . $userSession['avatar']['filename'])) {
                                $image = "../Uploads/"  . $userSession['avatar']['filename'];
                            }
                            ?>
                            <?= $this->Html->image($image, ['class' => 'img-circle']); ?>
                            <p>
                                <?= strtoupper($userSession['user']); ?>
                                <small>Membro desde <?= ConvertDates::convertDateToPtBR($userSession['created']); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'profile'], ['fullBase' => true]); ?>" class="btn btn-default btn-flat" data-auth="false">
                                    <i class="fa fa-user-o"></i>
                                    <?= __('Perfil') ?>
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'logout'], ['fullBase' => true]); ?>" class="btn btn-default btn-flat" data-auth="false">
                                    <i class="fa fa-sign-out"></i>
                                    <?= __('Sair') ?>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
