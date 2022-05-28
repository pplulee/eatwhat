<?php
include("../include/common.php");
session_start();
if (!isset($_SESSION['isLogin'])) {
    $_SESSION['isLogin'] = false;
}
if ((!$_SESSION['isLogin']) && php_self() != "login.php") {
    echo "<script>window.location.href='login.php';</script>"; // Redirect to login page
    exit;
}
if (php_self() != "login.php" && $_SESSION['isLogin']) {
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">管理面板</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">网站首页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">分类管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="restaurant.php">餐厅管理</a>
                </li>
            </ul>
        </div>
    </div>
</nav>';
}
?>
