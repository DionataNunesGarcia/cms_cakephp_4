<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create() ?>

<h3 class="text-center log-heading-two">
    <?php //echo __('Login') ?>
</h3>

<?= $this->Form->input('user', ['label' => false, 'placeholder' => 'Usuário', 'class' => 'username form-control', 'required' => 'true']) ?><br>

<?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Senha', 'class' => 'username form-control', 'required' => 'true', 'type' => 'password']) ?><br>

<?= $this->Form->submit(__('Login'), ['class' => 'login-btn btn btn-info form-control']); ?>

<?= $this->Form->end() ?>
