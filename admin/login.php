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
    } else {
        echo "<script>alert('Username or password is incorrect');</script>";
    }
}
?>
<body>
<div class="container" style="align-self: center; position: relative;">
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