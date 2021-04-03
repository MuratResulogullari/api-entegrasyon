<?php

//GittiGidiyor da "Yeni Listelenenler" bölümündeki ürünlere ulaşmak için kullanılır.

include "../../client.php";
$client=new ggClient();
$deneme = $client->getNewlyListedProductIdList(0,32,true);
 print_r ($deneme);



?>