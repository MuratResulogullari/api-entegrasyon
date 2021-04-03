<?php

include "../client.php";
$client=new ggClient();
$result=$client->createApplication("ASzvDFJ42mPRXphqtmPY",
"test.cevizsoft",
"Pazaryeri Entegrasyonu",
"I",
"W",
"");
print_r($result);

//Bu metot, GittiGidiyor kullanıcısının kendisini "geliştirici (developer)" olarak sisteme kaydettirmesinin ardından, kullanıcının sistem üzerinde kendi oluşturacağı uygulamaları tanımlayabilmesi için kullanılır. Bir geliştirici birden çok uygulama tanımlayabilir.

?>