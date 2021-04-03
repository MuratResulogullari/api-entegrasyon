<html lang="en">
<head>
<body>
<form action="" method="POST">
   <input type="text" id="barcode" name="barcode" value="">
   <input type="submit" name="bul" value="bul">
</form>
<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   if(isset($_POST['bul'])){
      $barcode = $_POST['barcode'];//barkoda göre ürün çekme
      $getProductsWithBarcode = $trendyol->getProductsWithBarcode($barcode);

      print_r(json_decode($getProductsWithBarcode));
   }
   

   ?>

   </body>
   </head>
   </html>