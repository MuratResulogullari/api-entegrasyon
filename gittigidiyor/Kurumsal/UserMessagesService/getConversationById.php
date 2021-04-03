<?php
//Tek bir konuşmanın detaylarını getiren servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getConversationById(5);
 print_r ($deneme);



?>