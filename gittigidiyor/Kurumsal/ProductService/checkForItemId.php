<?php
//Stok kodunun (Satıcı Ürün Takip Kodu) daha önce kullanılıp kullanılmadığını sorgulamak için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->checkForItemId(588289182); //itemıd yada productıd
 print_r ($deneme);
?>