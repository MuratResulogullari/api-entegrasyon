<?php
//Ürün özellikleri bilgilerini almak için erişilir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getProductSpecs(588289182);
 print_r ($deneme);



?>