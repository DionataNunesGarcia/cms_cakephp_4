<?= $this->Html->css('https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css', ['block' => 'custom']) ?>
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
<?= $this->Html->script(['admin/dataTablesCustom.js',], ['block' => 'custom']) ?>

<?php $logoBase64 = base64_encode(file_get_contents(WWW_ROOT . 'img/logo.png')); ?>
<script>
    let logoBase64 = "<?= $logoBase64 ?>";
    let dateTime = "<?= \Cake\I18n\FrozenTime::now()->i18nFormat('dd/MM/yyyy HH:mm:ss') ?>";
    let clientName = "<?= \Cake\Core\Configure::read('Client.name') ?>";
</script>

<style>
    table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
        right: 1em;
        content: "" !important;
    }

    table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
        right: 0.5em;
        content: "\02C7" !important;
    }

    .btn-export {
        margin: 2px;
        border: 1px solid #8f8d8d;
        border-radius: 3px !important;
    }
    div.dataTables_wrapper div.dataTables_length select,
    div.dataTables_wrapper div.dataTables_length label {
        width: 100% !important;
    }

    .datatable-group tr.odd td:first-child,
    .datatable-group tr.even td:first-child {
        padding-left: 4em;
    }
</style>
