<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SystemParameter[]|\Cake\Collection\CollectionInterface $systemParameters
 */
?>
<div class="systemParameters index content">
    <?= $this->Html->link(__('New System Parameter'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('System Parameters') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('social_reason') ?></th>
                    <th><?= $this->Paginator->sort('fantasy_name') ?></th>
                    <th><?= $this->Paginator->sort('cnpj_cpf') ?></th>
                    <th><?= $this->Paginator->sort('generate_access_logs') ?></th>
                    <th><?= $this->Paginator->sort('generate_change_log') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($systemParameters as $systemParameter): ?>
                <tr>
                    <td><?= $this->Number->format($systemParameter->id) ?></td>
                    <td><?= h($systemParameter->social_reason) ?></td>
                    <td><?= h($systemParameter->fantasy_name) ?></td>
                    <td><?= h($systemParameter->cnpj_cpf) ?></td>
                    <td><?= h($systemParameter->generate_access_logs) ?></td>
                    <td><?= h($systemParameter->generate_change_log) ?></td>
                    <td><?= h($systemParameter->created) ?></td>
                    <td><?= h($systemParameter->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $systemParameter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $systemParameter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $systemParameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $systemParameter->id)]) ?>
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
