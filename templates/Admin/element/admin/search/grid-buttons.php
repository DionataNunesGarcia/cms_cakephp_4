<div class="col-md-12 grid-buttons text-right">
    <?php
    if (!isset($showDelete) || $showDelete) {
        echo $this->Html->link(__('<i class="fa fa-trash"></i> Excluir Selecionados'), [
            'action' => 'delete',
            '_full' => true
        ], [
            'id' => 'deleted-selected',
            'class' => 'btn btn-danger',
            'escapeTitle' => false
        ]);
    }
    ?>
    <?php
    if (!isset($showAdd) || $showAdd) {
        echo $this->Html->link(__('<i class="fa fa-plus-square-o"></i> Incluir'), [
            'action' => 'add',
            '_full' => true
        ], [
            'class' => 'btn btn-primary',
            'escapeTitle' => false
        ]);
    }
    ?>
</div>
