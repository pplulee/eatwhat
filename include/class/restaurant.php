<?php

class restaurant
{
    var int $id;
    var string $name;
    var string $address;
    var int $richness;
    var array $category= array();
    var string $method;


    function __construct($id)
    {
        global $conn;
        if (restaurant_exist($id)) {
            $this->id = $id;
            $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM restaurant WHERE id = '{$id}';"));
            $this->name = $result['name'];
            $this->address = $result['address'];
            $this->richness = $result['richness'];
            $category = mysqli_query($conn, "SELECT category_id FROM restaurant_tagmap WHERE restaurant_id = '{$id}';");
            if (mysqli_num_rows($category) > 0) {
                while ($row = mysqli_fetch_assoc($category)) {
                    $this->category[] = $row['category_id'];
                }
            }
            $this->method = $result['method'];
        } else {
            $this->id = 0;
        }
    }

    function update_name($name)
    {
        global $conn;
        if ($this->id != 0) {
            $this->name = $name;
            $name = htmlspecialchars($name,ENT_QUOTES);
            mysqli_query($conn, "UPDATE restaurant SET name = '{$name}' WHERE id = '{$this->id}';");
        }
    }

    function update_category($category)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM restaurant_tagmap WHERE restaurant_id = '{$this->id}';");
        foreach ($category as $cat) {
            mysqli_query($conn, "INSERT INTO restaurant_tagmap (restaurant_id, category_id) VALUES ('{$this->id}', '{$cat}');");
        }
    }

    function update_address($address)
    {
        global $conn;
        $this->address = $address;
        $address=htmlspecialchars($address,ENT_QUOTES);
        mysqli_query($conn, "UPDATE restaurant SET address = '{$address}' WHERE id = '{$this->id}';");
    }

    function update_method($method)
    {
        global $conn;
        mysqli_query($conn, "UPDATE restaurant SET method = '{$method}' WHERE id = '{$this->id}';");
    }

    function update_richness($richness)
    {
        global $conn;
        mysqli_query($conn, "UPDATE restaurant SET richness = '{$richness}' WHERE id = '{$this->id}';");
    }

    function get_category($method)
    {
        global $conn;
        $result = mysqli_query($conn, "SELECT category_id FROM restaurant_tagmap WHERE restaurant_id = '{$this->id}';");
        $category = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $category[] = get_category_name($row['category_id']);
            }
        }
        return ($method=="array")?$category:implode(",", $category);
    }

    function delete_restaurant()
    {
        global $conn;
        if ($this->id != 0) {
            mysqli_query($conn, "DELETE FROM restaurant WHERE id = '{$this->id}';");
            mysqli_query($conn, "DELETE FROM restaurant_tagmap WHERE restaurant_id = '{$this->id}';");
            $this->id = 0;
        }
    }
}