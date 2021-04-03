<html>
<body>
<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   $brandName =$_POST['brandname'];//bir önceki sayfadan yani urunMainTest.php'den marka adı alıyoruz

   $getBrandsWithName=$trendyol->getBrandsWithName($brandName);
   $array = json_decode($getBrandsWithName, true);

   for($i = 0; $i < count($array); $i++){
      echo $array[$i]['name'] ." ". $array[$i]['id']."</br>";

   }

   
   ?>
   </body>
   </html>