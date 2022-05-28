<?php
include("header.php");
if (isset($_POST["submit"])){
    if (login($_POST["username"], $_POST["password"])){
        $_SESSION["isLogin"] = true;
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Username or password is incorrect');</script>";
    }
}
?>
<form action="login.php" method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" name="submit" value="Login">
</form>
