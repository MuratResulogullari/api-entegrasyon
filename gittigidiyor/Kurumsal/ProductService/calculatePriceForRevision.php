<?php

include "../../client.php";
$client=new ggClient();

$deneme = $client->calculatePriceForRevision('592463716', '2927');
 print_r ($deneme);



?>