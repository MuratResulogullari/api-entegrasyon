<?php
//Ürün yada stok numarası girilen ürünlerin fiyat ve stok bilgilerinin alınması için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getStockAndPrice([598876311]);
 print_r ($deneme);



?>