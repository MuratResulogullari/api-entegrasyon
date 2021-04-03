<?php
include "../../client.php";
$client=new ggClient();
$deneme = $client->getCategoryVariantSpecs("fma");
//Bir kategoriye ait olan seçenekli ürün özellik bilgilerini döner. Ürün girişinin yapılacağı en alt kategoriye ait özellik bilgilerinin bu metot ile edinilmesi gerekmektedir.
print_r($deneme);




?>