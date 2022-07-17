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
                        <a href="<?= $this->Url->build(null, ['prefix' => 'admin', 'controller' => 'Users', 'action' => 'index'], true); ?>" title="Pesquisar Fornecedores" data-placement="right">
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
                        <a href="<?= $this->Url->build(null, ['controller' => 'About', 'action' => 'edit'], true); ?>" data-placement="right">
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
                        <a href="<?= $this->Url->build(null, ['controller' => 'Users', 'action' => 'index'], true); ?>" data-placement="right">
                            <i class="fa fa-users"></i>
                            <?= __('Usuários') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(null, ['controller' => 'Levels', 'action' => 'index'], true); ?>" data-placement="right">
                            <i class="fa fa-bar-chart-o"></i>
                            <?= __('Níveis Permissões') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(null, ['controller' => 'SystemParameters', 'action' => 'edit'], true); ?>" data-placement="right">
                            <i class="fa fa-gear"></i>
                            <?= __('Parâmetros do Sistema') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(null, ['controller' => 'LogsChange', 'action' => 'index'], true); ?>" data-placement="right">
                            <i class="fa fa-exclamation-triangle"></i>
                            <?= __('Logs Alterações') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(null, ['controller' => 'LogsAccess', 'action' => 'index'], true); ?>" data-placement="right">
                            <i class="fa fa-check"></i>
                            <?= __('Logs Acessos') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(null, ['controller' => 'Users', 'action' => 'logout'], true); ?>" data-auth="false" data-placement="right">
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
