<?php
//Seçilen konuşmayı, ilgili kullanıcı için silen servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->deleteConversation(5);
 print_r ($deneme);



?>