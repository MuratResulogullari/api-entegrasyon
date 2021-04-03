<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   
   
   $updateBoxInfo=$trendyol->updateBoxInfo();
   echo($updateBoxInfo);