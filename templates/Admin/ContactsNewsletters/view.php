<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactsNewsletter $contactsNewsletter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contacts Newsletter'), ['action' => 'edit', $contactsNewsletter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contacts Newsletter'), ['action' => 'delete', $contactsNewsletter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactsNewsletter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contacts Newsletters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contacts Newsletter'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contactsNewsletters view content">
            <h3><?= h($contactsNewsletter->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($contactsNewsletter->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($contactsNewsletter->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($contactsNewsletter->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contactsNewsletter->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($contactsNewsletter->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contactsNewsletter->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($contactsNewsletter->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
