<?php
//Kullanıcının bulunduğu tüm konuşmaları getiren servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getConversations(5);
 print_r ($deneme);



?>