<?php
//Product id alanında belirtmiş olduğunuz ürünün ürün stok takip kodunu günceller. Itemıd alanında verilen yeni bilgi ürünün yeni stok takip kodu olacaktır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->updateItemId(588289182);
 print_r ($deneme);



?>