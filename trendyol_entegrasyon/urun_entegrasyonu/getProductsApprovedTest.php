<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   $approved = true;
   $getProductsApproved = $trendyol->getFilterProductsWithApproved($approved);//onaylı ürünleri getirme  

   $array = json_decode($getProductsApproved,true);
   for($i = 0; $i < count($array['content']);$i++){
      print_r($array['content'][$i]);
      echo "\n";

   }
   //echo($getProductsApproved);