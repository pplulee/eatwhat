<?php
function restaurant_exist($id): bool
{
    global $conn;
    return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM restaurant WHERE id = '{$id}';")) != 0;
}

function generate_restaurant($category, $richness, $method): restaurant
{
    global $conn;
    if (sizeof($category) == 0)
        $category_sql = "1";
    else {
        $category_str = implode(",", $category);
        $category_sql = "rstmap.category_id IN ({$category_str})";
    }
    if ($richness != "") {
        $richness_sql = "rst.richness = '{$richness}'";
    } else {
        $richness_sql = "rst.richness LIKE '%'";
    }
    switch ($method) {
        case "takeaway":
            $method_sql = "rst.method != 'eatin'";
            break;
        case "eatin":
            $method_sql = "rst.method != 'takeaway'";
            break;
        default:
            $method_sql = "rst.method LIKE '%'";
            break;
    }
    $result = mysqli_query($conn, "SELECT DISTINCT rst.id FROM restaurant AS rst JOIN restaurant_tagmap AS rstmap ON rst.id=rstmap.restaurant_id WHERE {$category_sql} AND {$richness_sql} AND {$method_sql} ORDER BY RAND() LIMIT 1;");
    if (mysqli_num_rows($result) == 0) {
        $id = 0;
    } else {
        $id = mysqli_fetch_assoc($result)['id'];
    }
    return new restaurant($id);
}

function alert($message)
{
    echo "<script>alert('{$message}');</script>";
}

function php_self()
{
    return substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1);
}

function login($username, $password): bool
{
    global $Sys_config;
    return $username == $Sys_config["admin_account"] && $password == $Sys_config["admin_password"];
}