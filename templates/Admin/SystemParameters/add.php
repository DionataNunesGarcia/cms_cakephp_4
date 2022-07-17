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
            <?= $this->Html->link(__('List System Parameters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="systemParameters form content">
            <?= $this->Form->create($systemParameter) ?>
            <fieldset>
                <legend><?= __('Add System Parameter') ?></legend>
                <?php
                    echo $this->Form->control('social_reason');
                    echo $this->Form->control('fantasy_name');
                    echo $this->Form->control('cnpj_cpf');
                    echo $this->Form->control('generate_access_logs');
                    echo $this->Form->control('generate_change_log');
                    echo $this->Form->control('emails');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
