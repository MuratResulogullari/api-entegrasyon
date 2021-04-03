<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->cancelSale('54232746',1);
      //Bu metod kargolama aşamasındaki işlemleri iptal etmek için kullanılır. reasonId alanına girilebilecek değerleri getReasonsToCancelSale metodu ile öğrenebilirsiniz
     print_r ($deneme);
?>