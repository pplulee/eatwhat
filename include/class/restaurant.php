<?php

class restaurant
{
    var $id;
    var $name;
    var $address;
    var $postcode;
    var $richness;
    var array $category= array();
    var $method;


    function __construct($id)
    {
        global $conn;
        if (restaurant_exist($id)) {
            $this->id = $id;
            $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM restaurant WHERE id = '{$id}';"));
            $this->name = $result['name'];
            $this->address = $result['address'];
            $this->postcode = $result['postcode'];
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

    function update_category($category)
    {
        global $conn;
        foreach ($category as $cat) {
            mysqli_query($conn, "INSERT INTO restaurant_tagmap (restaurant_id, category_id) VALUES ('{$this->id}', '{$cat}');");
        }
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
}