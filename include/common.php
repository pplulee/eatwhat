<?php
header('Content-Type: text/html; charset=UTF-8');
include $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include("function.php");
include("class/restaurant.php");

//Enable error reporting
if ($Sys_config["debug"]) {
    ini_set("display_errors", "On");
    error_reporting(E_ALL);
}
$conn = @mysqli_connect($Sys_config["db_host"], $Sys_config["db_user"], $Sys_config["db_password"], $Sys_config["db_database"]);  //数据库连接
if (!$conn) {
    die("数据库连接失败：" . mysqli_connect_error());
}

if (!isset($_COOKIE['roll_limit'])){
    setcookie("roll_limit","initial",time()+3600);
}

//Initialize CSS
echo '<!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
    #footer {
            position: fixed;
            bottom: 0;
            background: #252525;
            margin: 0;
            padding: 36px 0 42px;
            width: 100%;
            height: 90px;
        }

        #footer div {
            margin: 0 auto;
            overflow: hidden;
            padding: 0;
            width: auto;
        }

        #footer div p {
            color: #fff;
            float: left;
            line-height: 22px;
            margin: 0 0 0 10px;
            padding: 0;
        }

        #footer div p a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>';
