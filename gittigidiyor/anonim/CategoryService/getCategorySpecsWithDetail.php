<?php
include "../../client.php";
$client=new ggClient();
$b=$client->getCategorySpecsWithDetail("ebec");
//Bir kategoriye ait olan ürün özellik bilgilerini ve ürün girişi sırasında kullanılacak özelliklere ait spec değerlerini döner.
print_r($b);

?>