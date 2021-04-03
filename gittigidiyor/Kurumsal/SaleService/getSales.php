<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->getSales(0,5,false,'R','A','C','A');
      print_r ($deneme);