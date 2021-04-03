<?php
include "../../client.php";
$client=new ggClient();
$a=$client->getModifiedCategories(0,2,'');
//GittiGidiyor da yer alan bütün kategori bilgilerine ulaşmak için kullanılır. Ürün ekleme işlemi sırasında ilgili kategori bilgisinin belirtilmesi gerektiği için bu bilginin gönderilmesi zorunludur.
print_r($a);

?>