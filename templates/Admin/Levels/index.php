<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->element('admin/search/metas-datatable') ?>
<?= $this->Form->create(null, ['type' => 'get']); ?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-filter"></i> Filtrar']) ?>
    <div class="box-body">

        <div class="col-md-6">
            <?=
            $this->Form->control('name', ['class' => 'form-control', 'label' => false,
                'placeholder' => 'Pesquise por usuário',
                'autofocus' => true,
                'value' => $this->request->getQuery('user')]);
            ?>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <?= $this->element('admin/search/filter-buttons') ?>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<!-- Default box -->
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-table"></i> Registros']) ?>
    <div class="box-body">
        <?= $this->element('admin/search/grid-buttons') ?>
        <div class="col-md-12">
            <table class="table table-datatable table-striped table-bordered nowrap " id="table-index" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center">
                        <?= $this->Form->checkbox('select_all', ['hiddenField' => false]); ?>
                    </th>
                    <th>
                        <?= __('Nome') ?>
                    </th>
                    <th class="text-center">
                        <?= __('Usuários') ?>
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
            'controller' => 'Levels',
            'action' => 'searchAjax',
            'prefix' => 'Admin',
        ]);
        ?>";

    let datatableCurrent = $('#table-index').DataTable({
        serverSide: true,
        responsive: true,
        ajax: urlDatatable,
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
                    let disabled = '';
                    return '<input type="checkbox" name="selected[]" value="' + data + '" ' + disabled + '>';
                }
            },
            {
                data: 'name'
            },
            {
                data: 'users',
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
                    html += datatablesCustom.buildBtnEdit(full.actions.edit);
                    html += datatablesCustom.buildBtnDelete(full.actions.delete);
                    return html;
                }
            },
        ]
    });
</script>

