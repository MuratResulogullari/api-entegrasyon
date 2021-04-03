<?php
//Konuşma sayısını getiren servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->getConversationsCount(5);
 print_r ($deneme);



?>