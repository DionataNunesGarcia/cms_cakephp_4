<?php
$actionForm = $action ?? $this->getRequest()->getParam('action');
?>
<?=
$this->Form->create($entity, ['url' => [
    'action' => $actionForm,
    $entity->id,
    'fullBase' => true,
]]);
$this->Form->unlockField('tags');
$this->Form->unlockField('redirect');
?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => 'Cadastro']) ?>
    <div class="box-body">
        <fieldset>
            <?= $this->Form->hidden('id') ?>
            <?= $this->Form->hidden('redirect',['value' => $actionForm]); ?>
            <?= $this->Form->hidden('status',['value' => 1]); ?>
            <div class="form-group col-md-6">
                <?= $this->Form->control('title', ['label' => 'Título']); ?>
            </div>
            <div class="form-group col-md-6">
                <?= $this->Form->control('subtitle', ['label' => 'Subtitulo']); ?>
            </div>
            <div class="form-group col-md-6">
                <?=
                $this->element('admin/select2', [
                    'controller' => 'BlogsCategories',
                    'name' => 'blog_category_id',
                    'label' => __('Categoria de Blog'),
                    'multiple' => false,
                    'required' => true,
                    'value' => $entity->blog_category_id,
                ])
                ?>
            </div>
            <div class="form-group col-md-6">
                <?=
                $this->Form->control('show_website', [
                    'type' => 'select',
                    'label' => __('Mostrar no Site'),
                    'class' => 'form-control select2',
                    'required' => true,
                    'options' => \App\Utils\Enum\YesNoEnum::getArray()
                ]);
                ?>
            </div>
            <div class="form-group col-md-12">
                <label for="content" class="required">Conteúdo</label>
                <?= $this->Form->input('content', ['class' => 'ckeditor', 'text' => 'Conteúdo', 'type' => 'textarea']) ?>
            </div>
            <div class="form-group col-md-12">
                <?=
                $this->element('admin/select2', [
                    'controller' => 'Tags',
                    'name' => 'tags',
                    'label' => __('Tags'),
                    'multiple' => true,
                    'required' => false,
                    'value' => $entity->tags_ids,
                ]);
                ?>
            </div>
        </fieldset>
    </div>
    <div class="box-footer">
        <?= $this->element('admin/form-buttons', ['id' => $entity->id]) ?>
    </div>
</div>
<?= $this->Form->end() ?>
<?php if ($entity->id) { ?>
    <div class="box">
        <?= $this->element('admin/box-title', ['title' => 'Arquivos']) ?>
        <div class="box-body">
            <?=
            $this->element('admin/multi-upload', [
                'foreignKey' => $entity->id,
                'model' => 'Blogs',
                'accept' => '*',
            ]);
            ?>
        </div>
    </div>
<?php } ?>
