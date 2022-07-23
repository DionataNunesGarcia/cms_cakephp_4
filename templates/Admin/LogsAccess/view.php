
<div class="box">
    <?= $this->element('admin/box-title', ['title' => 'Dados Sistema', 'collapse' => false]) ?>
    <div class="box-body">
        <?= $this->Form->hidden('id') ?>
        <div class="row">
            <div class="col-md-12">
                <strong><?= __('Usuário') ?>:</strong>
                <span>
                    <?= h($entity->user->user) ?>
                </span>
            </div>
            <div class="col-md-12">
                <strong><?= __('Ip') ?>:</strong>
                <span>
                    <?= h($entity->ip) ?>
                </span>
            </div>
            <div class="col-md-12">
                <strong><?= __('Criado') ?>:</strong>
                <span>
                    <?= h($entity->created->i18nFormat('dd/MM/yyyy')) ?>
                </span>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="<?= $this->Url->build(['action' => 'index', 'fullBase' => true]); ?>" class="btn btn-default">
            <i class="fa fa-search"></i> Pesquisar
        </a>
    </div>
</div>
