<?php
//Ürün fiyat bilgilerini güncellemek için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->updatePrice($_POST['productId']," ",$_POST['price'],false);
$updateMarketPrice = $client->updateMarketPrice($_POST['productId'],$_POST['marketPrice']);
$updatePriceByPercentage = $client->updatePriceByPercentage($_POST['productId']," ",$_POST['operatorType'],$_POST['percentAge']);
 print_r ($updatePriceByPercentage);



?>