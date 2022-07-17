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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $about->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $about->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List About'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="about form content">
            <?= $this->Form->create($about) ?>
            <fieldset>
                <legend><?= __('Edit About') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('cell_phone');
                    echo $this->Form->control('facebook');
                    echo $this->Form->control('instagram');
                    echo $this->Form->control('linkedin');
                    echo $this->Form->control('github');
                    echo $this->Form->control('super');
                    echo $this->Form->control('about');
                    echo $this->Form->control('vision');
                    echo $this->Form->control('mission');
                    echo $this->Form->control('values');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
