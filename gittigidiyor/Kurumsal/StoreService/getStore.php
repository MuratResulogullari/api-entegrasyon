<?php

include "../../client.php";
$client=new ggClient();
$deneme = $client->getStore();
//Bu metot, mağaza tipi ve başlangıç/bitiş tarihleri gibi bilgilere ulaşmak için kullanılır.
 print_r ($deneme);



?>