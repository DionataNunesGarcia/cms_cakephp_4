<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LogsChange $logsChange
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Logs Change'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="logsChange form content">
            <?= $this->Form->create($logsChange) ?>
            <fieldset>
                <legend><?= __('Add Logs Change') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('table_name');
                    echo $this->Form->control('record_id');
                    echo $this->Form->control('action_type');
                    echo $this->Form->control('new_value');
                    echo $this->Form->control('old_value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
