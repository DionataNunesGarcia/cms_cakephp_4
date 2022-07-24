<?=
$this->Form->create($entity, [
    'url' => [
        'action' => 'edit',
        $entity->id,
        'fullBase' => true,
    ],
    'enctype' => 'multipart/form-data'
]);
?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => 'Dados Sistema', 'collapse' => false]) ?>
    <div class="box-body">
        <?= $this->Form->hidden('id') ?>
        <div class="row">
            <div class="form-group col-md-6">
                <?= $this->Form->control('social_reason', ['label' => 'Razão Social']); ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->control('fantasy_name', ['label' => 'Nome Fantasia']); ?>
            </div>
            <div class="form-group col-md-6">
                <?=
                $this->Form->control('cnpj_cpf', [
                    'value' => ($entity->cnpj_cpf),
                    'class' => 'cnpj',
                    'label' => 'CNPJ/CPF',
                ]);
                ?>
            </div>
            <div class="form-group col-md-6">
                <?=
                $this->element('admin/selectTags', [
                    'name' => 'emails',
                    'required' => true,
                    'label' => 'E-mails do Sistema',
                    'value' => $entity->emails,
                    'separator' => ';'
                ]);
                ?>
            </div>
        </div>
    </div>
    <?= $this->element('admin/box-title', ['title' => 'Configurações Gerais', 'collapse' => false]) ?>
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-4 radio-booton">
                <label class="no-padding" for="gerar_log">
                    Gerar Logs de Acesso
                </label>
                <div class="radio">
                    <?= $this->Form->radio('generate_access_logs', ['1' => 'Sim', '0' => 'Não']); ?>
                </div>
            </div>
            <div class="form-group col-md-4 radio-booton">
                <label class="no-padding" for="gerar_log">
                    Gerar Logs de Alterações
                </label>
                <div class="radio">
                    <?= $this->Form->radio('generate_change_log', ['1' => 'Sim', '0' => 'Não']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <?= $this->Form->button('<i class="fa fa-save"></i> Salvar', ['class' => 'btn btn-primary', 'escapeTitle' => false]); ?>
    </div>
</div>
<?= $this->Form->end() ?>
