<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   $getShipmentProviders = $trendyol->getShipmentProviders();//kargo firmalarının isimleri ve id'leri

    $array = json_decode($getShipmentProviders, true);
    for($i = 0; $i < count($array); $i++){
      
      echo($array[$i]['name'] . " " . $array[$i]['id'] . "</br>");
    }
    
