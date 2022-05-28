<?php
include("header.php");
echo $_POST['restaurant_id'];
if (isset($_POST['submit'])) {
    $restaurant = new restaurant($_POST['restaurant_id']);
    $restaurant->update_category($_POST['category']);
    $restaurant->update_richness($_POST['richness']);
    $restaurant->update_method($_POST['method']);
}
alert("Success!");
echo "<script>window.location.href='helpus.php';</script>";
?>
