<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SystemParameter $systemParameter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit System Parameter'), ['action' => 'edit', $systemParameter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete System Parameter'), ['action' => 'delete', $systemParameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $systemParameter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List System Parameters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New System Parameter'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="systemParameters view content">
            <h3><?= h($systemParameter->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Social Reason') ?></th>
                    <td><?= h($systemParameter->social_reason) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fantasy Name') ?></th>
                    <td><?= h($systemParameter->fantasy_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cnpj Cpf') ?></th>
                    <td><?= h($systemParameter->cnpj_cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($systemParameter->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($systemParameter->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($systemParameter->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Generate Access Logs') ?></th>
                    <td><?= $systemParameter->generate_access_logs ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Generate Change Log') ?></th>
                    <td><?= $systemParameter->generate_change_log ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Emails') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($systemParameter->emails)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
