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
            $this->Form->control('user_id', ['class' => 'form-control', 'label' => false,
                'placeholder' => 'Pesquise por usuário',
                'autofocus' => true,
                'value' => $this->request->getQuery('user_id')]);
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $this->Form->control('email', ['class' => 'form-control', 'label' => false,
                'placeholder' => 'Pesquse por e-mail',
                'autofocus' => true,
                'value' => $this->request->getQuery('email')]);
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
                        <th>
                            <?= __('Usuário') ?>
                        </th>
                        <th>
                            <?= __('IP') ?>
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
                data: 'user'
            },
            {
                data: 'ip'
            },
            {
                data: 'created'
            },
            {
                data: 'actions',
                className: 'text-center',
                render: function(data, type, full, meta) {
                    let html = ``;
                    html += datatablesCustom.buildBtnView(full.actions.view);
                    return html;
                }
            },
        ]
    });
</script>
