<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LogsAcces[]|\Cake\Collection\CollectionInterface $logsAccess
 */
?>
<div class="logsAccess index content">
    <?= $this->Html->link(__('New Logs Acces'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Logs Access') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('ip') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logsAccess as $logsAcces): ?>
                <tr>
                    <td><?= $this->Number->format($logsAcces->id) ?></td>
                    <td><?= $logsAcces->has('user') ? $this->Html->link($logsAcces->user->id, ['controller' => 'Users', 'action' => 'view', $logsAcces->user->id]) : '' ?></td>
                    <td><?= h($logsAcces->ip) ?></td>
                    <td><?= h($logsAcces->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $logsAcces->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $logsAcces->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $logsAcces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logsAcces->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
