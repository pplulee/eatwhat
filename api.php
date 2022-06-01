<?php
include("header.php");

echo generate_restaurant(array(),($_GET["richness"] ?? ""),(isset($_GET["method"]))?$_GET["method"]:"both")->name;
