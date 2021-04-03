<?php
include "../../client.php";
$client=new ggClient();
$deneme = $client->getRequiredCategorySpecs("ebec");
/*Katalog yapısına sahip kategoriler için ürün girişi yaparken "newCatalogId" girişi zorunlu kılınmıştır. Bu metot listeleme yapılmak istenen kategoride "newCatalogId" girişinin zorunlu olup olmadığı bilgisine ulaşmak için kullanılır.

"newCatalogId" zorunluluğu öğrenildikten sonra Catalog Service > searchCatalog metodu kullanılarak "newCatalogId" bilgisine ulaşılabilir.*/ 
print_r($deneme);




?>