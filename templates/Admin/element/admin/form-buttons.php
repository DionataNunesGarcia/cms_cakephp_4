<?php
echo $this->Form->button('<i class="fa fa-save"></i> Salvar', [
    'class' => 'btn btn-primary',
    'escapeTitle' => false,
    'type' => 'submit',
]);
if(!isset($controller)){
    $controller = $this->getRequest()->getParam('controller');
}
?>
<a href="<?= $this->Url->build(['controller' => $controller, 'action' => 'index', 'fullBase' => true]); ?>" class="btn btn-default">
    <i class="fa fa-search"></i> Pesquisar
</a>
<?php if (!empty($id)) { ?>
    <a href="<?= $this->Url->build(['controller' => $controller, 'action' => 'add', 'fullBase' => true]); ?>" class="btn btn-default">
        <i class="fa fa-plus-square"></i> Incluir
    </a>
<?php } ?>
