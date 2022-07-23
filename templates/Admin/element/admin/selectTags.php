<?php
//verifica se existe foi passado o label, se não foi ele pega o nome e cria uma label
if (empty($label)) {
    $label = ucfirst($name);
}
//verifica se é requirido o campo
if (empty($required)) {
    $required = false;
}
$separator = $separator ?? ',';
if(empty($value)){
    $value = '';
}else{
    $value = json_encode(explode($separator, $value));
}
?>

<div class="select2-component">
    <?=
    $this->Form->control($name, [
        'type' => 'select',
        'multiple' => true,
        'label' => $label,
        'class' => 'select2-tags',
        'escape' => false, // prevent HTML being automatically escaped
        'error' => false,
        'title' => @$title,
        'required' => $required,
        'data-values' => $value,
    ]);
    ?>
</div>
