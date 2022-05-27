<?php

class restaurant
{
    var $id;
    var $name;
    var $address;
    var $postcode;
    var $richness=array();
    var $category;
    var $method;


    function __construct($id)
    {
        if (restaurant_exist($id)){
            $this->id = $id;
            $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM restaurants WHERE id = '{$id}'"));
            $this->name = $result['name'];
            $this->address = $result['address'];
            $this->postcode = $result['postcode'];
            $this->richness = $result['richness'];
            $category = mysqli_query($conn, "SELECT category_id FROM restaurants_tagmap WHERE restaurantid = '{$id}'");
            if(mysqli_num_rows($category) > 0){
                while($row = mysqli_fetch_assoc($category)){
                    $this->category.array_push($row['category_id']);
                }
            }
            $this->method = $result['method'];
        }else{
            echo "Restaurant doesn't exist";
        }
    }
}