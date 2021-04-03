<?php

include "../../client.php";
$client=new ggClient();
$a=$client->getCities(0,82);
//GittiGidiyor daki bütün şehir bilgilerine ulaşmak için kullanılır. Ürün ekleme işlemi sırasında ilgili şehir bilgisinin (şehir adları ve kodları) belirtilmesi gerektiği için bu bilginin gönderilmesi zorunludur.

print_r($a);

?>