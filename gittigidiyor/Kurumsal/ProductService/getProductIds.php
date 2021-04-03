<?php
//Bu metod Aktif Satışlarım, Yeni Listelenenler, Satılanlar veya Satılmayanlar bölümlerindeki ürünlerin product id bilgisine ulaşmak için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getProductIds(0,5,["L"]);
 print_r ($deneme);



?>