<?php
$this->Form->unlockField('image_upload_temp');
$this->Form->unlockField('upload.file');
$classDiv = $upload ? 'hidden-upload' : '';
echo "<div class='col-md-8 no-padding input-file-avatar $classDiv'>";
echo $this->Form->label($label);
echo $this->Form->file('upload.file', ['class' => 'upload_crop', 'multiple' => false, 'accept' => 'image/*', 'label' => 'Imagem']);
echo '</div>';
if (!empty($upload->filename)) {
    ?>
    <div class="file-avatar">
        <div class="col-md-8 no-padding">
            <strong>Imagem</strong><br/>
            <?= $this->Html->image('../Uploads/' . $upload->filename, ['class' => 'img-responsive img-usuario img-thumbnail']); ?>
        </div>
        <div class="col-md-4 text-right file-avatar">
            <?=
            $this->Html->link("<i class='fa fa-trash'></i> Excluir", '#', [
                "alt" => $label,
                'escapeTitle' => false,
                'class' => 'btn btn-xs btn-danger delete-file',
                'data-auth' => 'false',
                'data-foreign-key' => $upload->foreign_key,
                'data-model' => $upload->model,
                'data-id' => $upload->id,
            ]);
            ?>
        </div>
    </div>
<?php } ?>
<div id="uploaded_image"></div>
<style>
    .hidden-upload {
        display: none;
    }
</style>
<script>
    let multipleFileUploadsDelete = "<?= $this->Url->build(['controller' => 'Utils', 'action' => 'multipleFileUploadsDelete',])?>";

    $("body")
        .on('click', '.file-avatar .delete-file', function(e){
            if (!confirm("Deseja realmente deletar esse arquivo?")) {
                return;
            }
            e.preventDefault();
            deleteFile($(this).data('foreign-key'), $(this).data('model'),$(this).data('id'));
            $('.input-file-avatar').removeClass('hidden-upload');
            $('.file-avatar').addClass('hidden-upload');
        });
</script>
<?= $this->Html->script(['/js/admin/multi-uploads'], ['block' => 'custom']) ?>
