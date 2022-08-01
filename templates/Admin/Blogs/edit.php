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
            <div class="form-group col-md-4">
                <?= $this->Form->control('title', ['label' => 'Título']); ?>
            </div>
            <div class="form-group col-md-4">
                <?= $this->Form->control('subtitle', ['label' => 'Subtitulo']); ?>
            </div>
            <div class="form-group col-md-4">
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
            <div class="form-group col-md-12">
                <label for="content" class="required">Conteúdo</label>
                <?= $this->Form->input('content', ['class' => 'ckeditor', 'text' => 'Conteúdo', 'type' => 'textarea']) ?>
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
