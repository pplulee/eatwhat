<?php
include("header.php");
?>
<html>
<head>
    <title>今天吃什么</title>
    <link rel="manifest" href="manifest.json"/>
    <!--    <script>-->
    <!--        if (navigator.serviceWorker != null) {-->
    <!--            navigator.serviceWorker.register('sw.js')-->
    <!--                .then(function(registration) {-->
    <!--                    console.log('Registered events at scope: ', registration.scope);-->
    <!--                });-->
    <!--        }-->
    <!--    </script>-->
    <style>
        body {
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
    </style>
</head>
<body>
<div class="container">
    <div class="row align-items-start">
        <div class="col">
            <h1>欢迎来到<p style="color:darkgreen;">今天吃什么<a href="/ios"><span class="badge bg-primary">iOS捷径</span></a></p></h1>
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
                            $code = $selected_item == $row['id'] ? "selected" : "";
                            echo "<option $code value='{$row['id']}'>{$row['name']}</option><br>";
                        }
                    }
                    ?>
                </select>
                <br>
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
                            $code = in_array($row['id'], $selected_item) ? "checked" : "";
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
                $size = isMobile() ? 64 : 256;
                if ($restaurant->id == 0) {
                    echo "<img src='resource/fail.png' style='alignment: center' height='$size' width='$size'>";
                    echo "<img src='resource/fail.png' style='alignment: center' height='$size' width='$size'>";
                    echo "<div class='alert alert-primary' role='alert' style='text-align: center'>没有找到合适的餐厅</div>";
                } else {
                    if($restaurant->richness>=4){
                        echo "<img src='resource/bgxl.png' style='alignment: center' height='$size' width='$size'>";
                        echo "<img src='resource/bgxl.png' style='alignment: center' height='$size' width='$size'>";
                    }else{
                        echo "<img src='resource/icon.png' style='alignment: center' height='$size' width='$size'>";
                        echo "<img src='resource/icon.png' style='alignment: center' height='$size' width='$size'>";
                    }
                    in_array(18, (isset($_POST['category'])) ? $_POST['category'] : array())? $prompt = "喝": $prompt = "吃";
                    echo "<div class='alert alert-primary' role='alert' style='text-align: center'>今天{$prompt}<br><b>{$restaurant->name}</b></div>";
                    echo $restaurant->richness == 5 ? "<div class='alert alert-success' role='alert' style='text-align: center'><b>狠狠消费！</b></div>" : "";
                    echo "<div class='alert alert-secondary' role='alert' style='text-align: center'>".$restaurant->get_recommend()."</div>";
                }
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
