<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->replySaleComment(587955657,'asfasfas');
      //Daha önce girilmiş olan bir yoruma cevap vermek için kullanılır.
     print_r ($deneme);
?>