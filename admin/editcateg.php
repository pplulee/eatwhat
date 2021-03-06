<?php
include("header.php");

if (isset($_POST["submit"])) {
    mysqli_query($conn, "UPDATE category SET name='".htmlspecialchars($_POST["name"],ENT_QUOTES)."' WHERE id='{$_GET['id']}';");
    echo "<div class='alert alert-success' role='alert'><p>修改成功，即将返回</p></div>";
    echo "<script>setTimeout(\"javascript:location.href='category.php'\", 1000);</script>";
    exit;
}

if (!isset($_GET["id"]) || !isset($_GET["action"])) {
    echo '<div class="alert alert-danger" role="alert"><p>参数错误</p></div>';
    echo "<script>setTimeout(\"javascript:location.href='category.php'\", 500);</script>";
    exit;
}

echo "<title>编辑类别</title>";
switch ($_GET["action"]) {
    case "delete":
        if ((mysqli_num_rows(mysqli_query($conn, "SELECT id FROM category WHERE id='{$_GET['id']}';")) == 0)) {
            echo "<div class='alert alert-danger' role='alert'>类别不存在</div>";
            exit;
        } else {
            mysqli_query($conn, "DELETE FROM category WHERE id='{$_GET['id']}'");
            mysqli_query($conn, "DELETE FROM restaurant_tagmap WHERE category_id='{$_GET['id']}'");
            alert("删除成功");
            echo "<script>setTimeout(\"javascript:location.href='category.php'\", 0);</script>";
        }
        break;
    case "edit":
        $result = mysqli_query($conn, "SELECT * FROM category WHERE id='{$_GET['id']}';");
        if (mysqli_num_rows($result) == 0) {
            echo '<div class="alert alert-danger" role="alert"><p>未找到该类别</p></div>';
            echo "<script>setTimeout(\"javascript:location.href='category.php'\", 500);</script>";
            exit;
        }
        $result = mysqli_fetch_assoc($result);
        $width = isMobile()? "auto" : "20%";
        echo "
        <div class='container' style='margin-top: 2%; width: {$width};'>
        <div class='card border-dark'>
        <h4 class='card-header bg-primary text-white text-center'>编辑类别</h4>
        <form action='' method='post' style='margin: 20px;'>
            <div class='input-group mb-3'>
                    <span class='input-group-text' id='id'>ID</span>
                    <input type='text' class='form-control' name='id' value='{$result['id']}' readonly>
            </div>
            <div class='input-group mb-3'>
                    <span class='input-group-text' id='name'>名称</span>
                    <input type='text' class='form-control' name='name' value='{$result['name']}' required>
            </div>
            <input type='submit' name='submit' class='btn btn-primary btn-block' value='保存'>
        </form>
        </div>
        </div>";
        break;
    default:
        echo '<div class="alert alert-danger" role="alert"><p>未知操作</p></div>';
        echo "<script>setTimeout(\"javascript:location.href='category.php'\", 500);</script>";
        exit;

}
