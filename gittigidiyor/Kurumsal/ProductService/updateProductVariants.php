<?php
//Bu metod ürünün varyant bilgilerini güncellemek için kullanılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->updateProductVariants("598344340","","U");
 print_r ($deneme);



?>