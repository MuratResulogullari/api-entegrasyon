<?php
//Seçilen konuşmanın, ilgili kullanıcı için okunmadı olarak işaretlenmesini sağlayan servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->markAsUnread(5);
 print_r ($deneme);



?>