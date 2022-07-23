/*
 * Adiciona todas as funções para o sistema
 */

function addHelp(name, text) {
    if (text === 'default') {
        text = 'Campo obrigatório, não pode ficar em branco.';
    }
    var $_this = $('[name=' + name + ']');
    $_this.prev('strong.help-block').remove();
    $_this.focus();
    $_this.attr('data-content', text).popover({
        trigger: 'open'
    });
    $_this.parents('div.form-group').addClass('has-error');

}

function verifyPermissions() {
    if (!userPermissions.super) {
        return;
    }
    let permissionsList = userPermissions.level.levels_permissions;
    console.log(permissionsList);

    $('a[href]').each(function () {
        var href = $(this).attr('href');

        if ($(this).attr('data-auth') === 'false' || $(this).closest('table.table thead th').length || href.substr(0, 1) === '#' || href === '') {
            return;
        }

        if (!hasPermission(permissionsList, href)) {
            $(this).parent('li').remove();
            $(this).remove();
        }
    });

    $('form[action^="/admin"]').not('[method="get"]').each(function () {
        var action = $(this).attr('action');
        if ($(this).attr('id') === 'search' || $(this).attr('data-auth') === 'false') {
            return;
        }

        if (!hasPermission(permissionsList, action)) {

            $(this).find(':input:not(:disabled)').prop('disabled', true);
            $(this).find('button[type=submit], .autocomplete-btn').remove();
            $(this).attr('action', '');
            $(this).before('<div class="alert alert-warning"><i class="icon fa fa-warning"></i>Você não tem permissão para salvar os dados desse formulário.</div>');
        }
    });
    // //Remove os menu pai se estiver vázio os submenus
    $('ul.sidebar-menu li.treeview').each(function () {
        if ($(this).find('ul.treeview-menu').length && $(this).find('ul.treeview-menu li').length === 0) {
            $(this).remove();
        }
    });
}

function hasPermission(permissionsList, href) {
    href = urlConvert(href);
    let ok = false;

    $.each(permissionsList, function (i, item) {
        if (
            item.prefix.toLowerCase() === href.prefix
            &&
            item.controller.toLowerCase() === href.controller
            &&
            item.action.toLowerCase() === href.action
        ) {
            ok = true;
        }
    });
    return ok;
}

function urlConvert(href) {
    let url = urlHome.toLocaleLowerCase();

    href = href.replace(/-/, '').toLocaleLowerCase();
    if (href.indexOf('?') === 0) {
        href = href.replace(/\?.*$/, '');
    }
    if (href.indexOf('#') === 0) {
        href = href.replace(/#.*$/, '');
    }

    if (href.indexOf(url) === 0) {
        href = href.replace(url, "");
    }

    if (href.substr(0, 1) === '/') {
        href = href.substr(1, href.lenth);
    }

    href = href.split('/');
    let action = 'index';
    if (href[2] != undefined || href[2] == '') {
        action = href[2];
    }
    return {
        prefix: href[0],
        controller: href[1],
        action: action,
    };
}

function openLoad() {
    $('#loading').show();
}

function closeLoad() {
    $('#loading').fadeOut();
}

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}

function validaCpf(cpf) {
    cpf = cpf.replace(/\D/g, '');
    if (cpf.length !== 11 || cpf === "00000000000" || cpf === "11111111111" || cpf === "22222222222" || cpf === "33333333333" || cpf === "44444444444" || cpf === "55555555555" || cpf === "66666666666" || cpf === "77777777777" || cpf === "88888888888" || cpf === "99999999999") {
        return false;
    }
    var add = 0;
    for (i = 0; i < 9; i++) {
        add += parseInt(cpf.charAt(i)) * (10 - i);
    }
    var rev = 11 - (add % 11);
    if (rev === 10 || rev === 11) {
        rev = 0;
    }
    if (rev !== parseInt(cpf.charAt(9))) {
        return false;
    }
    add = 0;
    for (i = 0; i < 10; i++) {
        add += parseInt(cpf.charAt(i)) * (11 - i);
    }
    rev = 11 - (add % 11);
    if (rev === 10 || rev === 11) {
        rev = 0;
    }
    if (rev !== parseInt(cpf.charAt(10))) {
        return false;
    }
    return true;
}

