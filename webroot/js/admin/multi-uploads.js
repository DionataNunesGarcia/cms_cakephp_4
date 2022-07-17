$(function() {

    // preventing page from redirecting
    $("html")
        .on("dragover", function(e) {
            e.preventDefault();
            e.stopPropagation();
            $("h1").text("Drag here");
        })
        .on("drop", function(e) {
            e.preventDefault();
            e.stopPropagation();
        });

    // Drag enter
    $('.upload-area')
        .on('dragenter, dragover', function (e) {
            e.stopPropagation();
            e.preventDefault();
            $("#uploadfile").text("Solte Aqui");
        })
        // Drop
        .on('drop', function (e) {
            e.stopPropagation();
            e.preventDefault();

            $("#uploadfile").text("Carregando");
            uploadData();
        });

    // Open file selector on div click
    $("#uploadfile").click(function(){
        $("#js-upload-files").click();
    });


    // file selected
    $("#js-upload-files").change(function(){
        uploadData();
    });

    //carrega os arquivos ao carregar a tela
    listUploadFiles();

    // Open file selector on div click
    $("body")
        .on('click', '.delete-arquivo', function(e){
            if (!confirm("Deseja realmente deletar esse arquivo?")) {
                return;
            }
            e.preventDefault();
            deleteFile($(this).data('id'));
        });
});

// Sending AJAX request and upload file
function uploadData(){
    if ($("#js-upload-files").val() == '') {
        return;
    }
    openLoad();
    var formData = new FormData($('#js-upload-form')[0]);
    $.ajax({
        url: multipleFileUploads,
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            console.log(response);
            $.each(response.data, function (i, entity) {
                console.log('i', i);
                console.log('entity ', entity);
                addThumbnail(entity);
            });
            $(".js-upload-finished").fadeIn();
        }
    }).done(function(){
        closeLoad();
    });
}

// Added thumbnail
function addThumbnail(entity){
    $("#uploadfile").text("Clique ou arraste e solte arquivos aqui");
    //começa div
    let html = '<div class="col-md-4 no-padding linha-arquivo" id="file-thumbnail-' + entity.id + '">';

    //imagem
    html += '<div class=" text-center arquivo col-md-12">';
    html += '<img src="'+entity.arquivo+'" class="img-thumbnail img-responsive" ><br>';
    html += '</div>';

    //descrição e titulo
    html += '<div class="col-md-12 text-center " style="padding-bottom: 15px">';
    html += '<span class="size"> Tamanho: '+convertSize(entity.tamanho)+'</span><br>';
    html += '<label>Título</label><br>';
    html += '<input type="hidden" name="arquivo[id][]" value="' + entity.id +'" >';
    html += '<input type="text" name="arquivo[titulo][]" data-id="' + entity.id +'" value="' + entity.titulo +'" class="form-control" autocomplete="off">';
    // html += '<label>Descrição</label><br>';
    // html += '<input type="text" name="arquivo[descricao][]" data-id="' + entity.id +'" value="' + entity.descricao +'" class="form-control"><br>';
    html += '<button type="button" class="btn btn-danger btn-xs delete-arquivo" data-id="' + entity.id + '">Excluir <i class="fa fa-trash"></i></button>';
    html += '</div>';

    //finaliza div
    html += '</div>';
    // Creating an thumbnail
    $("#list-files").append(html);

}

// Bytes conversion
function convertSize(size) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (size == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

// Carrega os arquivos ao inicializar
function listUploadFiles() {
    openLoad();
    $.ajax({
        url: multipleFileUploadsList,
        type: 'GET',
        data: {
            model: $('#js-upload-form [name=model]').val(),
            foreign_key: $('#js-upload-form [name=foreign_key]').val(),
        },
        success: function(response){
            if (response.data.length) {
                $.each(response.data, function (i, entity) {
                    addThumbnail(entity);
                });
                $(".js-upload-finished").fadeIn();
            }
            closeLoad();
        }
    }).done(function(){
        closeLoad();
    });
}

// Carrega os arquivos ao inicializar
function deleteFile(id) {
    openLoad();
    $.ajax({
        url: multipleFileUploadsDelete,
        type: 'POST',
        data: {
            id: id
        },
        success: function(response){
            if (response) {
                $("#file-thumbnail-" + id).fadeOut().remove();
            }
            closeLoad();
        }
    }).done(function(){
        closeLoad();
    });
}
