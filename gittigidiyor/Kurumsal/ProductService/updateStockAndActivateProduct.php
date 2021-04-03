<?php
/*Bu metod sadece Satınlanlar ve Satılmayanlar alanlarında bulunan ürünlerin stoğunu güncelleyerek ürünü Aktif Satışlar'a taşımak için kullanılır. 
Girilen stok ardından ürününüz otomatik olarak listelenecektir. Ürün zaten Aktif Satışlarda ise sadece stok bilgisi güncellenecektir.*/
include "../../client.php";
$client=new ggClient();
$deneme = $client->updateStockAndActivateProduct(592552733,"",200);
 print_r ($deneme);
?>