<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->remindForApproval("SC106899371");
     /* Bu method ile kargolanan ürüne onay hatırlatması yapılabilir. Kargo bilgisini girdiğiniz tarihten itibaren 3 iş günü içinde alıcı gönderilen ürüne onay vermezse onay hatırlatması yapılabilir. Kullanıcıya onay hatırlatarak son 24 saat hakkı tanınır. Eğer bu 24 saatlik dilim içerisinde de onay verilmezse GittiGidiyor ürüne otomatik onay verir, para ise bir sonraki iş günü içinde satıcıya yatırılır. Onay hatırlatmak için satışın onay bekleyenler durumunda olması gerekmektedir.
      */
     print_r ($deneme);
?>