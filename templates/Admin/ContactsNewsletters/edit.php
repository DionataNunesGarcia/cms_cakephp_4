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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactsNewsletter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactsNewsletter->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contacts Newsletters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contactsNewsletters form content">
            <?= $this->Form->create($contactsNewsletter) ?>
            <fieldset>
                <legend><?= __('Edit Contacts Newsletter') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
