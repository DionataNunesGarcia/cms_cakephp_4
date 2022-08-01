<?php
use App\Utils\TranslateControllerActions;
$actionForm = $action ?? $this->getRequest()->getParam('action');
?>
<?=
$this->Form->create($entity, ['url' => [
    'action' => $actionForm,
    $entity->id,
    'fullBase' => true,
]]);
?>
<div class="box">
    <?= $this->element('admin/box-title', ['title' => 'Cadastro']) ?>
    <div class="box-body">
        <fieldset>
            <?= $this->Form->hidden('id') ?>
            <?= $this->Form->hidden('status',['value' => 1]); ?>
            <div class="form-group col-md-6">
                <?= $this->Form->control('name', ['label' => 'Nome']); ?>
            </div>
        </fieldset>
    </div>
    <?php
    $prefix = $this->getRequest()->getParam('prefix');
    $this->Form->unlockField('select_all');
    if (!empty($permissionsList)) {
        ?>
        <?= $this->element('admin/box-title', ['title' => 'Permissões', 'collapse' => false]) ?>
        <div class="box-body">
            <div class="panel-group col-md-12" id="accordion">
                <?= $this->Form->hidden('prefix', ['value' => $this->getRequest()->getParam('prefix')]); ?>
                <?php
                foreach ($permissionsList as $key => $controller) {
                    $controllerKey = key($controller);
                    ?>
                    <div class="panel panel-default select-profiles" id="<?= strtolower(key($controller)) ?>">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= strtolower(key($controller)) ?>">
                                    <strong>
                                        <?= TranslateControllerActions::translateController(key($controller)) ?>
                                    </strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-<?= strtolower($controllerKey) ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <?=
                                    $this->Form->checkbox('select_all', [
                                        'hiddenField' => false,
                                        'checked' => false,
                                        'id' => strtolower(key($controller)),
                                        'data-controller' => 'collapse-' . strtolower(key($controller))
                                    ]);
                                    ?>
                                    <label for="<?= strtolower($controllerKey) ?>">Selecionar Todos</label>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    foreach ($controller[$controllerKey] as $k => $action) {
                                        $idAction = $controllerKey . '-' . $action . '-' . $k;

                                        $value = "{$prefix}:{$controllerKey}:{$action}";
                                        $checked = false;
                                        if ($entity->permissions && array_search($value, $entity->permissions) !== false) {
                                            $checked = true;
                                        }
                                        ?>
                                        <div class="col-md-3">
                                            <?=
                                            $this->Form->checkbox('levelsPermissions[]', [
                                                'div' => false,
                                                'hiddenField' => false,
                                                'label' => false,
                                                'id' => $idAction,
                                                'value' => $value,
                                                'checked' => $checked
                                            ]);
                                            ?>
                                            <label for="<?= $idAction ?>">
                                                <?= TranslateControllerActions::translateAction($action) ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <div class="box-footer">
        <?= $this->element('admin/form-buttons', ['id' => $entity->id]) ?>
    </div>
</div>
<?= $this->Form->end() ?>
