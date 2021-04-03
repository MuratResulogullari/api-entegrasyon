<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->giveApprovalForRemandedItem('SC106899371');
     //Bu metot alıcılar tarafından sorun bildirilen işlemlere iade onayı vermek için kullanılır.
     print_r ($deneme);
?>