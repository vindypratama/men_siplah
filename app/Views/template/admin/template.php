<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <?php
        echo $css; 
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- wrapper -->
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo assets_template('admin/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php 
        echo $navbar;
        ?>

        <?php
        echo $sidebar;
        ?>

        <?php
        echo $content;
        ?>

        <?php
        echo $footer;
        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php
    echo $js;
    ?>
</body>
</html>
