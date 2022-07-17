<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= h($user->user) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $user->has('level') ? $this->Html->link($user->level->name, ['controller' => 'Levels', 'action' => 'view', $user->level->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $user->status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Super') ?></th>
                    <td><?= $user->super ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Logs Access') ?></h4>
                <?php if (!empty($user->logs_access)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Ip') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->logs_access as $logsAccess) : ?>
                        <tr>
                            <td><?= h($logsAccess->id) ?></td>
                            <td><?= h($logsAccess->user_id) ?></td>
                            <td><?= h($logsAccess->ip) ?></td>
                            <td><?= h($logsAccess->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'LogsAccess', 'action' => 'view', $logsAccess->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'LogsAccess', 'action' => 'edit', $logsAccess->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'LogsAccess', 'action' => 'delete', $logsAccess->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logsAccess->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Logs Change') ?></h4>
                <?php if (!empty($user->logs_change)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Table Name') ?></th>
                            <th><?= __('Record Id') ?></th>
                            <th><?= __('Action Type') ?></th>
                            <th><?= __('New Value') ?></th>
                            <th><?= __('Old Value') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->logs_change as $logsChange) : ?>
                        <tr>
                            <td><?= h($logsChange->id) ?></td>
                            <td><?= h($logsChange->user_id) ?></td>
                            <td><?= h($logsChange->table_name) ?></td>
                            <td><?= h($logsChange->record_id) ?></td>
                            <td><?= h($logsChange->action_type) ?></td>
                            <td><?= h($logsChange->new_value) ?></td>
                            <td><?= h($logsChange->old_value) ?></td>
                            <td><?= h($logsChange->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'LogsChange', 'action' => 'view', $logsChange->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'LogsChange', 'action' => 'edit', $logsChange->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'LogsChange', 'action' => 'delete', $logsChange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logsChange->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Uploads') ?></h4>
                <?php if (!empty($user->uploads)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Filename') ?></th>
                            <th><?= __('Foreign Key') ?></th>
                            <th><?= __('Model') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Order') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Extension') ?></th>
                            <th><?= __('Alt') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->uploads as $uploads) : ?>
                        <tr>
                            <td><?= h($uploads->id) ?></td>
                            <td><?= h($uploads->filename) ?></td>
                            <td><?= h($uploads->foreign_key) ?></td>
                            <td><?= h($uploads->model) ?></td>
                            <td><?= h($uploads->type) ?></td>
                            <td><?= h($uploads->order) ?></td>
                            <td><?= h($uploads->user_id) ?></td>
                            <td><?= h($uploads->extension) ?></td>
                            <td><?= h($uploads->alt) ?></td>
                            <td><?= h($uploads->description) ?></td>
                            <td><?= h($uploads->created) ?></td>
                            <td><?= h($uploads->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Uploads', 'action' => 'view', $uploads->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Uploads', 'action' => 'edit', $uploads->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Uploads', 'action' => 'delete', $uploads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uploads->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
