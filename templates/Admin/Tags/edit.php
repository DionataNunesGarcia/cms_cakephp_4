<?php
$actionForm = $action ?? $this->getRequest()->getParam('action');
?>
<?=
$this->Form->create($entity, ['url' => [
    'action' => $actionForm,
    $entity->id,
    'fullBase' => true,
]]);
?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => 'Cadastro']) ?>
    <div class="box-body">
        <fieldset>
            <?= $this->Form->hidden('id') ?>
            <?= $this->Form->hidden('status',['value' => 1]); ?>
            <div class="form-group col-md-6">
                <?= $this->Form->control('name', ['label' => 'Nome']); ?>
            </div>
        </fieldset>
    </div>
    <div class="box-footer">
        <?= $this->element('admin/form-buttons', ['id' => $entity->id]) ?>
    </div>
</div>
<?= $this->Form->end() ?>
