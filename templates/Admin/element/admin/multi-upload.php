<?php
$accept = !isset($accept) ? '*' : $accept;
?>
<div class="gallery-multi-upload-files">
    <div class="">
        <!-- Standar Form -->
        <h4>Selecione arquivos do seu computador</h4>
        <?php if (isset($sizeImages) && !empty($sizeImages)) { ?>
            <strong>Tamanho da imagem sugerida: <?= h($sizeImages) ?> </strong>
        <?php } ?>
        <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
                <?= $this->Form->hidden('foreign_key', ['value' => $foreignKey]) ?>
                <?= $this->Form->hidden('model', ['value' => $model]) ?>
                <div class="form-group hidden">
                    <input type="file" name="files[]" accept="<?= $accept?>" id="js-upload-files" multiple>
                </div>
            </div>
            <div class="upload-area upload-drop-zone" id="uploadfile">
                Clique ou arraste e solte arquivos aqui
            </div>

            <!-- Upload Finished -->
            <div class="js-upload-finished">
                <h3>Arquivos Processados</h3>
                <div class="list-group" id="list-files">
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .js-upload-finished {
        display: none;
    }
    /* layout.css Style */
    .upload-drop-zone {
        height: 200px;
        border-width: 2px;
        margin-bottom: 20px;
        color: #ccc;
        border-style: dashed;
        border-color: #ccc;
        line-height: 200px;
        text-align: center;
        font-size: 25px;
    }
    .upload-drop-zone.drop {
        color: #222;
        border-color: #222;
    }
    #list-files div.card-file {
        border: 1px solid #dee2e6 !important;
        margin: 10px !important;
        box-shadow: 0 1px 2px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        min-height: 215px;
    }
    #list-files button{
        margin-bottom: 10px;
        margin-right: 5px;
    }
    #list-files .file {
        max-height: 100px;
        min-height: 100px;
        margin-top: 10px;
    }
    #list-files .file img {
        max-height: 100px;
        min-height: 100px;
        margin-bottom: 10px;
    }
</style>
<script>
    let multipleFileUploads = "<?= $this->Url->build(['controller' => 'Utils', 'action' => 'multipleFileUploads',])?>";
    let multipleFileUploadsList = "<?= $this->Url->build(['controller' => 'Utils', 'action' => 'multipleFileUploadsList',])?>";
    let multipleFileUploadsDelete = "<?= $this->Url->build(['controller' => 'Utils', 'action' => 'multipleFileUploadsDelete',])?>";
    let urlDownload = "<?= $this->Url->build(['controller' => 'Utils', 'action' => 'download',])?>";
    let pathFiles = "<?= \Cake\Routing\Router::url('/', true) . 'Uploads/' ?>";
</script>
<?= $this->Html->script(['/js/admin/multi-uploads'], ['block' => 'custom']) ?>
