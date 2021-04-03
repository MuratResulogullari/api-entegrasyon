<?php

//Satıştaki ürünü erken sonlandırmak için kullanılır. İşlemin ardından kullanıcılara bilgilendirme amaçlı ürün sürelerinin bittiğine dair mail gönderilir.

include "../../client.php";
$client=new ggClient();
$deneme = $client->finishEarly([588289182]);
 print_r ($deneme);
?>