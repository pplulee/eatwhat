<?php
include("header.php");
function isMobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset($_SERVER['HTTP_VIA'])) {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel',
            'lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi',
            'openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger');
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') ===
                false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}
?>
<html>
<head>
    <title>今天吃什么</title>
    <link rel="manifest" href="manifest.json" />
<!--    <script>-->
<!--        if (navigator.serviceWorker != null) {-->
<!--            navigator.serviceWorker.register('sw.js')-->
<!--                .then(function(registration) {-->
<!--                    console.log('Registered events at scope: ', registration.scope);-->
<!--                });-->
<!--        }-->
<!--    </script>-->
    <style>
        body{
            <?php
            if (isMobile()) {
                echo "background-image: url('background.jpg');";
            } else {
                echo "background-image: url('backgroundH.jpg');";
            }
            ?>
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -2;
        }
        body::before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row align-items-start">
        <div class="col">
    <h1>欢迎来到<p style="color:darkgreen;">今天吃什么<span class="badge bg-primary">内测版</span></p></h1>
    <form action="" method="post">
        <b>价格：</b>
        <select class="btn btn-info dropdown-toggle" name="richness">
            <option value=''>随机</option>
            <br>
            <?php
            $result = mysqli_query($conn, "SELECT id,name FROM richness;");
            $selected_item = (isset($_POST['submit'])) ? $_POST['richness'] : '0';
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($selected_item == $row['id']) {
                        $code = "selected";
                    } else {
                        $code = "";
                    }
                    echo "<option $code value='{$row['id']}'>{$row['name']}</option><br>";
                }
            }
            ?>
        </select>
        <b>类型：</b>
        <select class="btn btn-warning dropdown-toggle" name="method">
            <option value="both" <?php echo (isset($_POST['submit']) && $_POST['method'] == 'both') ? "selected" : ""; ?>>
                外卖堂食都行
            </option>
            <option value="takeaway" <?php echo (isset($_POST['submit']) && $_POST['method'] == 'takeaway') ? "selected" : ""; ?>>
                外卖
            </option>
            <option value="eatin" <?php echo (isset($_POST['submit']) && $_POST['method'] == 'eatin') ? "selected" : ""; ?>>
                堂食
            </option>
        </select>
        <br>
        <div class="form-check form-switch">
            <?php
            $result = mysqli_query($conn, "SELECT id,name FROM category;");
            $selected_item = (isset($_POST['submit']) && isset($_POST['category'])) ? $_POST['category'] : array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (in_array($row['id'], $selected_item)) {
                        $code = "checked";
                    } else {
                        $code = "";
                    }
                    echo "{$row['name']} <input $code class='form-check-input' type='checkbox' role='switch' name='category[]' value='{$row['id']}'><br>";
                }
            }
            ?>
        </div>
        <button type="submit" name="submit" class="btn btn-success">开吃！</button>
    </form>
        </div>
        <div class="col">
    <?php
    if (isset($_POST['submit'])) {
        $restaurant = generate_restaurant((!isset($_POST['category'])) ? (array()) : $_POST['category'], $_POST['richness'], $_POST['method']);
        if (isMobile()):
            $size = 64;
        else:
            $size = 256;
        endif;
        echo "<img src='icon.png' style='alignment: center' height='{$size}' width='{$size}'>";
        echo "<img src='icon.png' style='alignment: center' height='{$size}' width='{$size}'>";
        echo ($restaurant->id == 0) ? ("<div class='alert alert-primary' role='alert' style='text-align: center'>没有找到合适的餐厅</div>") : ("<div class='alert alert-primary' role='alert' style='text-align: center'>今天吃<br><b>{$restaurant->name}</b></div>");
    }
    ?>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>
</body>
</html>
