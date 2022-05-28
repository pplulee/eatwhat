<?php
include("header.php");
?>
<title>Admin Panel</title>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Server Info</h3>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <b>PHP version:</b><?php echo phpversion() ?>
            <?php if (ini_get('safe_mode')) {
                echo '线程安全';
            } else {
                echo '非线程安全';
            } ?>
        </li>
        <li class="list-group-item">
            <b>MySQL version:</b> <?php echo mysqli_get_server_version($conn) ?>
        </li>
        <li class="list-group-item">
            <b>Web Server:</b> <?php echo $_SERVER['SERVER_SOFTWARE'] ?>
        </li>

        <li class="list-group-item">
            <b>Max Runtime:</b> <?php echo ini_get('max_execution_time') ?>s
        </li>
        <li class="list-group-item">
            <b>Allow Post:</b> <?php echo ini_get('post_max_size'); ?>
        </li>
        <li class="list-group-item">
            <b>Allow File:</b> <?php echo ini_get('upload_max_filesize'); ?>
        </li>
        <li class="list-group-item">
            <b>Total users number:</b> <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT userid FROM user;")); ?>
        </li>
        <li class="list-group-item">
            <b>Total posts number:</b> <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT pid FROM post;")); ?>
        </li>
        <li class="list-group-item">
            <b>Developed by group R3</b>
        </li>
    </ul>
</div>