function validaUrl(url) {
    var patternUrl = new RegExp(/^(https?):\/\/([a-zA-Z0-9_-]+)(\.[a-zA-Z0-9_-]+)+(\/[a-zA-Z0-9_-]+)*\/?$/gi);
    if (!url.match(patternUrl)) {
        return false;
    }
    return true;
}

function buscaDiasMeses(mes){
    var ano = $('[name=ano]').val();
    $.ajax({
        url: $('.box-body').data('url-ajax'),
        data: {mes: mes, ano: ano},
        success: function(result){
            $("#popula-dias-mes").html(result);
        }
    });
}

function tiposCodigosCoringas(tipo){
    $("#mostrar-codigos").html('<div class="col-md-12"><i class="fa fa-spin fa-spinner fa-2x"></i></div>');
    $.ajax({
        url: $('.box-body').data('url-ajax'),
        data: {tipo: tipo},
        success: function(result){
            $("#mostrar-codigos").html(result);
        }
    });
}

function tiposCodigosNomenclaturas(tipo){
    $("#mostrar-codigos").html('<div class="col-md-12 text-center"><i class="fa fa-spin fa-spinner fa-2x"></i></div>');

    var tipo_salvo = '';
    if ($('[name=tipo_salvo]').length) {
        var tipo_salvo = $('[name=tipo_salvo]').val();
    }

    $.ajax({
        url: $('.box-body').data('url-ajax'),
        data: {
            tipo: tipo,
            idsSalvos: $('[name=ids_salvos]').val(),
            tipoSalvo: tipo_salvo,
        },
        success: function(result){
            $("#mostrar-codigos").html(result);
        }
    });
}

function mensagensNaoLidas() {
    // var retorno;
    // var url = $('body').data('url');
    // var urlAjax = url + 'admin/home/mensagens-logado';
    //
    // $.ajax({
    //     url: urlAjax,
    //     type: 'post',
    //     async: false
    // }).done(function (retorno) {
    //     $('#menu-mensagens').html(retorno);
    // });
    //
    // return retorno;
}

function activeMenu() {

    var url = window.location;
    // Will only work if string in href matches with location
    $('.treeview-menu li a[href="' + url.href + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
    $('.treeview-menu li a').filter(function () {
        return this.href === url.href;
    }).parent().parent().parent().addClass('active');

    if ($('ul.treeview-menu li.active').length == 0) {
        var element = $('ul.sidebar-menu a').filter(function () {
            if ($(this).attr('href') != '#') {
                return (this.href == url || url.href.indexOf(this.href) == 0);
            }
        });
        if (element.length === 0) {
            element = $('ul.sidebar-menu a').filter(function () {
                return url.href.indexOf(this.href.replace("pesquisar", "")) === 0;
            });
        }
        $(element).parentsUntil('ul.sidebar-menu', 'li').addClass('active');
    }

}

function tipoCobertura(volume){

    if (volume == 'Cobertura') {
        $('#tipo-cobertura-hide').fadeIn();
    } else {
        $('#tipo-cobertura-hide').fadeOut();
        $('#tipo-cobertura').val('')
    }
}

function carregaCidadeUf(cidade, uf){
    var urlCidade = $('body').data('url') + 'admin/cidades/get-cidade?cidade=' + cidade + '&uf=' + uf;
    $.getJSON(urlCidade, function (dados) {
        try {
            changeSelect2("#select2-cidade",dados.id);
            changeSelect2("#select2-estado",dados.estado_id);
            console.log(dados);
        } catch (ex) {
        }
    });
}

function changeSelect2(field, idSearch) {
    if ($(field).length) {
        var $element = $(field);
        var $request = $.ajax({
            url: $element.data('ajax--url'), // pega a url pelo atributo data
            data: {id: idSearch}, //converte os ids em string
            dataType: 'json'
        });
        $request.then(function (data) {
            for (var d = 0; d < data.length; d++) {
                var item = data[d];
                // Create the DOM option that is pre-selected by default
                var option = new Option(item.value, item.id, true, true);
                // Append it to the select
                $element.append(option);
            }
            // Update the selected options that are displayed
            $element.trigger('change');
        });
    }
}
