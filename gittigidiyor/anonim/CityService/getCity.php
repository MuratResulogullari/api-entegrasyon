<?php

include "../../client.php";
$client=new ggClient();
$c=$client->deleteApplication("ASzvDFJ42mPRXphqtmPY");
//Bu metot, sadece tek bir şehir hakkında veriye ulaşılmak istendiğinde kullanılır. Ürün ekleme işlemi sırasında ilgili şehir bilgisinin girilmesi gerektiği için bu bilginin gönderilmesi zorunludur.
print_r($c);

?>