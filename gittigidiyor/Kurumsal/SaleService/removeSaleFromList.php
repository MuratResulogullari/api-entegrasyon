<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->removeSaleFromList('SC90209363','B');
     //Bu metod Hesabım > Satın Aldıklarım veya Sattıklarım alanında yer alan işlemleri listeden kaldırmak için kullanılır.
     print_r ($deneme);
?>