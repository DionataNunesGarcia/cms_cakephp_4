<div class="botoes text-right">
    <?= $this->Html->link(__('<i class="fa fa-plus-square-o"></i> Incluir'), ['action' => 'incluir', '_full' => true], ['class' => 'btn btn-primary', 'escape' => false]) ?>
    <?= $this->Html->link(__('<i class="fa fa-trash"></i> Exluir Selecionados'), ['action' => 'excluir', '_full' => true], ['id' => 'excluir-selecionados', 'class' => 'btn btn-danger', 'escape' => false]) ?>
</div>
