<?php
/*Satılmamış ürünleri tekrar satışa çıkartmak için kullanılır. 
Satışmamış ürünler dışında sisteme yeni eklenen ancak henüz satışa açılmamış ücretsiz ilanların satışa açılması içinde kullanılabilir.*/
include "../../client.php";
$client=new ggClient();
$deneme = $client->relistProducts([599135363]);
 print_r ($deneme);



?>