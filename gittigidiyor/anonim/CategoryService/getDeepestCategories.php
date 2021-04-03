<?php

include "../../client.php";
$client=new ggClient();
$deneme=$client->getDeepestCategories(2,1,true);
//GittiGidiyorda yer alan bütün alt kategori bilgilerine ulaşmak için kullanılır.
print_r($deneme);

?>