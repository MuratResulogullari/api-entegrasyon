<?php
/*Ürün Yönetimi sayfasında, Satılmayanlar başlığı altında yer alan bilgilere ulaşmak için kullanılır. 
Bu metot sayesinde satılmayan ürünlerin; ürün numarası, başlığı, ürün linki, bitiş tarihi gibi bilgilerine ulaşılır.*/
include "../../client.php";
$client=new ggClient();
$deneme = $client->getUnsoldItems(0,5,true);
 print_r ($deneme);
?>