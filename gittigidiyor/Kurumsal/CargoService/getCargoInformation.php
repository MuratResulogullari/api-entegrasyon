
<?php
//Bu metot, satış kodunu girdikten sonra mevcut satışın kargo bilgisini girmek için kullanılır.
include "../../client.php";
$client=new ggClient();

$deneme = $client->getCargoInformation(6901443257119); // salecode satış yapıldığı zaman aktif olucaktır.değer şimdiliktir.
 print_r ($deneme);



?>