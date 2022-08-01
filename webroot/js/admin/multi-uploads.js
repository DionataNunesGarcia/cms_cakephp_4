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

    //carrega os files ao carregar a tela
    if ($('.gallery-multi-upload-files').length) {
        listUploadFiles();
    }

    // Open file selector on div click
    $("body")
        .on('click', '.delete-file', function(e){
            if (!confirm("Deseja realmente deletar esse arquivo?")) {
                return;
            }
            e.preventDefault();
            deleteFile($(this).data('foreign-key'), $(this).data('model'),$(this).data('id'));
        })
        .on('click', '.download-file', function(e){
            e.preventDefault();
            downloadFile($(this).data('id'));
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
        beforeSend: function(xhr){
            xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
        },
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
    $("#uploadfile").text("Clique ou arraste e solte files aqui");
    let file = pathFiles + entity.filename;
    //start div
    let html = '<div class="col-md-4 no-padding" id="file-thumbnail-' + entity.id + '">';
    html += '<div class="card-file">';

    //image
    html += '<div class=" text-center file col-md-12">';
    if (entity.extension == 'png' || entity.extension == 'jpg' || entity.extension == 'jpeg') {
        html += '<a href="'+ file + '" data-fancybox="gallery" data-caption="'+ entity.alt + '">';
        html += '<img src="'+ file + '" class="img-thumbnail img-responsive"><br>';
        html += '</a>';
    }
    if (entity.extension == 'pdf') {
        html += '<a class="fancybox-pdf" href="'+ file + '" data-fancybox="iframe" data-fancybox-type="iframe" data-caption="'+ entity.alt + '">';
        html += '<i class="fa fa-file-pdf-o fa-5x"></i>';
        html += '</a>';
    }
    html += '</div>';

    //title
    html += '<div class="col-md-12 text-center " style="padding-bottom: 15px">';
    html += '<label>Título</label><br>';
    html += '<input type="hidden" name="file[id][]" value="' + entity.id +'" >';
    html += '<input type="text" name="file[title][]" data-id="' + entity.id +'" value="' + entity.alt +'" class="form-control" autocomplete="off">';
    html += '<button type="button" class="btn btn-primary btn-xs download-file" data-id="' + entity.id + '" data-foreign-key="' + entity.foreign_key + '" data-model="' + entity.model + '"><i class="fa fa-download"></i></button>';
    html += '<button type="button" class="btn btn-danger btn-xs delete-file" data-id="' + entity.id + '" data-foreign-key="' + entity.foreign_key + '" data-model="' + entity.model + '"><i class="fa fa-trash"></i></button>';
    html += '</div>';

    //end div
    html += '</div>';
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

// Carrega os files ao inicializar
function listUploadFiles() {
    openLoad();
    $.ajax({
        url: multipleFileUploadsList,
        type: 'GET',
        beforeSend: function(xhr){
            xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
        },
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

// Carrega os files ao inicializar
function deleteFile(foreignKeys, model, id) {
    openLoad();
    let ok = false;
    $.ajax({
        url: multipleFileUploadsDelete,
        type: 'POST',
        beforeSend: function(xhr){
            xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
        },
        data: {
            foreignKeys: foreignKeys,
            model: model,
        },
        success: function(response){
            closeLoad();
            if (response && $("#file-thumbnail-" + id).length) {
                $("#file-thumbnail-" + id).fadeOut().remove();
            }
        }
    }).done(function(){
        closeLoad();
    });
}

// Carrega os files ao inicializar
function downloadFile(id) {

    //open download link in new page
    window.open( urlDownload + "/" + id );
    //redirect current page to success page
    // window.location="www.example.com/success.html";
    window.focus();
}
