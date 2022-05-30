<?php
include("header.php");
?>
<head>
    <title>分类管理</title>
</head>
<body>
<div class="container" style="padding-top:70px; margin-bottom: 110px">
    <div class="col-md-10 center-block" style="float: none;">
        <div class="table-responsive">
            <form action="" method="post">
                <input type="text" name="category_name">
                <button type="submit" name="submit" class="btn btn-success">新增一个类别</button>
            </form>
            <?php
            if (isset($_POST["submit"])) {
                if ($_POST["category_name"] == null) {
                    echo "<div class='alert alert-danger' role='alert'>类别不能为空！</div>";
                } else {
                    mysqli_query($conn, "INSERT INTO category (name) VALUES ('{$_POST['category_name']}');");
                }
            } ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">类别ID</th>
                    <th scope="col">类别名</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT id,name FROM category;");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><th scope='row'>{$row['id']}</th><td>{$row['name']}</td><td><a href='editcateg.php?action=edit&id={$row['id']}' class='btn btn-primary'>编辑</a> <a href='editcateg.php?action=delete&id={$row['id']}' class='btn btn-danger'>删除</a></td></tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include("../footer.php");
?>
</body>