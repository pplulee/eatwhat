<?php include "include/common.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>404</title>
<style>
	body{
		font-size:14px;
    <?php
    echo isMobile()?"background-image: url('resource/background.jpg');":"background-image: url('resource/backgroundH.jpg');";
    ?> background-size: cover;
        background-repeat: no-repeat;
        z-index: -2;
        margin-bottom: 110px;
	}
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-color: rgba(255, 255, 255, 0.6);
    }
	h3{
		font-size:60px;
		text-align:center;
		padding-top:30px;
		font-weight:normal;
	}
</style>

</head>

<body>
<h3><img src="resource/bgxl.png" height="60px" width="60px">404了喵 你所访问的文件不存在喵<img src="resource/fail.png" height="60px" width="60px"></h3>
</body>
</html>
