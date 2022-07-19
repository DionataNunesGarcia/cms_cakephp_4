<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $levels
 */
?>
<?php
$placeholder = !empty($entity->id) ? 'Só preencher se for alterar' : '';
$required = empty($entity->id) ? true : false;
$action = $action ?? $this->getRequest()->getParam('action');
$controller = $controller ?? $this->getRequest()->getParam('controller');
?>
<?= $this->Form->create($entity, ['url' => [
    'controller' => $controller,
    'action' => $action,
    $entity->id,
    'fullBase' => true,
], 'enctype' => 'multipart/form-data']) ?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-list-alt"></i> Cadastro']) ?>
    <div class="box-body">
        <fieldset>
            <?= $this->Form->hidden('id') ?>
            <div class="row">
                <div class="form-group col-md-4">
                    <?= $this->Form->control('user', ['label' => 'Usuário']); ?>
                </div>
                <div class="form-group col-md-4">
                    <?= $this->Form->control('password', ['label' => 'Senha', 'type' => 'password', 'value' => '', 'placeholder' => $placeholder, 'required' => $required]); ?>
                </div>
                <div class="form-group col-md-4">
                    <?= $this->Form->control('confirm_password', ['label' => 'Confirmar Senha', 'type' => 'password', 'value' => '', 'placeholder' => $placeholder, 'required' => $required]); ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <?=
                    $this->element('admin/select2', [
                        'controller' => 'levels',
                        'name' => 'level_id',
                        'label' => __('Níveis'),
                        'multiple' => false,
                        'required' => true,
                        'value' => $entity->level_id,
                    ])
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?=
                    $this->Form->control('status', [
                        'type' => 'select',
                        'label' => __('Situação'),
                        'class' => 'form-control select2',
                        'required' => true,
                        'options' => \App\Utils\Enum\StatusEnum::ARRAY_SIMPLE
                    ]);
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?php
                    if (empty($entity->imagem)) {
                        echo $this->Form->label('Imagem');
                        echo $this->Form->file('imagem_upload', ['class' => 'upload_crop', 'multiple' => false, 'accept' => 'image/*', 'label' => 'Imagem']);
                    } else {
                        ?>
                        <div class="col-md-8 no-padding">
                            <strong>Imagem</strong><br/>
                            <?= $this->Html->image('../' . $entity->imagem, ['class' => 'img-responsive img-usuario img-thumbnail']); ?>
                        </div>
                        <div class="col-md-4 text-rigth">
                            <?=
                            $this->Html->link("<i class='fa fa-trash'></i> Excluir", ['action' => 'excluir_imagem', $entity->id], [
                                "alt" => "Imagem",
                                'escape' => false,
                                'confirm' => __('Tem certeza de que deseja excluir o arquivo?'),
                                'class' => 'btn btn-xs btn-danger tex'
                            ]);
                            ?>
                        </div>
                    <?php } ?>
                    <div id="uploaded_image"></div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="box-footer">
        <?= $this->element('admin/form-buttons', ['id' => $entity->id]) ?>
    </div>
</div>
<?= $this->Form->end() ?>
<?= $this->element('admin/image-crop-modal') ?>
