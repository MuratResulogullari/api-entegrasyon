

        <?php
          include("../../vendor/autoload.php");
          include("../../trendyol_entegrasyon/Api.php");
     
          $trendyol = new Trendyol();
          $getCategories = $trendyol->getCategories();//tüm kategorileri array olarak yazdırıyoruz
          $array = json_decode($getCategories, true);
        
          print_r($array);
          
        ?>
               
