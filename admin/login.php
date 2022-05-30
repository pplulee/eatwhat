<?php
include("header.php");
if (isset($_GET['logout'])) {
    logout();
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
if (isset($_POST["submit"])) {
    if (login($_POST["username"], $_POST["password"])) {
        $_SESSION["isLogin"] = true;
        echo "<script>window.location.href='index.php';</script>";
        exit;
    } else {
        alert("用户名或密码不正确");
    }
}
?>
<body>
<div class="container" style="align-self: center; position: relative;width: <?php echo ((isMobile())?"auto":"20%"); ?>;margin-top: 15%">
    <div class="card border-dark">
        <h4 class="card-header bg-primary text-white text-center">管理员登录</h4>
        <div class="card-body" style="margin:0 5% 5% 5%;">
            <form action="login.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="username_input"><i class="bi bi-person-fill"></i>账户</span>
                    <input type="text" name="username" class="form-control" aria-describedby="username_input">
                </div>
                <br>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="password_input"><i class="bi bi-shield-lock-fill"></i>密码</span>
                    <input type="password" name="password" class="form-control" aria-describedby="password_input">
                </div>
                <a href='https://admin.tian-shen.cyou/' target="_blank"><button type="button" class="btn btn-secondary btn-sm">查询密码</button></a>
                <div class="submit">
                    <input style="margin-top: 10%;width:100%;float:left;" class="btn btn-success" type="submit" name="submit" value="登录">
                </div>
            </form>
            <a href='../index.php' class='btn btn-primary' style="margin-top: 10%;">返回首页</a>
        </div>
    </div>
</div>
<?php include("../footer.php"); ?>
</body>