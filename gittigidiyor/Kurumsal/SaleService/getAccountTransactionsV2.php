<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->getAccountTransactionsV2('2020-08-29','2020-09-3',0,20); // tamamlananlar
     /*Bu metot banka hesabınıza gerçekleşen veya gerçekleşecek olan para transferleri hareketlerine ulaşmak için kullanılır.

Hesap Hareketlerim > Satış Raporlarım > Tamamlanan Satış Hareketleri alanındaki bilgiler dönmektedir. (Bkz: https://www.gittigidiyor.com/BanaOzel/hesaplarim.php)*/ 
     print_r ($deneme);
?>