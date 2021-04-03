<?php
/*Hesabım sayfasında, Durum > Sattıklarım başlığı altında yer alan bilgilere ulaşmak için kullanılır. 
Bu metot sayesinde satılan ürünlerin; ürün numarası, başlığı, ürün linki, formatı, satış fiyatı, adeti, bitiş tarihi, son işlem tarihi, durum açıklaması, kargo detayı, satış kodu, alıcının işlem sayısı gibi bilgilerine ulaşılır.*/
include "../../client.php";
$client=new ggClient();
$deneme = $client->getSoldItems(0,5,true);
 print_r ($deneme);
?>