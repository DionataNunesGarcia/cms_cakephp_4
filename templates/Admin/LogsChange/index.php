<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LogsChange[]|\Cake\Collection\CollectionInterface $logsChange
 */
?>
<div class="logsChange index content">
    <?= $this->Html->link(__('New Logs Change'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Logs Change') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('table_name') ?></th>
                    <th><?= $this->Paginator->sort('record_id') ?></th>
                    <th><?= $this->Paginator->sort('action_type') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logsChange as $logsChange): ?>
                <tr>
                    <td><?= $this->Number->format($logsChange->id) ?></td>
                    <td><?= $logsChange->has('user') ? $this->Html->link($logsChange->user->id, ['controller' => 'Users', 'action' => 'view', $logsChange->user->id]) : '' ?></td>
                    <td><?= h($logsChange->table_name) ?></td>
                    <td><?= $this->Number->format($logsChange->record_id) ?></td>
                    <td><?= h($logsChange->action_type) ?></td>
                    <td><?= h($logsChange->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $logsChange->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $logsChange->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $logsChange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logsChange->id)]) ?>
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
