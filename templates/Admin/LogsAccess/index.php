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
                'name' => 'users_id',
                'label' => __('Usuário'),
                'multiple' => true,
                'separator' => ',',
            ])
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $this->Form->control('dates_start_end', [
                'class' => 'form-control dates-start-end',
                'label' => 'Intervalo de Datas',
                'placeholder' => 'Pesquise por Data Hora',
            ]);
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

    let titlePdf = "Logs de Acesso";
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
                data: 'user'
            },
            {
                data: 'ip'
            },
            {
                data: 'created'
            }
        ]
    });
</script>
