<?php
include("header.php");
?>
<head>
    <title>餐厅管理</title>
</head>
<body>
<div class="container" style="padding-top:70px;">
    <div class="col-md-15 center-block" style="float: none;">
        <div class="table-responsive">
            <button type="submit" name="submit" class="btn btn-success"
                    onclick="window.location.href='editrest.php?action=add'">新增一个餐厅
            </button>
            <?php
            if (isset($_POST["submit"])) {
                if ($_POST["restaurant_name"] == null) {
                    echo "<div class='alert alert-danger' role='alert'>名称不能为空！</div>";
                } else {
                    mysqli_query($conn, "INSERT INTO category (name) VALUES ('{$_POST['category_name']}');");
                }
            } ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">餐厅名称</th>
                    <th scope="col">分类</th>
                    <th scope="col">消费等级</th>
                    <th scope="col">堂食/外卖</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT id FROM restaurant ORDER BY id ASC;");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $restaurant = new restaurant($row["id"]);
                        echo "<tr><th scope='row'>{$restaurant->id}</th><td>{$restaurant->name}</td><td>{$restaurant->get_category("string")}</td><td>{$restaurant->richness}</td><td>{$restaurant->method}</td><td><a href='editrest.php?action=edit&id={$row['id']}' class='btn btn-primary'>编辑</a> <a href='editrest.php?action=delete&id={$row['id']}' class='btn btn-danger'>删除</a></td></tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../footer.php"); ?>
</body>
