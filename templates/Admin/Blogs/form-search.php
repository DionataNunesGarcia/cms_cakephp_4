<?= $this->Form->create(null, ['type' => 'get', 'id' => 'datatable-search']); ?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => '<i class="fa fa-filter"></i> Filtrar']) ?>
    <div class="box-body">

        <div class="form-group col-md-6">
            <?=
            $this->Form->control('title', [
                'label' => 'Título',
                'placeholder' => 'Pesquisar pelo título'
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $this->element('admin/select2', [
                'controller' => 'BlogsCategories',
                'name' => 'id',
                'label' => __('Categorias de Blogs'),
                'multiple' => false,
                'value' => $this->getRequest()->getQuery('id'),
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
