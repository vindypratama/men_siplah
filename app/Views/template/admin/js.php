<!-- jQuery -->
<script src="<?php echo assets_template('admin/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo assets_template('admin/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo assets_template('admin/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo assets_template('admin/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo assets_template('admin/plugins/sparklines/sparkline.js'); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo assets_template('admin/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?php echo assets_template('admin/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo assets_template('admin/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo assets_template('admin/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo assets_template('admin/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo assets_template('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?php echo assets_template('admin/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo assets_template('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo assets_template('admin/js/adminlte.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo assets_template('admin/js/demo.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo assets_template('admin/js/pages/dashboard.js'); ?>"></script>

<script src="<?php echo assets_plugin('datatables/datatables.js?v='.date('YmdHis')); ?>"></script>
<script src="<?php echo assets_js('common.js?v='.date('YmdHis')); ?>"></script>

<script src="<?php echo assets_plugin('select2-4.0.13/js/select2.min.js?v='.date('YmdHis')); ?>"></script>
<script src="<?php echo assets_plugin('select2-4.0.13/js/i18n/id.js?v='.date('YmdHis')); ?>"></script>
<script src="<?php echo assets_plugin('datatables/datatables.js?v='.date('YmdHis')); ?>"></script>
<script src="<?php echo assets_js('common.js?v='.date('YmdHis')); ?>"></script>

<?php 
	echo $js;
?>
