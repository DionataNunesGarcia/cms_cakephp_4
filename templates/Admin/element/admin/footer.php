<?php use Cake\Core\Configure; ?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <?= __('Desenvolvido por:') ?>
        <b>
            <a href="https://www.linkedin.com/in/dionata-garcia/" target="_blank" data-auth="false">
                <?= __('Diônata Garcia') ?>
            </a>
        </b>
    </div>
    <strong>Copyright &copy;
        <?= date('Y') ?>
        <a href="<?= Configure::read('Client.link') ?>" target="_blank">
            <?= Configure::read('Client.name') ?>
        </a>.
    </strong>
    <?= __('Todos os direitos reservados') ?>
</footer>
