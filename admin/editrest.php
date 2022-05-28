<?php
include("header.php");
switch ($_GET['action']) {
    case "add":
        break;
    case "edit":
        if (!isset($_GET['id'])||!restaurant_exist($_GET['id'])) {
            echo '<div class="alert alert-danger" role="alert"><p>参数错误</p></div>';
            echo "<script>setTimeout(\"javascript:location.href='restaurant.php'\", 500);</script>";
            exit;
        }
        $restaurant = new restaurant($_GET['id']);
        break;
    default:
        echo '<div class="alert alert-danger" role="alert"><p>未知操作</p></div>';
        echo "<script>setTimeout(\"javascript:location.href='category.php'\", 500);</script>";
        exit;
}
?>
<form action='' method='post'>
    <?php if ($_GET['action'] == "edit")  echo "<input type='hidden' name='id' value='$restaurant->id";  ?>
    <div class='row'>
        <div class='col'>
            <label>名称</label><br>
            <input type='text' class='form-control' name='name'  <?php if ($_GET['action'] == "edit") echo "value='$restaurant->name'"; ?>required>
        </div>
        <div class='col'>
            <label>地址</label><br>
            <input type='text' class='form-control' name='address'  <?php if ($_GET['action'] == "edit") echo "value='$restaurant->address'"; ?>required>
        </div>
        <div class='col'>
            <label>分类</label><br>
            <div class="form-check form-switch">
                <?php
                $result = mysqli_query($conn, "SELECT id,name FROM category;");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $checked="";
                        if ($_GET['action'] == "edit") {
                            if (in_array($row['id'], $restaurant->category)) $checked="checked";
                        }
                        echo "{$row['name']} <input class='form-check-input' type='checkbox' role='switch' name='category[]' {$checked} value='{$row['id']}'><br>";
                    }
                }
                ?>
            </div>
        </div>
        <div class='col'>
            <label>消费等级</label><br>
            <input type='text' class='form-control' name='richness'  <?php if ($_GET['action'] == "edit") echo "value='$restaurant->richness'"; ?>required>
        </div>
        <div class='col'>
            <label>堂食/外卖</label><br>
            <select class="btn btn-warning dropdown-toggle" name="method">
                <option value="both" <?php if ($_GET['action'] == "edit"&&$restaurant->method=="both") echo "selected"?>>外卖堂食都行</option>
                <option value="takeaway" <?php if ($_GET['action'] == "edit"&&$restaurant->method=="takeaway") echo "selected"?>>外卖</option>
                <option value="eatin" <?php if ($_GET['action'] == "edit"&&$restaurant->method=="eatin") echo "selected"?>>堂食</option>
            </select>
        </div>

    </div>
    <input type='submit' name='submit' class='btn btn-primary btn-block' value='Save'>
</form>
