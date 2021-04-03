<?php
//Birden fazla ürün ile ilgili detay bilgilere ulaşmak için kullanılır. Ürünlere girilen bütün bilgilerin detayları bu method ile kontrol edilebilir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getProductsByIds([588289182]);
 print_r ($deneme);



?>