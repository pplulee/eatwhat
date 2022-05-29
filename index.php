<?php
include("header.php");
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
</head>
<body>
<div class="container">
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
    <?php
    if (isset($_POST['submit'])) {
        $restaurant = generate_restaurant((!isset($_POST['category'])) ? (array()) : $_POST['category'], $_POST['richness'], $_POST['method']);
        echo ($restaurant->id == 0) ? ("<h2>没有找到合适的餐厅</h2>") : ("<h2>今天吃{$restaurant->name}</h2>");
    }
    ?>
</div>
<?php
include("footer.php");
?>
</body>
</html>
