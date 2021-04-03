<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();
   //markaları çekme
   $getBrands=$trendyol->getBrands();//fonksiyonun içine sayısal değer de girilebiliyor. 100 A ile 
   //başlayan markaları, 200 B ile başlayanları, 300 C ile başlayanları getiriyor ve bu böyle devam ediyor.
   $array = json_decode($getBrands, true);
   
   for($i = 0; $i < count($array['brands']); $i++){
      echo $i ."\t";
      echo $array['brands'][$i]['name'] . " " . $array['brands'][$i]['id'] . "</br>";

    }
