<?php
include("header.php");
if (isset($_POST['submit'])) {
    switch ($_POST['action']) {
        case "add":
            mysqli_query($conn, "INSERT INTO restaurant (name,address,richness,method) values ('{$_POST['name']}','{$_POST['address']}','{$_POST['richness']}','{$_POST['method']}');");
            $max_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id) as max_id FROM restaurant"))['max_id'];
            $restaurant = new restaurant($max_id);
            $restaurant->update_category($_POST['category']);
            alert("添加成功");
            echo "<script>setTimeout(\"javascript:location.href='restaurant.php'\", 500);</script>";
            exit;
        case "edit":
            $restaurant = new restaurant($_POST['id']);
            $restaurant->update_name($_POST['name']);
            $restaurant->update_address($_POST['address']);
            $restaurant->update_richness($_POST['richness']);
            $restaurant->update_method($_POST['method']);
            $restaurant->update_category($_POST['category']);
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
<form action='' method='post'>
    <div class='row'>
        <div class='col'>
            <label>名称</label><br>
            <input type='text' class='form-control' name='name'
                   <?php if ($_GET['action'] == "edit") echo "value='{$restaurant->name}'"; ?>required>
        </div>
        <div class='col'>
            <label>地址</label><br>
            <input type='text' class='form-control' name='address'
                   <?php if ($_GET['action'] == "edit") echo "value='{$restaurant->address}'"; ?>required>
        </div>
        <div class='col'>
            <label>分类</label><br>
            <div class="form-check form-switch">
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
        <div class='col'>
            <label>消费等级</label><br>
            <select class="btn btn-info dropdown-toggle" name="richness" required>
                <?php
                $result = mysqli_query($conn, "SELECT id,name FROM richness;");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option><br>";
                    }
                }
                ?>
            </select>
        </div>
        <div class='col'>
            <label>堂食/外卖</label><br>
            <select class="btn btn-warning dropdown-toggle" name="method">
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
    <?php if ($_GET['action'] == "add") {
        echo "<input type='hidden' name='action' value='add'>";
        echo "<input type='submit' class='btn btn-primary' name='submit' value='添加'>";
    } else {
        echo "<input type='hidden' name='action' value='edit'>";
        echo "<input type='hidden' name='id' value='{$restaurant->id}'>";
        echo "<input type='submit' class='btn btn-primary' name='submit' value='保存'>";
    } ?>
</form>
