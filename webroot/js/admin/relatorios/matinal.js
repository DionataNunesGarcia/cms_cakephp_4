$(document).ready(function () {
    $("body").on('change',"[name=vendedor_id]", function () {

        var vendedorId = $(this).val();

        if(!vendedorId) {
            $("#mostrar-pastas").html('');
            $("#pastas-titulo").html('Selecione o vendedor');
            return;
        }
        mostrarPastas(vendedorId);
    });

    //Abrir Relatorio
    $("#abrir-relatorio").click(function (e) {
        e.preventDefault();

        let vendedorId = $('[name=vendedor_id]').val();
        if(!vendedorId) {
            alert('Selecione o vendedor.');
            return;
        }
        let pastas = $('[name^=pastas]').val();
        if (!pastas.length) {
            alert('Selecione pelo menos uma Rota.');
            return;
        }

        let url = $(this).attr('href');

        url += '?vendedor=' + vendedorId + '&pastas=' + pastas.join(',');

        window.open(url, '_blank');
    });
});

function mostrarPastas(vendedorId) {
    $("#mostrar-pastas").html('<div class="col-md-12 text-center"><i class="fa fa-spin fa-spinner fa-2x"></i></div>');
    openLoad();
    $.ajax({
        url: $('.box-body').data('url-ajax') + '/' + vendedorId,
        success: function(result){
            $("#pastas-titulo").html('Selecione a(s) pasta(s)');
            $("#mostrar-pastas").html(result);
            closeLoad();
        }
    });
}
