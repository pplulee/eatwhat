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
    <a href="../index.php" style="position: relative; left: 50%; right: 50%">
        <button type="button" class="btn btn-info">Go Back</button>
    </a>
    <form action="login.php" method="post">
        <h3 style="text-align: center">Username:<input type="text" name="username"></h3>
        <br>
        <h3 style="text-align: center">Password:<input type="password" name="password"></h3>
        <br>
        <div class="submit" style="position: absolute; left: 50%; right: 50%">
            <input class="btn btn-success" type="submit" name="submit" value="Login">
        </div>
    </form>
</div>
<?php include("../footer.php"); ?>
</body>