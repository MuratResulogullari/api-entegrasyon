<?php 
/** NOT : "Created" statüsünde olan sipariş paketine "Picking" statüsü iletilmezse 
 * "Shipped" statüsüne kadar müşteri tarafında iptal edilebilir olacaktır */
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();
   $shipmentPackageId = "7340447182689";

   $status = "Created";//Created,Invoiced,Picking,Shipped,Delivered,Returned,UnDelivered
   $size = 100; //max 200
   $startDate = null; //bu tarihten sonraki, milisecond, long
   $endDate = null; //bu tarihe kadar olan, milisecond, long
   $orderByField = "PackageLastModifiedDate";//CreatedDate
   $orderByDirection = "DESC"; //ASC


   $getShipmentPackages = $trendyol->getShipmentPackages($status, $size, $startDate, $endDate, $orderByField, $orderByDirection);

   //echo ($getShipmentPackages);
  
    $decoded = json_decode($getShipmentPackages, true);
    //$decoded['content'][0]['shipmentPackageStatus']
    $shipmentPackageStatus = $decoded['content'][0]['shipmentPackageStatus']; //gelen json'a göre değişebilir, şu anda olmadığı için 0'ı tanımıyor  
  
    $shipmentPackageId = ""; //shipmentPackageID'ye nasıl yeni bir ID atayacağız?
   $updateTrackingNumber=$trendyol->updateTrackingNumber($shipmentPackageId, $shipmentPackageStatus);

   echo($updateTrackingNumber);