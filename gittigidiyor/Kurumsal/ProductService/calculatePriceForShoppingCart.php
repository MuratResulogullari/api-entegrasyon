<?php

//Bu metot, Listelemeye Hazır Ürünler alanında bulunan ürünleri Aktif Satışlar'a almak için kullanılır.

include "../../client.php";
$client=new ggClient();
$deneme = $client->calculatePriceForShoppingCart(array('588289182'),null); // dönen hata kredikartı bilgisi tam olarak girilmediğinden dolayı.
 print_r ($deneme);
?>