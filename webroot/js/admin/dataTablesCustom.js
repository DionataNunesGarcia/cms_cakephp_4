$(document).ready(function () {
    datatablesCustom.init();
});

let datatablesCustom = {
    init: function () {
        datatablesCustom.bind();
    },
    bind: function () {
        $('body')
            .on('click', 'table.table-datatable .btn-delete', function (e) {
                e.preventDefault();
                if (!confirm('Tem certeza que deseja remover esse registro?')) {
                    return;
                }
                datatablesCustom.deleteRecord($(this).attr('href'));
            })
            .on('click', '#deleted-selected', function (e) {
                e.preventDefault();
                datatablesCustom.deleteRecordsSelected($(this).attr('href'));
            })
            .on('click', 'thead [name=select_all]', function () {
                $('body table.table-datatable tbody input[name^=selected]')
                    .not(this)
                    .prop('checked', this.checked);
                datatablesCustom.verifyCheckboxSelected();
            })
            .on('click', 'tbody [name^=selected]', function () {
                datatablesCustom.verifyCheckboxSelected();
            })
        ;
    },
    buildBtnEdit: function (url) {
        if (!url) {
            return ``;
        }
        return `
          <a class="btn btn-primary btn-xs btn-edit" href="${url}">
            <i class="fa fa-edit"></i>
          </a>
        `;
    },
    buildBtnView: function (url) {
        if (!url) {
            return ``;
        }
        return `
          <a class="btn btn-default btn-xs btn-view" href="${url}">
            <i class="fa fa-eye"></i>
          </a>
        `;
    },
    buildBtnDelete: function (url) {
        if (!url) {
            return ``;
        }
        return `
          <a class="btn btn-danger btn-xs btn-delete" href="${url}">
            <i class="fa fa-trash"></i>
          </a>
        `;
    },
    verifyCheckboxSelected: function () {
        let button = $('#deleted-selected')
        if ($('[name*=selected]:checked').length > 0) {
            button.fadeIn();
        } else {
            button.fadeOut();
            $('[name=select_all]').prop('checked', false);
        }
        if ($('[name*=selected]:checked').length === $('[name*=selected]').length) {
            $('[name=select_all]').prop('checked', true);
        } else {
            $('[name=select_all]').prop('checked', false);
        }
    },
    deleteRecord: function (url) {
        $.ajax({
            url: url,
            method: 'DELETE',
            // contentType: 'application/json',
            beforeSend: function(xhr){
                xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
            },
            data: {
                '_method': 'DELETE',
                '_csrfToken': _csrfToken,
            },
            success: function(result) {
                // handle success
                openLoad();
                alert(result.message);
                console.log('result: ', result);
                datatableCurrent.draw('page')
            },
            error: function(request, msg, error) {
                // handle failure
                console.log('request: ', request);
                console.log('msg: ', msg);
                console.log('error: ', error);
            },
            complete: function () {
                closeLoad();
            }
        });
    },
    deleteRecordsSelected: function (url) {
        let checked = $('[name*=selected]:checked');
        if (!checked.length) {
            alert('Não existe nenhum item selecionado.');
            return false;
        }
        if (!confirm('Deseja realmente excluir o(s) ' + checked.length + ' registro(s)')) {
            return false;
        }
        let ids = '';
        checked.each(function () {
            ids += (ids !== '') ? ',' : '';
            ids += $(this).val();
        });
        datatablesCustom.deleteRecord(url + '/' + ids);
    },
    configDatatables: function () {
        return {
            dom: 'lfrtip',
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Processando...</span>',
                "oPaginate": {
                    "sNext": '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                    "sPrevious": '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "0": "Nenhuma linha selecionada",
                        "1": "Selecionado 1 linha",
                        "_": "Selecionado %d linhas"
                    }
                },
                "buttons": {
                    "copy": "Copiar",
                    "copyTitle": "Cópia bem sucedida",
                    "copySuccess": {
                        "1": "Uma linha copiada com sucesso",
                        "_": "%d linhas copiadas com sucesso"
                    }
                },
            },
        };
    },
}
