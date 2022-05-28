<?php
include("header.php");
?>
<h1>Welcome to the home page</h1>
<form action="" method="post">
    <input type="text" name="category" placeholder="category">
    <input type="text" name="richness" placeholder="richness">
    <input type="text" name="method" placeholder="method">
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
<?php
if (isset($_POST['submit'])) {
    $restaurant=generate_restaurant($_POST['category'], $_POST['richness'], $_POST['method']);
    echo "<h2>Your restaurant is:{$restaurant->name}</h2>";
}