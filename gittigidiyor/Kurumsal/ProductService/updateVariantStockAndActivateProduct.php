<?php

include "../../client.php";
$client=new ggClient();
$deneme = $client->updateVariantStockAndActivateProduct(595909387,187125819,200);
 print_r ($deneme);



?>