<?php
//Seçilen konuşmanın, ilgili kullanıcı için okundu olarak işaretlenmesini sağlayan servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->markAsRead(5);
 print_r ($deneme);



?>