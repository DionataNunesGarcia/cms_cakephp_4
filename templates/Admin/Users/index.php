<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?= $this->element('admin/search/metas-datatable') ?>
<?= $this->Form->create(null, ['type' => 'get']); ?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-filter"></i> Filtrar']) ?>
    <div class="box-body">

        <div class="col-md-6">
            <?=
            $this->Form->control('user', ['class' => 'form-control', 'label' => false,
                'placeholder' => 'Pesquise por usuário',
                'autofocus' => true,
                'value' => $this->request->getQuery('user')]);
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
                        <?= $this->Form->checkbox('select-all', ['hiddenField' => false]); ?>
                    </th>
                    <th>
                    </th>
                    <th>
                        <?= __('Nome') ?>
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
<script>
    let urlDatatable = "<?=
        $this->Url->build([
            'controller' => 'Users',
            'action' => 'searchAjax',
            'prefix' => 'Admin',
        ]);
    ?>";

    $('#table-index').DataTable({
        serverSide: true,
        responsive: true,
        ajax: urlDatatable,
        searching: false,
        paging: true,
        ordering: false,
        processing: true,
        language: configDatatables.language,
        dataFilter: function(res) {
            debugger;
        },
        columns: [
            {
                data: 'id',
                render: function(data, type, full, meta) {
                    let disabled = '';
                    return '<input type="checkbox" name="selected[]" value="' + data + '" ' + disabled + '>';
                }
            },
            {
                data: 'avatar',
                render: function(data, type, full, meta) {
                    return '<img src="' + data + '" class="avatar">';
                }
            },
            {
                data: 'user'
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
                render: function(data, type, full, meta) {

                    let entity = encodeURIComponent(JSON.stringify(full.entity));
                    let html = ``;
                    if (full.actions.edit) {
                        html += `
                          <a class="btn btn-success btn-xs btn-edit" href="${full.actions.edit}">
                            <i class="fa fa-edit"></i>
                          </a>
                        `;
                    }
                    if (full.actions.delete) {
                        html += `
                          <a class="btn btn-danger btn-xs btn-delete" href="${full.actions.delete}">
                            <i class="fa fa-trash"></i>
                          </a>
                        `;
                    }

                    return html;
                }
            },
        ]
    });
</script>
