<?php
        error_reporting(E_ALL);

    include "../../client.php";
    $client = new ggClient();
    $deneme = $client->getParentCategories(false, false , false);
   //Bu metot GittiGidiyor'daki tüm ana kategorilere ulaşmak için kullanılır.
    print_r($deneme); 

?>