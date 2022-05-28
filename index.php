<?php
include("header.php");
?>
    <head>
        <title>今天吃什么</title>
    </head>
    <h1>欢迎来到 <b>今天吃什么</b></h1>
    <form action="" method="post">
        <select name="richness">
            <?php
            $result = mysqli_query($conn, "SELECT id,name FROM richness;");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option><br>";
                }
            }
            ?>
        </select>
        <select name="method">
            <option value="takeaway">外卖</option>
            <option value="eatin">堂食</option>
            <option value="both">都有</option>
        </select>
        </br>
        <?php
        $result = mysqli_query($conn, "SELECT id,name FROM category;");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "{$row['name']} <input type='checkbox' name='category[]' value='{$row['id']}'>";
            }
        }
        ?>
        <button type="submit" name="submit" class="btn btn-success">开吃！</button>
    </form>
<?php
if (isset($_POST['submit'])) {
    $restaurant = generate_restaurant((!isset($_POST['category'])) ? (array()) : $_POST['category'], $_POST['richness'], $_POST['method']);
    echo ($restaurant->id == 0) ? ("<h2>没有找到合适的餐厅</h2>") : ("<h2>今天吃{$restaurant->name}</h2>");
}