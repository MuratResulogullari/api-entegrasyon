<?php
/*Satıştaki veya yeni listelenmiş varyantlı ürünlerin stok bilgilerini güncellemek için kullanılır. 
Ürünün tek varyantı kalır ve kalan varyant için stok 0 olarak tanımlanır ise ürünün stoğu bulunmadığı için ürün kapatılır.*/
include "../../client.php";
$client=new ggClient();
$deneme = $client->updateVariantStock(587955657,186424238,200);
 print_r ($deneme);



?>