<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->getPagedSales(1,10,true,'A','O','A');
      //Satıcı konumundaki kullanıcı bu servis aracılığı ile GittiGidiyor Bana Özel sayfasında yer alan "Sattıklarım" bölümünde sunulan bilgilerin tamamını elde edebilir, bilgileri filtreleyebilir ve sıralayabilir.
     print_r ($deneme);
?>