<?php
function restaurant_exist($id): bool
{
    global $conn;
    return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM restaurant WHERE id = '{$id}';")) != 0;
}

function generate_restaurant($category, $richness, $method): restaurant
{
    global $conn;
    if (sizeof($category) == 0) {
        if ($richness == "" && $method == "both") {
            $result = mysqli_query($conn, "SELECT id FROM restaurant ORDER BY RAND() LIMIT 1;"); //全部随机
        } elseif ($richness != "" && $method == "both") {
            $result = mysqli_query($conn, "SELECT id FROM restaurant WHERE richness='{$richness}' ORDER BY RAND() LIMIT 1;"); //按消费等级
        } elseif ($richness == "" && $method != "both") {
            $result = mysqli_query($conn, "SELECT id FROM restaurant WHERE method='{$method}' ORDER BY RAND() LIMIT 1;"); //按方法
        } else{
            $result = mysqli_query($conn, "SELECT id FROM restaurant WHERE richness='{$richness}' AND method='{$method}' ORDER BY RAND() LIMIT 1;"); //按消费等级和方法
        }
    } else {
        $category_sql = "rstmap.category_id IN (" . implode(",", $category) . ")";
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
        $richness_sql = ($richness != "" ? "rst.richness = '{$richness}'" : "rst.richness LIKE '%'");
        $result = mysqli_query($conn, "SELECT DISTINCT rst.id FROM restaurant AS rst JOIN restaurant_tagmap AS rstmap ON rst.id=rstmap.restaurant_id WHERE {$category_sql} AND {$richness_sql} AND {$method_sql} ORDER BY RAND() LIMIT 1;");//全选！
    }
    return new restaurant(mysqli_num_rows($result) == 0 ? 0 : mysqli_fetch_assoc($result)['id']);
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

function get_category_name($id): string
{
    global $conn;
    $result = mysqli_query($conn, "SELECT name FROM category WHERE id = '{$id}';");
    return mysqli_fetch_assoc($result)['name'];
}

function logout()
{
    session_destroy();
    alert("登出成功");
    echo "<script>setTimeout(\"javascript:location.href='index.php'\", 500);</script>";
}

function isMobile(): bool
{
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset($_SERVER['HTTP_VIA'])) {
        // 找不到为flase,否则为true
        return (bool)stristr($_SERVER['HTTP_VIA'], "wap");
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel',
            'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi',
            'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile', 'MicroMessenger');
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') ===
                false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}