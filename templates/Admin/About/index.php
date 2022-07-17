<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\About[]|\Cake\Collection\CollectionInterface $about
 */
?>
<div class="about index content">
    <?= $this->Html->link(__('New About'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('About') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('cell_phone') ?></th>
                    <th><?= $this->Paginator->sort('facebook') ?></th>
                    <th><?= $this->Paginator->sort('instagram') ?></th>
                    <th><?= $this->Paginator->sort('linkedin') ?></th>
                    <th><?= $this->Paginator->sort('github') ?></th>
                    <th><?= $this->Paginator->sort('super') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($about as $about): ?>
                <tr>
                    <td><?= $this->Number->format($about->id) ?></td>
                    <td><?= h($about->title) ?></td>
                    <td><?= h($about->email) ?></td>
                    <td><?= h($about->phone) ?></td>
                    <td><?= h($about->cell_phone) ?></td>
                    <td><?= h($about->facebook) ?></td>
                    <td><?= h($about->instagram) ?></td>
                    <td><?= h($about->linkedin) ?></td>
                    <td><?= h($about->github) ?></td>
                    <td><?= h($about->super) ?></td>
                    <td><?= h($about->created) ?></td>
                    <td><?= h($about->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $about->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $about->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $about->id], ['confirm' => __('Are you sure you want to delete # {0}?', $about->id)]) ?>
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
