<?php

$url = $this->Url->build([
    "controller" => $controller,
    "action" => "autocomplete",
    "_full" => true,
//    "?" => ["foo" => "bar"],
//    "#" => "first",
        ]);

if (!isset($label)) {
    $label = $name;
}

if (!isset($placeholder)) {
    $placeholder = null;
}

if (!isset($multiple)) {
    $multiple = true;
}

if (!isset($required)) {
    $required = false;
}

if (empty($value)) {
    $values = 0;
} else if (is_array($value)) {
    $values = implode(',',$value);
} else {
    $values = $value;
}

//verifica se multiplo, default true
if (!isset($disabled)) {
    $disabled = '';
}

if (!isset($clear) || !$required) {
    $clear = false;
}

if (!isset($id)) {
    $id = 'select2-' . $name;
}

if (!isset($separator)) {
    $separator = null;
}

echo $this->Form->control($name, [
    'multiple' => $multiple,
    'class' => 'select2-ajax',
    'type' => 'select',
    'id' => $id,
    'label' => $label,
    'data-ajax--url' => $url,
    'data-separator' => $separator,
    'required' => $required,
    'data-allow-clear' => true,
    'data-val' => $values,
    $disabled,
    'hiddenField' => false
]);
