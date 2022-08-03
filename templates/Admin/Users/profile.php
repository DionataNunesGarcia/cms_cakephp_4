<?= $this->Form->create(null, ['action' => 'profile', 'enctype' => 'multipart/form-data', 'id' => 'form-profile', 'data-auth' => 'false']) ?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-drivers-license-o"></i> Dados Pessoais']) ?>
    <div class="box-body">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
            <div class="well profile">
                <figure>
                    <?php
                    echo $this->element('admin/image-crop-upload', [
                        'upload' => $user->avatar,
                        'label' => false,
                    ])
                    ?>
                </figure>
                <hr/>
                <div class="text-center">
                    <h2>
                        <?= $user->user ?>
                    </h2>
                </div>
                <div class="text-left">
                    <p>
                        <strong>Nível: </strong>
                        <?= $user->level->name ?>
                    </p>
                    <small>
                        <strong>
                            Membro desde:
                        </strong>
                        <?= \App\Utils\ConvertDates::convertDateToPtBR($user->created, true) ?>
                    </small>
                    <br/>
                    <small>
                        <strong>
                            Primeiro Acesso:
                        </strong>
                        <?= \App\Utils\ConvertDates::convertDateToPtBR($user->first_access, true) ?>
                    </small>
                    <br/>
                    <small>
                        <strong>
                            Último Acesso:
                        </strong>
                        <?= \App\Utils\ConvertDates::convertDateToPtBR($user->last_access, true) ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 no-padding">
            <fieldset>
                <?= $this->Form->hidden('id', ['value' => $user->id]) ?>
                <div class="form-group col-md-6">
                    <?= $this->Form->control('name', [
                        'value' => $user->name,
                        'label' => 'Nome',
                        'required' => true
                    ]); ?>
                </div>
                <div class="form-group col-md-6">
                    <?= $this->Form->control('user', [
                        'value' => $user->user,
                        'label' => 'Usuário',
                        'required' => true
                    ]); ?>
                </div>
                <div class="form-group col-md-6">
                    <?= $this->Form->control('email', [
                        'value' => $user->email,
                        'label' => 'E-mail',
                        'required' => true
                    ]); ?>
                </div>
                <div class="form-group col-md-6">
                    <?=
                    $this->Form->control('phone', [
                        'value' => h($user->phone),
                        'class' => 'phone',
                        'label' => 'Telefone',
                    ]);
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?=
                    $this->Form->control('cell_phone', [
                        'value' => ($user->cell_phone),
                        'class' => 'phone',
                        'label' => 'Celular',
                    ]);
                    ?>
                </div>
                <div class="form-group col-md-6">
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
                <div class="form-group col-md-6">
                    <?=
                    $this->Form->control('password', [
                        'label' => 'Senha',
                        'type' => 'password',
                        'required' => false,
                        'value' => '',
                        'placeholder' => 'Só preencher se for alterar'
                    ]);
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <?=
                    $this->Form->control('password_confirm', [
                        'label' => 'Confirmar Senha',
                        'type' => 'password',
                        'value' => '', 'required' => false,
                        'placeholder' => 'Só preencher se for alterar'
                    ]);
                    ?>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="box-footer text-rigth">
        <?= $this->Form->button('Salvar <i class="fa fa-save"></i>', ['class' => 'btn btn-primary pull-right', 'escapeTitle' => false]);?>
    </div>
</div>
<?= $this->Form->end() ?>

<?= $this->element('admin/image-crop-modal') ?>

<script>
    $(document).ready(function () {
        $('#form-profile').submit(function(){
            if ($('#password').val() !== $('#password-confirm').val()) {
                alert('Os campos de senhas não conferem, verifique e tente novamente.');
                return false;
            }
        });
    });

    // Depois de carregar a tela
    // apaga os campos de senha que o navegador preenche automaticamente
    $(window).on('load', function () {
        setTimeout(function(){
            $('#password, #password-confirm').val('');
        }, 600);
    });
</script>
