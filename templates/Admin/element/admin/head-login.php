<!-- Bootstrap 3.3.7 -->
<?= $this->Html->css('../bower_components/bootstrap/dist/css/bootstrap.min.css') ?>
<!-- Font Awesome -->
<?= $this->Html->css('../bower_components/font-awesome/css/font-awesome.min.css') ?>
<!-- Ionicons -->
<?= $this->Html->css('../bower_components/Ionicons/css/ionicons.min.css') ?>
<!-- Theme style -->
<?= $this->Html->css('../adminlte/css/AdminLTE.min.css') ?>
<!-- iCheck -->
<?= $this->Html->css('../plugins/iCheck/square/blue.css') ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<?= $this->Html->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') ?>


<!-- jQuery 3 -->
<?= $this->Html->script('../bower_components/jquery/dist/jquery.min.js') ?>
<!-- Bootstrap 3.3.7 -->
<?= $this->Html->script('../bower_components/bootstrap/dist/js/bootstrap.min.js') ?>
<!-- iCheck -->
<?= $this->Html->script('../plugins/iCheck/icheck.min.js') ?>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
<style>
    .login-box, .register-box {
        margin: 10% auto;
        -webkit-box-shadow: 0px 0px 7px 12px rgba(0,0,0,0.24);
        -moz-box-shadow: 0px 0px 7px 12px rgba(0,0,0,0.24);
        box-shadow: 0px 0px 7px 12px rgba(0,0,0,0.24);
    }
    .login-box-body {
        border-radius: 4px !important;
        padding-bottom: 45px;
        height: auto;
    }
    .logo-cliente{
        display: flex;
        margin: 0 auto;
        max-height: 100px;
    }
    .margin-top-10 {
        margin-top: 10px;
    }
    .margin-bottom-10 {
        margin-bottom: 10px;
    }
</style>

