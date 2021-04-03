<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   $createCommonLabel=$trendyol->createCommonLabel(); //bu fonksiyona 
    


   echo($createCommonLabel);