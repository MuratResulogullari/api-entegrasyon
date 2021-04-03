<?php

include "../../client.php";
$client=new ggClient();
$b=$client->searchCatalog(1,50,'185/55 R15 82H Weatherproof');
//Bu metot, katalog kodu veya "keyword" alanı kullanılarak ilgili kataloğa ait newCatalogId bilgilerine ulaşmak için kullanılır.
print_r($b);

?>