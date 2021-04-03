<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->getSalesByDateRange(true,'R','','P','A','01/03/2020 00:00:00','07/04/2020 23:59:00',1,1);
      //Bu metod belirtilen tarihler arasındaki ve belirtilen durumdaki satışları görüntülemek için kullanılır.
     print_r ($deneme);
?>