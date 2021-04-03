<?php

include "../../client.php";
$client=new ggClient();
$deneme = $client->insertProductWithNewCargoDetail(588289182,"sdfgh",false,false);
 print_r ($deneme);



?>