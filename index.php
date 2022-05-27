<?php
include("header.php");
?>
<h1>Welcome to the home page</h1>"
<form action="index.php" method="post">
    <input type="text" name="category" placeholder="category">
    <input type="text" name="richness" placeholder="richness">
    <input type="text" name="method" placeholder="method">
    <input type="submit" name="submit" value="submit">
</form>
<?php
if (isset($_POST['submit'])) {
    echo "test";
    $restaurant=generate_restaurant($_POST['category'], $_POST['richness'], $_POST['method']);
    echo "<h2>Your restaurant is:{$restaurant->name}</h2>";
}