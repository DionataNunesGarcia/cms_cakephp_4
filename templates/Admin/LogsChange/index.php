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
                            <?= __('Cadastro') ?>
                        </th>
                        <th>
                            <?= __('Tipo') ?>
                        </th>
                        <th>
                            <?= __('Criado') ?>
                        </th>
                        <th>
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
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log Alteração</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <strong><?= __('Usuário') ?></strong>
                        <span class="help-block" id="user">
                    </span>
                    </div>
                    <div class="form-group col-md-3">
                        <strong><?= __('Data/Hora') ?></strong>
                        <span class="help-block" id="created"></span>
                    </div>
                    <div class="form-group col-md-3">
                        <strong><?= __('Tabela') ?></strong>
                        <span class="help-block" id="table"></span>
                    </div>
                    <div class="form-group col-md-3">
                        <strong><?= __('Tipo') ?></strong>
                        <span class="help-block" id="type"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <strong><?= __('Valores Novos') ?></strong>
                        <span class="help-block string-to-json" id="new_values"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <strong><?= __('Valores Antigos') ?></strong>
                        <span class="help-block string-to-json" id="old_values"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Fechar</button>
            </div>
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
                data: 'table'
            },
            {
                data: 'type'
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
                        html += datatablesCustom.buildBtnViewModal(full.actions.view, full.entity, 'view');
                    }
                    return html;
                }
            },
        ]
    });

    $('body')
        .on('click', 'table.table-datatable .btn-view-modal', function (e) {
            e.preventDefault();
            let entity = datatablesCustom.convertObjectString($(this).data('entity'));
            let $modal = $('#modal-view');
            console.log(entity);
            console.log($modal);
            $modal.find('#user').html(entity.user.user);
            $modal.find('#created').html(entity.created);
            $modal.find('#table').html(entity.table);
            $modal.find('#type').html(entity.type);


            $modal.find('#new_values').html(generateHtmlByJson(entity.new_value_json));
            $modal.find('#old_values').html(generateHtmlByJson(entity.old_value_json));
            $modal.modal('toggle');
        });

    function generateHtmlByJson(json) {
        let html = ``;
        $.each(json, function(field, value) {
            html += `<strong>${field}: </strong>`;
            html += `<span>${value}</span><br/>`;
        });
        return html;
    }
</script>
