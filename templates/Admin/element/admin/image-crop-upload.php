<?php
$this->Form->unlockField('image_upload_temp');
$this->Form->unlockField('upload.file');
echo $this->Html->scriptBlock(sprintf(
    'let urlCropImage = %s',
    json_encode(\Cake\Routing\Router::url(['controller' => 'Utils', 'action' => 'cropImageAjax'], true)),
));
if (empty($image)) {
    echo $this->Form->label('Avatar');
    echo $this->Form->file('upload.file', ['class' => 'upload_crop', 'multiple' => false, 'accept' => 'image/*', 'label' => 'Imagem']);
}
if (!empty($image)) {
    ?>
    <div class="col-md-8 no-padding">
        <strong>Imagem</strong><br/>
        <?= $this->Html->image('../Uploads/' . $image, ['class' => 'img-responsive img-usuario img-thumbnail']); ?>
    </div>
    <div class="col-md-4 text-rigth">
        <?=
        $this->Html->link("<i class='fa fa-trash'></i> Excluir", ['controller' => 'Utils', 'action' => 'deleteFile', $id], [
            "alt" => "Avatar",
            'escapeTitle' => false,
            'confirm' => __('Tem certeza de que deseja excluir o arquivo?'),
            'class' => 'btn btn-xs btn-danger tex'
        ]);
        ?>
    </div>
<?php } ?>
<div id="uploaded_image"></div>
