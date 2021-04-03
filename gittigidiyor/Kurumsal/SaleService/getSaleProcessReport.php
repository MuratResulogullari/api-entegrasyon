<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->getSaleProcessReport("01/02/2020 00:00:00","29/02/2020 23:59:00",1,20);
      print_r ($deneme);