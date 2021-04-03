<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();
   
   $status = "Delivered";//Created,Invoiced,Picking,Shipped,Delivered,Returned,UnDelivered
   $size = 100; //max 200
   $startDate = null; //bu tarihten sonraki, milisecond, long
   $endDate = null; //bu tarihe kadar olan, milisecond, long
   $orderByField = "PackageLastModifiedDate";//CreatedDate
   $orderByDirection = "DESC"; //ASC


   $getShipmentPackages = $trendyol->getShipmentPackages($status, $size, $startDate, $endDate, $orderByField, $orderByDirection);

   $getShipmentPackagesArr = json_decode($getShipmentPackages);

   print_r ($getShipmentPackagesArr);//tablo olarak erişmeye çalış