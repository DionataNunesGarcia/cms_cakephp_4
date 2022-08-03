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
        <div class="form-group col-md-6">
            <?=
            $this->Form->control('name', [
                'label' => 'Nome',
                'placeholder' => 'Pesquisar pelo nome'
            ]);
            ?>
        </div>
        <div class="form-group col-md-6">
            <?=
            $this->Form->control('email', [
                'label' => 'E-mail',
                'placeholder' => 'Pesquisar pelo e-mail'
            ]);
            ?>
        </div>
        <div class="form-group col-md-6">
            <?=
            $this->Form->control('subject', [
                'label' => 'Assunto',
                'placeholder' => 'Pesquisar pelo assunto'
            ]);
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
        <?= $this->element('admin/search/grid-buttons', ['showAdd' => false]) ?>
        <div class="col-md-12">
            <table class="table table-datatable table-striped table-bordered nowrap " id="table-index" style="width: 100%">
                <thead>
                <tr>
                    <th>
                        <?= __('Nome') ?>
                    </th>
                    <th>
                        <?= __('E-mail') ?>
                    </th>
                    <th>
                        <?= __('Telefone') ?>
                    </th>
                    <th>
                        <?= __('Assunto') ?>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contato</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <strong><?= __('Contato') ?></strong>
                        <span class="help-block" id="name"></span>
                        <strong><?= __('Data/Hora') ?></strong>
                        <span class="help-block" id="created"></span>
                        <strong><?= __('Email') ?></strong>
                        <span class="help-block"  id="email"></span>
                        <strong><?= __('Telefone') ?></strong>
                        <span class="help-block" id="phone"></span>
                        <strong><?= __('Assunto') ?></strong>
                        <span class="help-block" id="subject"></span>
                        <strong><?= __('Mensagem') ?></strong>
                        <span class="help-block" id="message"></span>
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

    let titlePdf = "Contatos";
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
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'phone'
            },
            {
                data: 'subject'
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
            $modal.find('#name').html(entity.name);
            $modal.find('#email').html(entity.email);
            $modal.find('#phone').html(entity.phone);
            $modal.find('#status').html(entity.status);
            $modal.find('#subject').html(entity.subject);
            $modal.find('#message').html(entity.message);
            $modal.find('#created').html(entity.created);
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
