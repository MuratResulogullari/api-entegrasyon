<?php
//Bu method ile belirtmiş olduğunuz satış koduna dair sözleşmeli kargolarınıza talep gönderebilirsiniz.
include "../../client.php";
$client=new ggClient();
$shippingFirmId=$client->getCargoCompany();
$deneme = $client->createShippingRequest(6901443257119,$shippingFirmId);// salecode satış yapıldığı zaman aktif olucaktır.değer şimdiliktir.
 print_r ($deneme);
?>