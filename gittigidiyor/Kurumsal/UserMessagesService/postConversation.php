<?php
/*İki kişi arasında yeni bir sohbet başlatılmak istendiğinde kullanılan servistir. 
Belirtilen iki kişi, sonsuz sayıda aynı konu başlığı altında mesajlaşabilir ve bir konuşma en az bir tane mesaj içerir.*/
include "../../client.php";
$client=new ggClient();
$deneme = $client->postConversation(5);
 print_r ($deneme);



?>