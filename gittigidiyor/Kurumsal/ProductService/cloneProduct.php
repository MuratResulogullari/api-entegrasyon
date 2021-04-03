<?php

//Ürün kopyasını almak için kullanılır.

include "../../client.php";
$client=new ggClient();

$deneme = $client->cloneProduct(588289182);
 print_r ($deneme);



?>