<?php

include "../../client.php";
$client=new ggClient();
$b=$client->getCategorySpecs("gdk");
//Tek bir kategori ile ilgili "sadece özelliklerin alınması gerektiği durumlarda" kullanılır. Bu metot, ürün ekleme işlemi sırasında girilen kategoriye ait bazı özelliklerin belirtilmesi zorunlu olduğu için önemlidir.
print_r($b);

?>