<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();
  
   
   $status = "Picking";
   $updatePackage=$trendyol->updatePackage($status); // Toplanmaya Başlandı Bildirimi, Fatura Kesme Bildirimi, Tedarik Edememe Bildirimi


   echo($updatePackage);