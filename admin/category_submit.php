<?php
include("header.php");
?>
<head><title>提交餐厅</title></head>
<body>
<div class="container">
<?php
if (isset($_POST['submit'])){
    $restaurant = new restaurant($_POST['restaurant_id']);
    $restaurant->update_category($_POST['category']);
    $restaurant->update_richness($_POST['richness']);
    $restaurant->update_method($_POST['method']);
    alert("Success!");
    echo "<script>window.location.href='category_submit.php';</script>";
    exit;
}
$result = mysqli_query($conn, "SELECT DISTINCT `restaurant`.`id`, `restaurant`.`name` FROM `restaurant` WHERE `restaurant`.`id` NOT IN(SELECT `restaurant_id` FROM `restaurant_tagmap`) ORDER BY RAND() LIMIT 1");
if (mysqli_num_rows($result) == 0) {
    echo "没有未分类的餐厅了捏！";
    exit;
}
$restaurant = new restaurant(mysqli_fetch_assoc($result)['id']);
echo "ID: " . $restaurant->id . "<br>";
echo "餐厅名称：" . $restaurant->name . "<br>";
?>
<form action="" method="post">
    <input type="hidden" name="restaurant_id" value="<?php echo $restaurant->id; ?>">
    <b>类型：</b>
    <select class="btn btn-warning dropdown-toggle" name="method">
        <option value="both">外卖堂食都行</option>
        <option value="takeaway">外卖</option>
        <option value="eatin">堂食</option>
    </select>
    </br>
    <b>价格：</b>
    <select class="btn btn-info dropdown-toggle" name="richness">
        <?php
        $result = mysqli_query($conn, "SELECT id,name FROM richness;");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['name']}</option><br>";
            }
        }
        ?>
    </select>
    <div class="form-check form-switch">
        <?php
        $result = mysqli_query($conn, "SELECT id,name FROM category;");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "{$row['name']} <input class='form-check-input' type='checkbox' role='switch' name='category[]' value='{$row['id']}'><br>";
            }
        }
        ?>
    </div>
    <button type="submit" name="submit" class="btn btn-success">提交！</button>
</form>
</div>
<?php include("../footer.php"); ?>
</body>
