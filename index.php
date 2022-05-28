<?php
include("header.php");
?>
<head>
    <title>今天吃什么</title>
</head>
<h1>欢迎来到 <b>今天吃什么</b></h1>
<form action="" method="post">
    <input type="text" name="category" placeholder="类别">
    <input type="text" name="richness" placeholder="价格">
    <select>
        <option value ="takeaway">外卖</option>
        <option value ="eatin">堂食</option>
        <option value="both">都有</option>
    </select>
    <button type="submit" name="submit" class="btn btn-success">开吃！</button>
</form>
<?php
if (isset($_POST['submit'])) {
    $restaurant=generate_restaurant($_POST['category'], $_POST['richness'], $_POST['method']);
    echo "<h2>Your restaurant is:{$restaurant->name}</h2>";
}