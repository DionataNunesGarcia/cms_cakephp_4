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
                <?= $this->Form->control('title', ['label' => 'Título']); ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->control('email', ['label' => 'E-mail', 'type' => 'email']); ?>
            </div>
            <div class="form-group col-md-6">
                <?=
                $this->Form->control('phone', [
                    'value' => ($entity->phone),
                    'class' => 'phone',
                    'label' => 'Telefone',
                ]);
                ?>
            </div>
            <div class="form-group col-md-6">
                <?=
                $this->Form->control('cell_phone', [
                    'value' => ($entity->cell_phone),
                    'class' => 'phone',
                    'label' => 'Celular',
                ]);
                ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->control('facebook'); ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->control('instagram'); ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->control('linkedin'); ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->control('github'); ?>
            </div>
        </div>
    </div>
    <?= $this->element('admin/box-title', ['title' => 'Textos']) ?>
    <div class="box-body">
        <div class="form-group col-md-12">
            <?= $this->Form->input('about', ['class' => 'ckeditor', 'text' => 'Sobre', 'type' => 'textarea']) ?>
        </div>
        <div class="form-group col-md-12">
            <?= $this->Form->input('vision', ['class' => 'ckeditor', 'text' => 'Visão', 'type' => 'textarea']) ?>
        </div>
        <div class="form-group col-md-12">
            <?= $this->Form->input('mission', ['class' => 'ckeditor', 'text' => 'Missão', 'type' => 'textarea']) ?>
        </div>
        <div class="form-group col-md-12">
            <?= $this->Form->input('values', ['text' => 'Valores', 'class' => 'ckeditor', 'type' => 'textarea']) ?>
        </div>
    </div>
    <div class="box-footer">
        <?=
        $this->Form->button('<i class="fa fa-save"></i> Salvar', [
            'class' => 'btn btn-primary',
            'escapeTitle' => false
        ]);
        ?>
    </div>
</div>
<?= $this->Form->end() ?>
