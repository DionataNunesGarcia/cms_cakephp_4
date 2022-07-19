<div class="botoes text-right">
    <?=
    $this->Html->link(__('<i class="fa fa-trash"></i> Excluir Selecionados'), [
        'action' => 'delete',
        '_full' => true
    ], [
        'id' => 'deleted-selected',
        'class' => 'btn btn-danger',
        'escapeTitle' => false
    ])
    ?>
    <?=
    $this->Html->link(__('<i class="fa fa-plus-square-o"></i> Incluir'), [
        'action' => 'add',
        '_full' => true
    ], [
        'class' => 'btn btn-primary',
        'escapeTitle' => false
    ])
    ?>
</div>
