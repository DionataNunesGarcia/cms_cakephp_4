<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level $level
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Level'), ['action' => 'edit', $level->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Level'), ['action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete # {0}?', $level->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Levels'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Level'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="levels view content">
            <h3><?= h($level->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($level->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($level->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($level->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($level->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($level->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deletable') ?></th>
                    <td><?= $level->deletable ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Levels Permissions') ?></h4>
                <?php if (!empty($level->levels_permissions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Level Id') ?></th>
                            <th><?= __('Prefix') ?></th>
                            <th><?= __('Controller') ?></th>
                            <th><?= __('Action') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($level->levels_permissions as $levelsPermissions) : ?>
                        <tr>
                            <td><?= h($levelsPermissions->id) ?></td>
                            <td><?= h($levelsPermissions->level_id) ?></td>
                            <td><?= h($levelsPermissions->prefix) ?></td>
                            <td><?= h($levelsPermissions->controller) ?></td>
                            <td><?= h($levelsPermissions->action) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'LevelsPermissions', 'action' => 'view', $levelsPermissions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'LevelsPermissions', 'action' => 'edit', $levelsPermissions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'LevelsPermissions', 'action' => 'delete', $levelsPermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $levelsPermissions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($level->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Super') ?></th>
                            <th><?= __('Level Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($level->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->user) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->status) ?></td>
                            <td><?= h($users->super) ?></td>
                            <td><?= h($users->level_id) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
