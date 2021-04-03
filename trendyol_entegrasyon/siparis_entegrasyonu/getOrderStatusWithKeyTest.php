<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   $key = "UnDelivered";
   $getOrderStatusWithKey = $trendyol->getOrderStatusWithKey($key);

   var_dump($getOrderStatusWithKey);