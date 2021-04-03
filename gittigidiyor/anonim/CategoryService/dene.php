<?php

include "../../client.php";


$client = new ggClient();

//$categoryCode = $_POST["categoryCode"];

$deneme4 = $client->getSubCategories( "a", false, false, false);




$result = $deneme4->categories->category;



//print_r($deneme4->categories->category[0]);


?>
    <option value=""> SubCategory</option>
<?php foreach($result as $item){ ?>
    
    <option value="<?php echo $item->categoryCode;?>"><?php echo $item->categoryName;?></option>
    
<?php } ?>


    



