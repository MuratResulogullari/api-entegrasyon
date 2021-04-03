<?php
//Daha önce oluşturulmuş bir konuşmaya, yeni bir mesaj eklenmesi için çağrılan servistir.
include "../../client.php";
$client=new ggClient();
$deneme = $client->putMessage(5);
 print_r ($deneme);



?>