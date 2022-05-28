<?php
include("header.php");
?>
    <head>
        <title>今天吃什么</title>
    </head>
<div class="container">
    <h1>欢迎来到<p style="color:darkgreen;">今天吃什么<span class="badge bg-primary">内测版</span></p></h1>
    <form action="" method="post">
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
            <select class="btn btn-warning dropdown-toggle" name="method">
                <option value="takeaway">外卖</option>
                <option value="eatin">堂食</option>
                <option value="both">都有</option>
            </select>
            </br>
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
            <button type="submit" name="submit" class="btn btn-success">开吃！</button>
    </form>
<?php
if (isset($_POST['submit'])) {
    $restaurant = generate_restaurant((!isset($_POST['category'])) ? (array()) : $_POST['category'], $_POST['richness'], $_POST['method']);
    echo ($restaurant->id == 0) ? ("<h2>没有找到合适的餐厅</h2>") : ("<h2>今天吃{$restaurant->name}</h2>");
}
?>
</div>
