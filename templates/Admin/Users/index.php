<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->element('admin/search/metas-datatable') ?>
<?= $this->Form->create(null, ['type' => 'get', 'id' => 'datatable-search']); ?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-filter"></i> Filtrar']) ?>
    <div class="box-body">
        <div class="col-md-6">
            <?=
            $this->element('admin/select2', [
                'controller' => 'Users',
                'name' => 'id',
                'label' => __('Usuário'),
                'multiple' => false,
                'value' => $this->getRequest()->getQuery('Users.id'),
            ])
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $this->element('admin/select2', [
                'controller' => 'Levels',
                'name' => 'level_id',
                'label' => __('Nível'),
                'multiple' => false,
                'value' => $this->getRequest()->getQuery('level_id'),
            ])
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
                    <th class="checkbox-select">
                        <?= $this->Form->checkbox('select_all', ['hiddenField' => false]); ?>
                    </th>
                    <th>
                    </th>
                    <th>
                        <?= __('Usuário') ?>
                    </th>
                    <th>
                        <?= __('E-mail') ?>
                    </th>
                    <th>
                        <?= __('Nível') ?>
                    </th>
                    <th>
                        <?= __('Situação') ?>
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
            'action' => 'searchAjax',
            'prefix' => 'Admin',
        ]);
    ?>";
    let titlePdf = "Usuários";
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
                    let disabled = '';
                    return '<input type="checkbox" name="selected[]" value="' + data + '" ' + disabled + '>';
                }
            },
            {
                data: 'avatar',
                className: 'text-center',
                render: function(data, type, full, meta) {
                    return '<img src="' + data + '" class="avatar">';
                }
            },
            {
                data: 'user',
                render: function(data, type, full, meta) {
                    return 'Usuário: ' + data + '<br/><strong>' + full.name + '</strong>';
                }
            },
            {
                data: 'email'
            },
            {
                data: 'level'
            },
            {
                data: 'status'
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
                        html += datatablesCustom.buildBtnEdit(full.actions.edit);
                        html += datatablesCustom.buildBtnDelete(full.actions.delete);
                    }
                    return html;
                }
            },
        ]
    });
</script>
