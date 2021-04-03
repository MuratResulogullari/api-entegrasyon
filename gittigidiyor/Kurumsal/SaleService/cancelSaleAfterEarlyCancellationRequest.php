<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->cancelSaleAfterEarlyCancellationRequest('SC106899371');
     //Bu metot kargolama aşamasında olan ve alıcılar tarafından iptal talep edilen işlemlere iptal onayı vermek için kullanılır.
     print_r ($deneme);
?>