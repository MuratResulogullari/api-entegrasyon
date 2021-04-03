<?php

//Tek bir ürün ile ilgili detay bilgilere ulaşmak için kullanılır. Ürüne girilen bütün bilgilerin detayları bu method ile kontrol edilebilir.

include "../../client.php";
$client=new ggClient();
$deneme = $client->getProduct(587955657);
 print_r ($deneme);
?>