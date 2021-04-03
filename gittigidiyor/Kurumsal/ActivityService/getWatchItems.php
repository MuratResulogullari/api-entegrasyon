<?php
/*Hesabım > Favorilerim başlığı altında yer alan bilgilere ulaşmak için kullanılır. 
Bu metot sayesinde favoriye eklenen ürünlerin; sayısı, ürün numarası, ürün resmi, sepet durumu, kategorisi, şu anki fiyatı, satıcı bilgisi, kalan süresi, işlem bilgisi gibi bilgilerine ulaşılır.*/
include "../../client.php";
$client=new ggClient();

$deneme = $client->getWatchItems(0,5,true);
 print_r ($deneme);



?>