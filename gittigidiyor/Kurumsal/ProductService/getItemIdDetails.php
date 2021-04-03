<?php
//Bu metot ürünlere ait stok kodunun (Satıcı Ürün Takip Kodu) detaylarına ulaşmak için kullanılır. Metot sadece stok kodu olan ürünler için detay döner.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getProduct(598876311);
 print_r ($deneme);



?>