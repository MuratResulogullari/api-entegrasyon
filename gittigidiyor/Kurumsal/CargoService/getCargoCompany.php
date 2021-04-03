
<?php

include "../../client.php";
$client=new ggClient();

$deneme = $client->getCargoCompany();
 print_r ($deneme);



?>