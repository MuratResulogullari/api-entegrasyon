<?php
//GittiGidiyor, Hesabım/Ürün Yönetimi sayfasında yer alan: Aktif Satışlarım, Yeni Listelenenler, Satılanlar, Satılmayanlar bölümündeki ürün bilgilerine ulaşmak için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getProducts(0 ,10,'L',false);
 print_r ($deneme);

//588289182
 
?>