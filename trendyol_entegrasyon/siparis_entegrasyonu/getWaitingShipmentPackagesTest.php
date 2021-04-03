<?php
/** 1- Awaiting statüsündeki siparişleri sadece stok kontrolleriniz için kullanabilirsiniz.
 * 2- Ödeme kontrolünden geçen siparişler artık Created statüsünde sizlere dönecektir.
 * 3- Ödeme kontrolünden geçmeyen siparişler ise Cancelled statüsünde sizlere dönecektir. 
*/
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();
   $status = "Awaiting"; //Cancelled, Created, Awaiting
   $getWaitingShipmentPackages=$trendyol->getWaitingShipmentPackages($status);

   echo($getWaitingShipmentPackages);