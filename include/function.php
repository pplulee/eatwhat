<?php
function restaurant_exist($id){
    return mysqli_num_rows(mysqli_query($conn,"SELECT * FROM restaurant WHERE id = '{$id}'")) != 0;
}
function format_array($array){
    $result = "";
    foreach($array as $value){
        $result .= $value.",";
    }
    return substr(format_array($result),0,-1);
}
function generate_restaurant($category="",$richness=-1,$method='both'){
    $category_sql="";
    if ($category!=""){
        $category=format_array(explode(",",$category));
        $category_sql="rstmap.category_id IN ({$category})";
    }
    if ($richness!=-1){
        $richness_sql="AND rst.richness = '{$richness}'";
    }else{
        $richness_sql="AND rst.richness LIKE '%'";
    }
    $result = mysqli_query($conn,"SELECT DISTINCT rst.id FROM restaurant AS rst JOIN restaurant_tagmap AS rstmap ON rst.id=rstmap.restaurant_id WHERE {$category_sql} {$richness_sql} AND rst.method={$method} ORDER BY RAND() LIMIT 1");
    $id = (mysqli_num_rows($result) == 0)?(0):mysqli_fetch_assoc($result)['id'];
    echo $id;
    return new restaurant($id);
}
