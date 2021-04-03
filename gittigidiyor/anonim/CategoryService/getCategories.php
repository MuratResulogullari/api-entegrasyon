<?php

include "../../client.php";
$client=new ggClient();
$deneme = $client->getCategories(0,100,false,false,false);

$b=($deneme->categories);
//GittiGidiyor da yer alan bütün kategori bilgilerine ulaşmak için kullanılır. Ürün ekleme işlemi sırasında ilgili kategori bilgisinin belirtilmesi gerektiği için bu bilginin gönderilmesi zorunludur.


print_r($b);

  /* $array = json_decode($deneme, true);
   
   print_r( $array);*/
?>