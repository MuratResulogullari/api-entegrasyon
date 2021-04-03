<?php
//Bu metod üründe yer alan varyantlar ile ilgili detay bilgilere ulaşmak için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getProductVariants(598344340);
 print_r ($deneme);



?>