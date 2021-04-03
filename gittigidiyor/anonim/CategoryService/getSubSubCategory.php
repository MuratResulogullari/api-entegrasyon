<?php

include "../../client.php";
$client = new ggClient();
$deneme4 = $client->getSubCategories( $_POST["categoryCode"], false, false, false);

if($deneme4->categoryCount>0){

$result = $deneme4->categories->category;
echo'
    <option value="">Select SubCategory</option>';
     foreach($result as $item){ 
        
        echo '<option value="'. $item->categoryCode.'">'. $item->categoryName.'</option>';
        
     }
}


    



