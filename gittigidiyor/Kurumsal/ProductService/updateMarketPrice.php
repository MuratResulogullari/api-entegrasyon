<?php
/*Bu metod üstü çizili fiyat ve indirim bilgisi göstermek için kullanılır. 
Güncelleme sonrası ürün fiyatı ürün sayfasında aşağıdaki formatta görüntülenecektir. marketPrice alanı ürün fiyatıyla aynı tanımlanırsa üstü çizili alan pasif hale gelecektir.
Örn:
100,00 TL
| %10 indirim
90 TL*/
include "../../client.php";
$client=new ggClient();
$deneme = $client->updateMarketPrice(598344340,150000);
 print_r ($deneme);
?>