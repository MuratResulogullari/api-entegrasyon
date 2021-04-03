<?php 

/**Geliştirme çalışmalarınızı Sipariş Paketlerini Birden Fazla Barkod İle 
 * Bölme servisine göre yapabilirsiniz.
 * Diğer servisler sene sonu itibari ile kapatılacaktır.  */
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


    $trendyol = new Trendyol();
    
    $splitMethod = "Shipment Package";
    $json_str="";
    $methodUrl = "";

    if($splitMethod == "Multi Package By Quantity"){
        $methodUrl = "split-packages";
        
    }
    else if($splitMethod == "Shipment Package"){
        $methodUrl = "split";
        
    }


    
    
    $splitPackage=$trendyol->splitPackage($methodUrl);

   echo($splitPackage);