<?php
$placeholder = !empty($user->id) ? 'Só preencher se for alterar' : '';
?>
<?= $this->Form->create(null, ['action' => 'profile', 'enctype' => 'multipart/form-data', 'id' => 'form-profile', 'data-auth' => 'false']) ?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-drivers-license-o"></i> Dados Pessoais']) ?>
    <div class="box-body">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
            <div class="well profile">
                <figure>
                    <?php
                    if (empty($user->avatar)) {
                        echo $this->Form->file('imagem_upload', ['class' => 'upload_crop', 'multiple' => false, 'accept' => 'image/*', 'label' => 'Imagem']);
                    } else {
                        ?>
                        <div class="col-md-12 no-padding">
                            <?=
                            $this->Html->image("../{$user->avatar->file}", [
                                'class' => 'img-circle img-responsive img-usuario img-thumbnail'
                            ]);
                            ?>
                        </div>
                        <div class="col-md-12 text-rigth">
                            <?=
                            $this->Html->link("<i class='fa fa-trash'></i> Excluir Imagem", ['action' => 'delete_image_profile', $user->id], [
                                "alt" => "Avatar",
                                'data-auth' => 'false',
                                'escape' => false,
                                'confirm' => __('Tem certeza de que deseja excluir o arquivo?'),
                                'class' => 'btn btn-danger btn-xs'
                            ]);
                            ?>
                        </div>
                    <?php } ?>
                    <div id="uploaded_image"></div>
                </figure>
                <h2>
                    <?= $user->user ?>
                </h2>
                <hr/>
                <div class="text-left">
                    <p>
                        <strong>Nível: </strong>
                        <?= $user->level->name ?>
                    </p>
                    <p>
                        <strong>
                            Membro desde:
                        </strong>
                        <?= \App\Utils\ConvertDates::convertDateToPtBR($user->created) ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 no-padding">
            <fieldset>
                <div class="form-group col-md-4">
                    <?= $this->Form->control('usuario', [
                        'value' => $user->user,
                        'required' => true
                    ]); ?>
                </div>
                <div class="form-group col-md-4">
                    <?= $this->Form->control('password', ['label' => 'Senha', 'type' => 'password', 'required' => false, 'value' => '', 'placeholder' => $placeholder]); ?>
                </div>
                <div class="form-group col-md-4">
                    <?= $this->Form->control('password_confirm', ['label' => 'Confirmar Senha', 'type' => 'password', 'value' => '', 'required' => false, 'placeholder' => $placeholder]); ?>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="box-footer text-rigth">
        <?= $this->Form->submit('Salvar <i class="fa fa-save"></i>', ['class' => 'btn btn-primary pull-right', 'escapeTitle' => false]);?>
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
            debugger
            $('#password, #password-confirm').val('');
        }, 600);
    });
</script>
