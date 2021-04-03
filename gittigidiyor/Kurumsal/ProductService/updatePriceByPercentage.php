<?php
//Ürün fiyat bilgilerini yüzdesel olarak güncellemek için kullanılır.Bilgisi girilen ürünün toplam fiyatı üzerinden hesaplama yapılacaktır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->updatePriceByPercentage(588289182,'+',50);
 print_r ($deneme);



?>