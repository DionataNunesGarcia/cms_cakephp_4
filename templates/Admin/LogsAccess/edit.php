<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LogsAcces $logsAcces
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $logsAcces->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $logsAcces->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Logs Access'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="logsAccess form content">
            <?= $this->Form->create($logsAcces) ?>
            <fieldset>
                <legend><?= __('Edit Logs Acces') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('ip');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
