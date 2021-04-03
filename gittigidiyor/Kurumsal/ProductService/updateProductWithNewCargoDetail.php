<?php
//Satıştaki veya yeni listelenmiş ürünleri güncellemek için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->updateProductWithNewCargoDetail(598344340,"Zümrüt",false,false,false);
 print_r ($deneme);



?>