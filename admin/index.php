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
            <b>MySQL版本:</b> <?php echo mysqli_get_server_version($conn) ?>
        </li>
        <li class="list-group-item">
            <b>网页服务器:</b> <?php echo $_SERVER['SERVER_SOFTWARE'] ?>
        </li>
        <li class="list-group-item">
            <b>最大运行时间:</b> <?php echo ini_get('max_execution_time') ?>s
        </li>
        <li class="list-group-item">
            <b>允许POST:</b> <?php echo ini_get('post_max_size'); ?>
        </li>
        <li class="list-group-item">
            <b>允许文件上传:</b> <?php echo ini_get('upload_max_filesize'); ?>
        </li>
        <li class="list-group-item">
            <b>现有餐厅数量:</b> <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM restaurant;")); ?>
        </li>
    </ul>
</div>