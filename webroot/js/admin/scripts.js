$(document).ready(function () {
    openLoad();
    setup();

    verificaPermissoes();

    //Abre o modal clicando no link
    $('body').on('click', 'a[data-open-modal-id]', function (e) {
        e.preventDefault();
        openLoad();

        var url = $(this).attr('href');
        var id_div = $(this).data('open-modal-id');

        if(id_div !== ''){
            var $modal = $('#' + id_div);

            $modal.load(url,{id:id_div }, function () {
                closeLoad();
                $modal.modal('toggle');
            });
        }
    });

    //Ao clicar em uma skin, mostra no body mas só mostra se salvar
    $('ul.list-unstyled a').click(function () {
        $('[name=tema_dashboard]').val($(this).data('skin'));
        $('body').removeClass('skin-blue skin-black skin-red skin-yellow skin-purple skin-green skin-blue-light skin-black-light skin-red-light skin-yellow-light skin-purple-light skin-green-light');

        $('ul.list-unstyled a').removeClass('skin-selected');
        $(this).addClass('skin-selected');
        $('body').addClass($(this).data('skin'));
    });

    //Se carregar o formulario do usuario, adiciona a classe na skin selecionada
    if ($('form#form-usuario').length && $('[name=tema_dashboard]').val() !== '') {
        $('ul.list-unstyled a').each(function () {
            if ($(this).data('skin') === $('[name=tema_dashboard]').val()) {
                $(this).addClass('skin-selected');
            }
        });
    }

    if ($('table.table').length && $('table.table tbody tr').length === 0) {
        var colunas = $('table.table thead th').length;
        var html = '<tr><td colspan="' + colunas + '" class="text-center">Não possui registros</td></tr>';

        $('table.table tbody').html(html);
    }

    //Seleciona todos as actions do controlador ao clicar
    $('.seleciona-perfis [name=selecionar-todos]').click(function () {
        var id = $(this).data('controller');

        $('#' + id + ' input:checkbox').not(this).prop('checked', this.checked);
    });

    if ($('.seleciona-perfis').length) {
        $('.seleciona-perfis').each(function () {
            if ($('#' + this.id + '.seleciona-perfis [name*=action]').length === $('#' + this.id + '.seleciona-perfis [name*=action]:checked').length) {
                $('#' + this.id + '.seleciona-perfis [name*=selecionar-todos]').prop('checked', true);
            }
        });
    }


    var $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: (typeof $('.upload_crop').data('width') !== 'undefined') ? $('.upload_crop').data('width') -50 : 290,
            height: (typeof $('.upload_crop').data('width') !== 'undefined') ? $('.upload_crop').data('width') -50 : 290,
            type: 'square' //circle
        },
        boundary: {
            width: (typeof $('.upload_crop').data('width') !== 'undefined') ? $('.upload_crop').data('width') : 300,
            height: (typeof $('.upload_crop').data('height') !== 'undefined') ? $('.upload_crop').data('height') : 300
        }
    });

    if ($('ul.sidebar-menu ').length) {
        activeMenu();
    }

    //------------------CROP IMAGEM INICIO------------------
    $('.upload_crop').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function (data) {
                console.log('jQuery bind complete');
            });
        };
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function (event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            $.ajax({
                url: "/admin/usuarios/crop-image-ajax",
                type: "POST",
                data: {"image": response},
                success: function (data){
                    $('#uploadimageModal').modal('hide');
                    $('#uploaded_image').html(data);
                    $('.upload_crop').hide();
                }
            });
        });
        return false;
    });
    //------------------CROP IMAGEM FIM------------------

    if($('form#form-jogadores [name=id]').val() !== ''){
        $('.box-footer .btn.btn-proximo').hide();
    }

    $('.btn-proximo').click(function () {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
        if($('.nav-tabs li.active a:first').attr('href') === "#dados-documentos"){
            $('.box-footer .btn.btn-proximo').hide();
        }
    });

    $("#dias-mes").html('Aguarde...');
    $('#escolha_mes').change(function(){
        buscaDiasMeses($(this).val());
    });
    if($('#escolha_mes').length){
        buscaDiasMeses($('#escolha_mes').val());
    }

    $('form#coringas #tipo').change(function(){
        tiposCodigosCoringas($(this).val());
    });

    if($('form#coringas [name=tipo]').length){
        tiposCodigosCoringas($('form#coringas [name=tipo]').val());
    }

    $('form#nomenclaturas #tipo').change(function(){
        tiposCodigosNomenclaturas($(this).val());
    });

    if($('form#nomenclaturas [name=tipo]').length){
        tiposCodigosNomenclaturas($('form#nomenclaturas [name=tipo]').val());
    }

    $('body').on('click', "[data-open-modal-id='visualizar_mensagem']", function() {
        $(this).attr('data-visualizado', 1);

        mensagensNaoLidas();
    });
    setInterval("mensagensNaoLidas()", 300000);

    $('form#nomenclaturas #volume').change(function(){
        tipoCobertura($(this).val());
    });
    if($('form#nomenclaturas [name=volume]').length){
        tipoCobertura($('form#nomenclaturas [name=volume]').val());
    }
});

$(window).on('load', function () {
    mensagensNaoLidas();
    closeLoad();
    if ($('input#usuario-senha').length) {
        setTimeout(function(){
            $('#usuario-confimar-senha').val('');
            $('#usuario-senha').val('');

            if ($('input#usuario-usuario').length && $('input#usuario-save').val() == '') {
                $('input#usuario-usuario').val('');
            }
        }, 300);
    }
});