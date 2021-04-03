<?php
//Bu metod ürünlerin Aktif Satışlarım, Yeni Listelenenler, Satılanlar veya Satılmayanlar bölümlerinden hangisinde olduğu bilgisine ulaşmak için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getProductStatuses([588289182]);
 print_r ($deneme);
?>