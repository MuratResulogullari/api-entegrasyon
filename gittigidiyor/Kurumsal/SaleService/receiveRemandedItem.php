<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->receiveRemandedItem("SC106899371");
     //Bu metot alıcılar tarafından iade kargo bilgisi girilen işlemlere iade onayı vermek için kullanılır.
     print_r ($deneme);
?>