function setup() {

    //Adiciona tooltips em elements
    $('a[title], button[title], div[title], strong[title], span[title], p[title], h1[title], h2[title], img[title], table td[title], table th[title], img[alt], input[title], textarea[title], label[title], tr[title]').tooltip({
        container: ".wrapper",
        html: true
    });

    //adiciona classes bootstrap aos formulários
    $('input[type=text], input[type=password], input[type=email], input[type=number], input[type=url], select').addClass('form-control');

    $('nav#actions-sidebar').remove();

    //Adiciona * nos labels que forem de input requeridos usando a class required
    $('section.content form').find('input, select, textArea, radio').each(function () {
        if ($(this).prop('required')) {
            $(this).prev("label").addClass('required');
            if ($(this).attr('type') === 'radio') {
                $("label[for='" + this.name + "']").addClass('required');
            }
        }
    });

    $('button#reset').click(function () {
        var form = $(this).closest("form");
        form.find('input').each(function () {
            $(this).val('');
        });
        return false;
    });

    //Remove menus vázios
    $('ul.sidebar-menu li.treeview').each(function () {
        if ($(this).find('ul.treeview-menu li').length === 0) {
            $(this).remove();
        }
    });

    /*----------------START AUTOCOMPLETE------------------------*/
    $("input.autocomplete").autocomplete({
        source: function (request, response) {
            var $_this = $(this.element);
            $_this.addClass('carregando');

            var url = $_this.attr('data-url') + '?term=' + encodeURIComponent(request.term);

            return $.get(url, response, 'json').done(function () {
                $_this.removeClass('carregando');
            });
        },
        minLength: 1,
        autoFocus: true,
        type: 'json',
        create: function (event, ui) {
            if ($('#' + $(this).attr('name') + '_id').val() !== '') {
                var $_this = $(this);
                $_this.addClass('carregando');

                var idValue = $('#' + $_this.attr('name') + '_id').val();

                $.get(
                        $_this.attr('data-url'),
                        {id: idValue}
                ).done(function (data) {
                    data = JSON.parse(data);
                    $_this.val(data[0].value);
                    $_this.removeClass('carregando');
                });
            }
        },
        select: function (event, ui) {
            $('#' + $(this).attr('name') + '_id').val(ui.item.id);
            $('#' + $(this).attr('name') + '_label').val(ui.item.value);
        },
        search: function (event, ui) {
            $('#' + $(this).attr('name') + '_id').val('');
        },
        onSearchError: function (query, jqXHR, textStatus, errorThrown) {
            addHelp($(this).attr('name'), errorThrown);
            $(this).removeClass('carregando');
        }
    });


    $('.autocomplete-component').on('click', '.autocomplete-btn.abrir', function () {
        var selecionado = $('#' + $(this).data('abrir') + '_id').val();//Pega o id selecionado

        if (selecionado === '') {//Se não tiver nenhum selecionado, mostra o erro no label
            alert('Não pode abrir pois não tem nenhum valor selecionado corretamente.');
            return false;
        }
        var url = $(this).attr('href') + '/' + selecionado;
        window.open(url, '_blank');
        return false;
    });

    if ($('.panel.panel-default').length > 0) {
        var hash = window.location.hash;
        hash && $('ul.nav.nav-tabs a[href="' + hash + '"]').tab('show');
        $('ul.nav.nav-tabs a').click(function (e) {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop();
            window.location.hash = this.hash;
        });
    }
    /*----------------END AUTOCOMPLETE------------------------*/

    //Date range picker
    $('.dates-start-end').daterangepicker({
        "locale": {
            format: "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "De",
            "toLabel": "Até",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sáb"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            startDate: null,
            endDate: null
        }
    }).val('');
    $('.dates-start-end-load').each(function(e) {
        if ($(this).val() != '') {
            $("#" + $(this).data('id')).val($(this).val());
        }
    });

    //Date range picker with time picker
    $('.dates-start-end-hour').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'DD/MM/YYYY h:mm',
        "locale": {
            format: "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "De",
            "toLabel": "Até",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sáb"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            startDate: null,
            endDate: null
        }
    });

    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
    );

    //Date picker
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });

    $(".datepicker").inputmask("99/99/9999");

    $('.month-year').datepicker({
        format: "mm/yyyy",
        startView: "year",
        minViewMode: "months",
        language: 'pt-BR'
    });
    $(".month-year").inputmask("99/9999");

    //Somente ano
    $('.year').datepicker( {
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    }).on('changeDate', function(e){
        $(this).datepicker('hide');
    });
    $(".year").inputmask("9999");


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    //Timepicker
    $('.timepicker').timepicker({
        showInputs: false,
        showMeridian: false,
//        defaultTime: false
    });

    //CPF
    $(".cpf").inputmask("999.999.999-99");
    $(".cnpj").inputmask("99.999.999/9999-99");
    $(".cpf-cnpj").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
    });
    $(".cep").inputmask("99999-999");

    //Campos somente com numeros
    $('.integer').keyup(function () {
        $(this).val(this.value.replace(/\D/g, ''));
    });

    //Mascara para telefones
    $(".phone").inputmask({
        mask: ["(99) 9999-9999", "(99) 9999-99999", ],
        keepStatic: true
    });

    $(".nf2Cifrado")
        .attr('maxlength', 5000)
        .maskMoney({
            prefix: "R$ ",
            decimal: ",",
            thousands: "."
        });

    $(".nf2").maskMoney({
        decimal: ",",
        thousands: ".",
    });

    $(".nf3").maskMoney({
        decimal: ",",
        thousands: ".",
        precision: 3
    });
    $('.color-picker').colorpicker({
        customClass: 'colorpicker-2x',
        sliders: {
            saturation: {
                maxLeft: 200,
                maxTop: 200
            },
            hue: {
                maxTop: 200
            },
            alpha: {
                maxTop: 200
            }
        }
    });

    //Initialize Select2 Elements
    $.fn.select2.defaults.set('language', 'pt-BR');
    $.fn.select2.defaults.set('debug', true);

    //Ajax quando é pesquisado o select2
    $(".select2-ajax").select2({
        language: "pt-BR",
        multiple: $(this).attr('multiple'),
        ajax: {
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term
                };
            },
            processResults: function (data, params) {
                return {
                    results: $.map(data, function (item, i) {
                        return {
                            id: item.id,
                            text: item.value,
                            html: '<option value="' + item.id + '">' + item.value + '</option>',
                        };
                    })
                };
            },
            cache: false
        },
        escapeMarkup: function (markup) {
//            console.log(markup);
            return markup;
        },
        placeholder: 'Pesquise aqui',
        minimumInputLength: 0,
    });

    //Executa quando carrega a tela
    if ($('.select2-ajax').length) {
        //verifica se tem um ou mais componentes de select2 usados com ajax na tela
        $('.select2-ajax').each(function () { //executa todos os selects para ver se tem valores

            var $element = $(this); // seta o elemento
            var ids = $element.attr('data-val');

            if (ids !== '0') { //verifica se tem valores para carregados via ajax
                var $request = $.ajax({
                    url: $(this).data('ajax--url'), // pega a url pelo atributo data
                    data: {id: ids}, //converte os ids em string
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
        });
    }

    $(".select2-tags").select2({
        tags: true,
        multiple: true,
        tokenSeparators: [';', ' '],
        createTag: function (tag) {
            console.log(tag);
            return {
                id: tag.term,
                text: tag.term,
                // add indicator:
                isNew: true
            };
        }
    });

    //Executa quando carrega a tela
    if ($('.select2-tags').length) {
        //verifica se tem um ou mais componentes de select2 usados com ajax na tela
        $('.select2-tags').each(function () { //executa todos os selects para ver se tem valores
            var $element = $(this); // seta o elemento
            var values = $element.data('values');

            $.each(values, function (i, item) {

                // Create the DOM option that is pre-selected by default
                var option = new Option(item, item, true, true);

                // Append it to the select
                $element.append(option);
            });

            // Update the selected options that are displayed
            $element.trigger('change');
        });
    }

    if ($(".cep").length) {
        $(".cep").blur(function () {
            // Remove tudo o que não é número para fazer a pesquisa
            var cep = this.value.replace(/[^0-9]/, "");

            // Validação do CEP; caso o CEP não possua 8 números, então cancela
            // a consulta
            if (cep.length != 8) {
                return false;
            }

            // A url de pesquisa consiste no endereço do webservice + o cep que
            // o usuário informou + o tipo de retorno desejado (entre "json",
            // "jsonp", "xml", "piped" ou "querty")
            var url = "http://viacep.com.br/ws/" + cep + "/json/";

            // Faz a pesquisa do CEP, tratando o retorno com try/catch para que
            // caso ocorra algum erro (o cep pode não existir, por exemplo) a
            // usabilidade não seja afetada, assim o usuário pode continuar//
            // preenchendo os campos normalmente
            $.getJSON(url, function (dadosRetorno) {
                try {
                    // Preenche os campos de acordo com o retorno da pesquisa
                    $("#rua").val(dadosRetorno.logradouro);
                    $("#bairro").val(dadosRetorno.bairro);
                    // $("#cidade").val(dadosRetorno.localidade);
                    // $("#uf").val(dadosRetorno.uf);
                    carregaCidadeUf(dadosRetorno.localidade, dadosRetorno.uf);
                } catch (ex) {
                }
            });
        });
    }

    $(':reset').click(function (e) {
        var form = $(this).closest("form");
        form.find('input').each(function () {
            $(this).val('');
        });
        $(".select2-ajax").each(function () {
            $(this).val('').trigger('change');
        });
        return false;
    });

//    $('span.string-to-json').each(function(){
//        var string = $.trim($(this).html());
//        console.log(string);
//        if(string !== ''){
//            var obj = JSON.parse(string);
//            $(this).html('<pre>' + JSON.stringify(obj, undefined, 2) + '</pre>');
//        }
//    });

    $(document).ajaxError(function (e, jqXHR, ajaxSettings, thrownError) {
        // if 403 - check if user still has active session - if not redirect to login page
        if (jqXHR.status == '403') {
            // inactive session so redirect to login page
            window.location = $('body').data('url') + "admin/users/logout";
        } else if (jqXHR.status == '500') {
            //window.location = $('body').data('url') + "admin/usuarios/logout";
        }
    });

    $('body').append('<div id="toTop" class="btn btn-primary"><span class="fa fa-chevron-up"></span></div>');
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
}
