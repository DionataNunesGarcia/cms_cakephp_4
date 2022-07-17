<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\About $about
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit About'), ['action' => 'edit', $about->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete About'), ['action' => 'delete', $about->id], ['confirm' => __('Are you sure you want to delete # {0}?', $about->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List About'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New About'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="about view content">
            <h3><?= h($about->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($about->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($about->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($about->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cell Phone') ?></th>
                    <td><?= h($about->cell_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Facebook') ?></th>
                    <td><?= h($about->facebook) ?></td>
                </tr>
                <tr>
                    <th><?= __('Instagram') ?></th>
                    <td><?= h($about->instagram) ?></td>
                </tr>
                <tr>
                    <th><?= __('Linkedin') ?></th>
                    <td><?= h($about->linkedin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Github') ?></th>
                    <td><?= h($about->github) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($about->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($about->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($about->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Super') ?></th>
                    <td><?= $about->super ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('About') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($about->about)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Vision') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($about->vision)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Mission') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($about->mission)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Values') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($about->values)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
