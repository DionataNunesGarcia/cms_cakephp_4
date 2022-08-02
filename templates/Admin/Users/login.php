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

<div class="col-md-12 no-padding margin-top-10 margin-bottom-10">
    <?=
    $this->Html->link(__('<i class="fa fa-unlock"></i> Esqueci minha senha'), '#', [
        'class' => 'text-primary pull-right',
        'escape' => false,
        'title' => 'Esqueci Minha Senha',
        "data-toggle" => "modal",
        "data-target" => "#forget-password"
    ]);
    ?>
</div>
