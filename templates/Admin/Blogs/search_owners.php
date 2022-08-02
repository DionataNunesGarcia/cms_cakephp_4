<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->element('admin/search/metas-datatable') ?>
<?php include 'form-search.php' ?>

<!-- Default box -->
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-table"></i> Registros']) ?>
    <div class="box-body">
        <?= $this->element('admin/search/grid-buttons') ?>
        <div class="col-md-12">
            <table class="table table-datatable table-striped table-bordered nowrap " id="table-index" style="width: 100%">
                <thead>
                    <tr>
                        <th class="checkbox-select">
                            <?= $this->Form->checkbox('select_all', ['hiddenField' => false]); ?>
                        </th>
                        <th>
                            <?= __('Título') ?>
                        </th>
                        <th class="text-center">
                            <?= __('Categoria') ?>
                        </th>
                        <th>
                            <?= __('Criado') ?>
                        </th>
                        <th class="text-center actions">
                            <?= __('Ações') ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let urlDatatable = "<?=
        $this->Url->build([
            'prefix' => 'Admin',
            'action' => 'searchAjax',
            1
        ]);
        ?>";

    let titlePdf = "Categorias de Blogs";
    let datatableCurrent = $('#table-index').DataTable({
        dom: datatablesCustom.dom(),
        buttons: datatablesCustom.buttons(),
        serverSide: true,
        responsive: true,
        ajax: datatablesCustom.ajax(urlDatatable),
        searching: false,
        paging: true,
        ordering: false,
        processing: true,
        language: datatablesCustom.configDatatables().language,
        dataFilter: function(res) {
            debugger;
        },
        columns: [
            {
                data: 'id',
                className: 'text-center',
                render: function(data, type, full, meta) {
                    return full.actions.delete ? '<input type="checkbox" name="selected[]" value="' + data + '">' : '';
                }
            },
            {
                data: 'title'
            },
            {
                data: 'category',
                className: 'text-center',
            },
            {
                data: 'created'
            },
            {
                data: 'actions',
                className: 'text-center',
                render: function(data, type, full, meta) {
                    let html = ``;
                    if (full.actions) {
                        html += datatablesCustom.buildBtnEdit(data.edit);
                        html += datatablesCustom.buildBtnDelete(data.delete);
                    }
                    return html;
                }
            },
        ]
    });
</script>

