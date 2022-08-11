<?php
use App\Utils\ConvertDates;
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
            <div class="form-group col-md-4">
                <?= $this->Form->control('title', ['label' => 'Título']); ?>
            </div>
            <div class="form-group col-md-4">
                <?=
                $this->element('admin/select2', [
                    'controller' => 'EventsTypes',
                    'name' => 'event_type_id',
                    'label' => __('Tipo de Evento'),
                    'multiple' => false,
                    'required' => true,
                    'value' => $entity->event_type_id,
                ])
                ?>
            </div>
            <div class="form-group col-md-4">
                <?=
                $this->Form->control('event_status', [
                    'label' => 'Situação Atual',
                    'type' => 'select',
                    'options' => \App\Utils\Enum\EventsStatusEnum::ARRAY_STR
                ]);
                ?>
            </div>
            <div class="form-group col-md-4">
                <?=
                $this->Form->control('all_day', [
                    'label' => 'Todo Dia',
                    'type' => 'select',
                    'options' =>\App\Utils\Enum\YesNoEnum::getArray()
                ]);
                ?>
            </div>
            <div class="form-group col-md-4">
                <?=
                $this->Form->control('start', [
                    'label' => 'Início',
                    'value' => ConvertDates::convertDateToPtBR($entity->start, true, false),
                    'class' => 'datetimepicker',
                    'type' => 'text'
                ]);
                ?>
            </div>

            <div class="form-group col-md-4">
                <?=
                $this->Form->control('end', [
                    'label' => 'Fim',
                    'value' => ConvertDates::convertDateToPtBR($entity->end, true, false),
                    'class' => 'datetimepicker',
                    'type' => 'text'
                ]);
                ?>
            </div>
            <div class="form-group col-md-12">
                <label for="content" class="required">Detalhes</label>
                <?= $this->Form->input('details', ['class' => 'ckeditor', 'text' => 'Detalhes', 'type' => 'textarea']) ?>
            </div>
        </fieldset>
    </div>
    <div class="box-footer">
        <?=
        $this->Form->button('<i class="fa fa-save"></i> Salvar', [
            'class' => 'btn btn-primary',
            'escapeTitle' => false,
            'type' => 'submit',
        ]);
        ?>
        <a href="<?= $this->Url->build(['action' => 'index', 'fullBase' => true]); ?>" class="btn btn-default">
            <i class="fa fa-calendar"></i> Calendário
        </a>
        <?php if (!empty($entity->id)) { ?>
            <a href="<?= $this->Url->build([
                'action' => 'delete',
                'fullBase' => true,
                $entity->id
            ]); ?>" class="btn btn-danger" onclick="confirm('Você quer deletar o evento <?= $entity->title ?>?')">
                <i class="fa fa-trash"></i> Excluir
            </a>
        <?php } ?>

    </div>
</div>
<?= $this->fetch('postLink'); ?>
<?= $this->Form->end(); ?>
<?php if ($entity->id) { ?>
    <div class="box">
        <?= $this->element('admin/box-title', ['title' => 'Arquivos']) ?>
        <div class="box-body">
            <?=
            $this->element('admin/multi-upload', [
                'foreignKey' => $entity->id,
                'model' => 'Events',
                'accept' => '*',
            ]);
            ?>
        </div>
    </div>
<?php } ?>
