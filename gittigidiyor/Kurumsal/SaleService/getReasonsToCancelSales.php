<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->getReasonsToCancelSales(20,"test ürünü");
     //Bu method ile satış iptali gerçekleştirirken kullanabileceğiniz iptal sebeplerini öğrenebilirsiniz.
     print_r ($deneme);
?>