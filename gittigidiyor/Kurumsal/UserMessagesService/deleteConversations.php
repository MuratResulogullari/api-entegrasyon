<?php
//Seçilen konuşmaları, ilgili kullanıcı için silen servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->deleteConversations(5);
 print_r ($deneme);



?>