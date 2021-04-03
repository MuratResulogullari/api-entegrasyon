<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->getItemBuyers('S',0,100);
      //Bu metot durum filtresi girilerek alıcılara ait toplam işlem sayılarını öğrenmek için kullanılır.
     print_r ($deneme);
?>