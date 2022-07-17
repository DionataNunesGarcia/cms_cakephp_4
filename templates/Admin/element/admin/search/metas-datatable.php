<?= $this->Html->css('https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css', ['block' => 'custom']) ?>
<?= $this->Html->css('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css', ['block' => 'custom']) ?>
<?= $this->Html->css('https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css', ['block' => 'custom']) ?>
<?= $this->Html->css('https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css', ['block' => 'custom']) ?>
<?= $this->Html->css('https://cdn.datatables.net/rowgroup/1.1.3/css/rowGroup.dataTables.min.css', ['block' => 'custom']) ?>
<?= $this->Html->css('https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap.min.css', ['block' => 'custom']) ?>

<?= $this->Html->script(['https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdn.datatables.net/rowgroup/1.1.3/js/dataTables.rowGroup.min.js',], ['block' => 'custom']) ?>
<?= $this->Html->script(['https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js',], ['block' => 'custom']) ?>

<script>
    let configDatatables = {
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
</script>
