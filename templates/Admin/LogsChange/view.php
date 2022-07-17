<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LogsChange $logsChange
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Logs Change'), ['action' => 'edit', $logsChange->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Logs Change'), ['action' => 'delete', $logsChange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logsChange->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Logs Change'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Logs Change'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="logsChange view content">
            <h3><?= h($logsChange->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $logsChange->has('user') ? $this->Html->link($logsChange->user->id, ['controller' => 'Users', 'action' => 'view', $logsChange->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Table Name') ?></th>
                    <td><?= h($logsChange->table_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Action Type') ?></th>
                    <td><?= h($logsChange->action_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($logsChange->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Record Id') ?></th>
                    <td><?= $this->Number->format($logsChange->record_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($logsChange->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('New Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($logsChange->new_value)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Old Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($logsChange->old_value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
