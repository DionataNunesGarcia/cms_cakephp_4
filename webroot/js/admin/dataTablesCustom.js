$(document).ready(function () {
    datatablesCustom.init();
});

let datatablesCustom = {
    init: function () {
        datatablesCustom.bind();
    },
    ajax: function (url) {
        return {
            "url": url,
            "type": 'GET',
            "data": function (d) {
                d.filter_custom = $('form#datatable-search').serializeArray();
            },
            error: function (xhr, error, thrown) {
                alert('Unable to load data');
            }
        };
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
            .on('submit', 'form#datatable-search', function (e) {
                e.preventDefault();
                datatableCurrent.draw();
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
    buildBtnViewModal: function (url, entity, modalId) {
        if (!url) {
            return ``;
        }
        entity = encodeURIComponent(JSON.stringify(entity));
        return `
          <a class="btn btn-default btn-xs btn-view-modal" href="${url}" data-entity="${entity}">
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
                alert(result.message);
                console.log('result: ', result);
                datatableCurrent.draw('page')
            },
            error: function(request, msg, error) {
                // handle failure
                console.log('request: ', request);
                console.log('msg: ', msg);
                console.log('error: ', error);
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
    convertObjectString: function(entityString) {
        let entityObject = [];
        if (entityString != '') {
            entityObject = JSON.parse(decodeURIComponent(entityString));
        }
        return entityObject;
    },
    dom: function () {
        return "<'row'<'col-sm-3'l><'col-sm-5'f><'col-sm-4 mt10'B>>\
                    <'table-responsive'rt><'row'<'col-sm-6'i><'col-sm-6'p>>";
    },
    buttons: function () {
        return [
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> Imprimir',
                titleAttr: 'Copy',
                className: 'bnt btn-sm btn-primary btn-export',
                title: titlePdf + ' - '  + dateTime,
                action: datatablesCustom.newExportAction,
                messageTop: writeFilters,
            },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i> Copiar',
                titleAttr: 'Copy',
                className: 'bnt btn-sm btn-primary btn-export',
                title: titlePdf + ' - '  + dateTime,
                action: datatablesCustom.newExportAction,
                messageTop: writeFilters,
                footer: true
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr: 'Excel',
                className: 'bnt btn-sm btn-primary btn-export',
                title: titlePdf + ' - '  + dateTime,
                action: datatablesCustom.newExportAction,
                messageTop: writeFilters,
                footer: true
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i> CSV',
                titleAttr: 'CSV',
                className: 'bnt btn-sm btn-primary btn-export',
                title: titlePdf + ' - '  + dateTime,
                action: datatablesCustom.newExportAction,
                messageTop: writeFilters,
                footer: true
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF',
                className: 'bnt btn-sm btn-primary btn-export',
                orientation: 'portrait',
                pageSize: 'A4',
                title: titlePdf + ' - '  + dateTime,
                action: datatablesCustom.newExportAction,
                messageTop: writeFilters,
                footer: true,
                exportOptions: {
                    modifier: {
                        stripNewlines: false,
                        stripHTML: false,
                        page: 'current'
                    },
                    stripNewlines: false
                },
                customize: function ( doc ) {
                    doc.pageMargins = [
                        30,
                        20,
                        30,
                        10
                    ];
                    doc['header']=(function(page, pages) {
                        return {
                            columns: [
                                clientName,
                                {
                                    // This is the right column
                                    alignment: 'right',
                                    text: ['página ', { text: page.toString() },  ' de ', { text: pages.toString() }]
                                }
                            ],
                            margin: [10, 0],
                        }
                    });
                },
            },
        ];
    },
    newExportAction: function (e, dt, button, config) {
        let self = this;
        let oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function (e, settings) {
                // Call the original action function
                if (button[0].className.indexOf('buttons-copy') >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-print') >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                }
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    }
}

function writeFilters() {
    let textFilter = "";
    if ($('#MES').length) {
        textFilter += "Mês: " + $('#filter').val();
    }
    return '';
}

function getLabelsSelected(idSelect2) {
    let text = '';
    $.each($(idSelect2).select2('data'), function(e) {
        text += this.text + '; ';
    })
    return text;
}
