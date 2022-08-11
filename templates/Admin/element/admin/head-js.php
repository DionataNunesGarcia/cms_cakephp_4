<?= $this->Html->script('../bower_components/jquery/dist/jquery.min.js') ?>
<?= $this->Html->script('../bower_components/jquery-ui/jquery-ui.min.js') ?>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<?= $this->Html->script('../bower_components/bootstrap/dist/js/bootstrap.min.js') ?>
<?= $this->Html->script('../bower_components/raphael/raphael.min.js') ?>
<?= $this->Html->script('../bower_components/morris.js/morris.min.js') ?>
<?= $this->Html->script('../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>
<?= $this->Html->script('../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>
<?= $this->Html->script('../plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>
<?= $this->Html->script('../bower_components/jquery-knob/dist/jquery.knob.min.js') ?>
<?= $this->Html->script('../bower_components/moment/min/moment.min.js') ?>
<?= $this->Html->script('../bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>
<?= $this->Html->script('../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>
<?= $this->Html->script('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>
<?= $this->Html->script('../bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>
<?= $this->Html->script('../bower_components/fastclick/lib/fastclick.js') ?>
<?= $this->Html->script('../bower_components/ckeditor/ckeditor.js') ?>
<?= $this->Html->script('../bower_components/select2/dist/js/select2.full.min.js') ?>
<?= $this->Html->script('../bower_components/select2/dist/js/i18n/pt-BR.js') ?>
<?= $this->Html->script('../bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js') ?>
<?= $this->Html->script('../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>
<?= $this->Html->script('../plugins/timepicker/bootstrap-timepicker.min.js') ?>
<?= $this->Html->script('../plugins/dual-listbox-master/dist/dual-listbox.js') ?>
<?= $this->Html->script('../plugins/iCheck/icheck.min.js') ?>
<?= $this->Html->script('../plugins/croppie-image/croppie.js') ?>
<?= $this->Html->script('../plugins/input-mask/jquery.inputmask.js') ?>
<?= $this->Html->script('../plugins/input-mask/jquery.inputmask.date.extensions.js') ?>
<?= $this->Html->script('../plugins/jquery-maskmoney-master/dist/jquery.maskMoney.js') ?>
<?= $this->Html->script('../plugins/input-mask/jquery.inputmask.extensions.js') ?>
<?= $this->Html->script('../plugins/fancybox-master/dist/jquery.fancybox.js') ?>
<?= $this->Html->script('../adminlte/js/adminlte.min.js') ?>
<?= $this->Html->script('../adminlte/js/pages/dashboard.js') ?>
<?= $this->Html->script('../adminlte/js/demo.js') ?>
<?= $this->Html->script('admin/validaForms.js') ?>
<?= $this->Html->script('admin/scripts.js') ?>
<?= $this->Html->script('admin/setup.js') ?>
<?= $this->Html->script('admin/functions.js') ?>
<?=
    $this->Html->scriptBlock(sprintf(
    'let _csrfToken = %s',
        json_encode($_csrfToken),
    ));
?>
<?=
    $this->Html->scriptBlock(sprintf(
    'let userPermissions = %s',
        json_encode($userSession),
    ));
?>
<?=
    $this->Html->scriptBlock(sprintf(
    'let urlHome = %s',
        json_encode(\Cake\Routing\Router::url('/', true)),
    ));
?>
<?=
    $this->Html->scriptBlock(sprintf(
        'let urlCropImage = %s',
        json_encode(\Cake\Routing\Router::url(['controller' => 'Utils', 'action' => 'cropImageAjax'], true)),
    ));
?>
