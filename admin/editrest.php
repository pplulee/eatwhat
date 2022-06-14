<?php
include("header.php");
if (isset($_POST['submit'])) {
    switch ($_POST['action']) {
        case "add":
            mysqli_query($conn, "INSERT INTO restaurant (name,richness,method) values ('{$_POST['name']}','{$_POST['richness']}','{$_POST['method']}');");
            $max_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id) as max_id FROM restaurant"))['max_id'];
            $restaurant = new restaurant($max_id);
            $restaurant->update_category($_POST['category']);
            $restaurant->update_recommend($_POST['recommend']);
            alert("添加成功");
            echo "<script>setTimeout(\"javascript:location.href='restaurant.php'\", 500);</script>";
            exit;
        case "edit":
            $restaurant = new restaurant($_POST['id']);
            $restaurant->update_name($_POST['name']);
            $restaurant->update_richness($_POST['richness']);
            $restaurant->update_method($_POST['method']);
            $restaurant->update_category($_POST['category']);
            $restaurant->update_recommend($_POST['recommend']);
            alert("修改成功");
            echo "<script>setTimeout(\"javascript:location.href='restaurant.php'\", 500);</script>";
            exit;
        default:
            alert("未知操作");
            echo "<script>setTimeout(\"javascript:location.href='restaurant.php'\", 500);</script>";
            exit;
    }
} elseif (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            break;
        case "edit":
            if (!isset($_GET['id']) || !restaurant_exist($_GET['id'])) {
                echo '<div class="alert alert-danger" role="alert"><p>参数错误</p></div>';
                echo "<script>setTimeout(\"javascript:location.href='restaurant.php'\", 500);</script>";
                exit;
            }
            $restaurant = new restaurant($_GET['id']);
            break;
        case "delete":
            $restaurant = new restaurant($_GET['id']);
            $restaurant->delete_restaurant();
            alert("删除成功");
            echo "<script>setTimeout(\"javascript:location.href='restaurant.php'\", 500);</script>";
            exit;
        default:
            echo '<div class="alert alert-danger" role="alert"><p>未知操作</p></div>';
            echo "<script>setTimeout(\"javascript:location.href='restaurant.php'\", 500);</script>";
            exit;
    }
}
?>
<div class="container" style="margin-top: 2%;width: <?php echo (isMobile())?"auto":"30%"; ?>;">
    <div class='card border-dark'>
        <h4 class='card-header bg-primary text-white text-center'>编辑餐厅</h4>
<form action='' method='post' style="margin: 20px;">
    <div class="input-group mb-3">
        <span class='input-group-text' id='name'>名称</span>
        <input type='text' class='form-control' name='name'
                   <?php if ($_GET['action'] == "edit") echo "value='{$restaurant->name}'"; ?>required>
    </div>
    <div class="row">
    <div class='btn-group' style="margin-bottom: 20px">
        <span class='input-group-text' id='category'>分类</span>
        <div class="form-check form-switch" style="width: 200px; margin-left: 20px">
            <?php
            $result = mysqli_query($conn, "SELECT id,name FROM category;");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $checked = "";
                    if ($_GET['action'] == "edit") {
                        if (in_array($row['id'], $restaurant->category)) $checked = "checked";
                    }
                    echo "{$row['name']} <input class='form-check-input' type='checkbox' role='switch' name='category[]' {$checked} value='{$row['id']}'><br>";
                }
            }
            ?>
        </div>
    </div>
    <div class="row">
    <div class='btn-group mb-3'>
        <span class='input-group-text' id='richness'>消费等级</span>
        <select class="btn btn-info dropdown-toggle" name="richness" style="margin-left: 20px" required>
            <?php
            $result = mysqli_query($conn, "SELECT id,name FROM richness;");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($_GET['action'] == "edit"&&$row['id']==$restaurant->richness) {
                        echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                    }
                    else {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }
            }
            ?>
        </select>
    </div>
    </div>
    <div class="row">
    <div class='btn-group mb-3'>
        <span class='input-group-text' id='method'>堂食/外卖</span>
        <select class="btn btn-warning dropdown-toggle" style="margin-left: 20px" name="method">
            <option value="both" <?php if ($_GET['action'] == "edit" && $restaurant->method == "both") echo "selected" ?>>
                外卖堂食都行
            </option>
            <option value="takeaway" <?php if ($_GET['action'] == "edit" && $restaurant->method == "takeaway") echo "selected" ?>>
                外卖
            </option>
            <option value="eatin" <?php if ($_GET['action'] == "edit" && $restaurant->method == "eatin") echo "selected" ?>>
                堂食
            </option>
        </select>
    </div>
    </div>
        <div class="row">
            <div class='btn-group mb-3'>
                <span class='input-group-text' id='richness'>推荐菜</span>
                <input type='text' class='form-control' name='recommend' value='<?php if ($_GET['action'] == "edit") echo $restaurant->get_recommend() ?>'>
            </div>
        </div>
    </div>
    <?php if ($_GET['action'] == "add") {
        echo "<input type='hidden' name='action' value='add'>";
        echo "<input type='submit' class='btn btn-primary' name='submit' value='添加'>";
    } else {
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='hidden' name='id' value='{$restaurant->id}'>";
        echo "<input type='submit' class='btn btn-primary' name='submit' value='保存'>";
    } ?>
</form>
</div>
