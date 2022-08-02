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
                    <?=
                    $this->Form->control('name', [
                        'label' => 'Nome'
                    ]);
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?=
                    $this->Form->control('user', [
                        'label' => 'Usuário'
                    ]);
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?=
                    $this->Form->control('email', [
                        'label' => 'E-mail',
                        'type' => 'email',
                        'required' => true
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <?= $this->Form->control('password', [
                        'label' => 'Senha',
                        'type' => 'password',
                        'value' => '',
                        'placeholder' => $placeholder,
                        'required' => $required
                    ]);
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?=
                    $this->Form->control('confirm_password', [
                        'label' => 'Confirmar Senha',
                        'type' => 'password',
                        'value' => '',
                        'placeholder' => $placeholder,
                        'required' => $required
                    ]);
                    ?>
                </div>
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
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <?=
                    $this->Form->control('phone', [
                        'value' => h($entity->phone),
                        'class' => 'phone',
                        'label' => 'Telefone',
                    ]);
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?=
                    $this->Form->control('cell_phone', [
                        'value' => ($entity->cell_phone),
                        'class' => 'phone',
                        'label' => 'Celular',
                    ]);
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
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <?php
                    echo $this->element('admin/image-crop-upload', [
                        'upload' => $entity->avatar,
                        'label' => 'Avatar',
                    ])
                    ?>
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
<script>
    // Depois de carregar a tela
    // apaga os campos de senha que o navegador preenche automaticamente
    $(window).on('load', function () {
        setTimeout(function(){
            if (!$('[name=id]').val()) {
                $('#user, #password, #password-confirm').val('');
            }
        }, 200);
    });
</script>
