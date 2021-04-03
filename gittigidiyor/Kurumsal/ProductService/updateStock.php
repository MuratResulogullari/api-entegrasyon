<?php
//Stok bilgilerini güncellemek için kullanılır. Stok 0 olarak tanımlanır ise ürünün stoğu bulunmadığı için ürün kapatılır.
include "../../client.php";
$client=new ggClient();
$deneme = $client->updateStock(587953353,"",10,false);
 print_r($deneme);



?>