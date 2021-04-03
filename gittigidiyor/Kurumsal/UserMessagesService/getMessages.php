<?php
//Bir konuşma içerisinde bulunan mesajları getiren servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getMessages(5);
 print_r ($deneme);



?>