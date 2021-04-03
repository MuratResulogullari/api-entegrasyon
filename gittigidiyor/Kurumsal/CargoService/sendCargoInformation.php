<?php
include "../../client.php";
$client=new ggClient();
//İlgili satış kodu girildikten sonra, satış bilgisine kargo bilgisi eklemek için kullanılır. Bu metot satıcılar tarafından kullanılır.
$deneme = $client->sendCargoInformation(314740020001,12345,"mng","Türkiye","www.mngcargo.com","S"); // salecode satış yapıldığı zaman aktif olucaktır.değer şimdiliktir.
 print_r ($deneme);
?>