<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LogsAcces $logsAcces
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Logs Acces'), ['action' => 'edit', $logsAcces->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Logs Acces'), ['action' => 'delete', $logsAcces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logsAcces->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Logs Access'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Logs Acces'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="logsAccess view content">
            <h3><?= h($logsAcces->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $logsAcces->has('user') ? $this->Html->link($logsAcces->user->id, ['controller' => 'Users', 'action' => 'view', $logsAcces->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ip') ?></th>
                    <td><?= h($logsAcces->ip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($logsAcces->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($logsAcces->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
