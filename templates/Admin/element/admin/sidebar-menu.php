<style>
    .treeview-menu li.disabled:hover, .treeview-menu li.disabled a:hover {
        cursor: no-drop;
    }
</style>
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                $imagem = 'user-default.png';
                if (!empty($userSession['image']) && file_exists(WWW_ROOT . $userSession['image'])) {
                    $imagem = '../' . $userSession['imagem'];
                }
                ?>
                <?= $this->Html->image($imagem, ['class' => 'img-circle']); ?>
            </div>
            <div class="pull-left info">
                <p>
                    <?= ucfirst($userSession['user']); ?>
                </p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Cadastros -->
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-drivers-license"></i>
                    <span>
                        <?= __('Cadastros') ?>
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'About', 'action' => 'edit'], ['fullBase' => true]); ?>" title="" data-placement="right">
                            <i class="fa fa-circle-o"></i>
                            <?= __('Usuarios') ?>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Site -->
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>
                        <?= __('Site') ?>
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'About', 'action' => 'edit'], ['fullBase' => true]); ?>" data-placement="right">
                            <i class="fa fa-address-book"></i>
                            <?= __('Sobre') ?>
                        </a>
                    </li>
                </ul>
            </li>

            <!--Administração-->
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>
                        <?= __('Administração') ?>
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index'], ['fullBase' => true]); ?>" data-placement="right">
                            <i class="fa fa-users"></i>
                            <?= __('Usuários') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'Levels', 'action' => 'index'], ['fullBase' => true]); ?>" data-placement="right">
                            <i class="fa fa-bar-chart-o"></i>
                            <?= __('Níveis Permissões') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'SystemParameters', 'action' => 'edit'], ['fullBase' => true]); ?>" data-placement="right">
                            <i class="fa fa-gear"></i>
                            <?= __('Parâmetros do Sistema') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'LogsChange', 'action' => 'index'], ['fullBase' => true]); ?>" data-placement="right">
                            <i class="fa fa-exclamation-triangle"></i>
                            <?= __('Logs Alterações') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(['controller' => 'LogsAccess', 'action' => 'index'], ['fullBase' => true]); ?>" data-placement="right">
                            <i class="fa fa-check"></i>
                            <?= __('Logs Acessos') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(null, ['controller' => 'Users', 'action' => 'logout'], ['fullBase' => true]); ?>" data-auth="false" data-placement="right">
                            <i class="fa fa-sign-out"></i>
                            <?= __('Sair') ?>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
