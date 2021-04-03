<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   $getSuppliersAdress = $trendyol->getSuppliersAdress();//sağlayıcının adreslerini çekme
   $array=json_decode($getSuppliersAdress,true);

   for($i = 0; $i<count($array['supplierAddresses']); $i++){
      echo $array['supplierAddresses'][$i]['fullAddress'];
      echo "\nKargolama adresi olma durumu: " . $array['supplierAddresses'][$i]['shipmentAddress'];
      echo "\nİade adresi olma durumu: " . $array['supplierAddresses'][$i]['returningAddress'];
      echo "\nFatura adresi durumu: " . $array['supplierAddresses'][$i]['invoiceAddress'];

   }

   //echo($getSuppliersAdress);