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
<div class="container" style="align-self: center; position: relative;">
    <div class="card">
        <h5 class="card-header">管理员登录</h5>
        <div class="card-body" style="margin:0% 5% 5% 5%;">
            <form action="login.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="username_input">用户名</span>
                    <input type="text" name="username" class="form-control" aria-describedby="username_input">
                </div>
                <br>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="password_input">密码</span>
                    <input type="password" name="password" class="form-control" aria-describedby="password_input">
                </div>
                <div class="submit">
                    <input class="btn btn-success" type="submit" name="submit" value="登录">
                </div>
                <br>
                <a href='../index.php' class='btn btn-primary'>返回首页</a
            </form>
        </div>
    </div>
</div>
<?php include("../footer.php"); ?>
</body>