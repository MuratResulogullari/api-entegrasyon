<?php
//Ürün açıklamasının kontrolü için kullanılır. Girilen ürün yada stok numarasına kayıtlı olan ürünün açıklama bilgilerini verir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getProductDescription(588289182);
 print_r ($deneme);



?>