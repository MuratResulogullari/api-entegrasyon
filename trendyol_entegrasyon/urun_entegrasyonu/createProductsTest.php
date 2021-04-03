<!DOCTYPE html>
<html>
  <body>
    <h1><span style="color:#DC143C;text-align:center;">CREATE PRODUCT TEST</span></h1>
    <?php echo '<span style="color:#008B8B;text-align:center;">please fill the form below: </br></br></span>'; ?>

    <?php 

      include("../../vendor/autoload.php");
      include("../../trendyol_entegrasyon/Api.php");

      $trendyol = new Trendyol();

    ?>
  
    <form action="GetForm.php" method="POST">
      </br></br>KATEGORİ ID: <input type="text" name="categoryID" value="<?php echo $categoryID =$_GET['categoryID']; $categoryID; ?>" readonly>
      <!--kategori id'sini bir önceki sayfadan yani chooseCategoriesTest.php'den alıyoruz-->
      </br></br>

      <label for="foundBrand">MARKA:</label>
      <select id="foundBrand" name="foundBrand"><!--aratılan markanın bulunması-->
      <?php
     
        $brandId = 0;
        $brandName = $_GET['brands'];
        $getBrandsWithName = $trendyol->getBrandsWithName($brandName);//chooseCategoriesTest.php'den aldığımız aratılmış marka adı ile
        //markaları listeliyoruz

        $array = json_decode($getBrandsWithName, true);
        for($j=0; $j < count($array); $j++){
          echo  "<option value=\"".$array[$j]['name']."\">\"".$array[$j]['name']."\"</option>";
        }
  
      ?>
        <option name="foundBrand"></option>
      </select> 

      <!--form oluşturma-->
      </br></br>BARKOD: <input type="text" name="barcode" value="" required>
      </br></br>ÜRÜN ADI: <input type="text" name="title" value="" required>
      </br></br>MODEL KODU: <input type="text" name="productMainId" value=""  required>
      </br></br>STOK: <input type="number" step=any name="quantity" value="" required>
      </br></br>SATICI STOK KODU: <input type="text" name="stockCode" value="" required>
      </br></br>DESİ (En x Boy x Yükseklik / 3000): <input type="number" step=any name="dimensionalWeight" value="" required>
      </br></br>ÜRÜN AÇIKLAMASI: <br> <textarea name="description" rows="10" cols="30" required></textarea>
      </br></br>
      <?php

        $getCategorieAttributes = $trendyol->getCategorieAttributes($categoryID);//kategori id'sine göre kategori özelliklerini çekme

        $array = json_decode($getCategorieAttributes, true);
        for($i = 0; $i < count($array['categoryAttributes']); $i++){
          
          if (empty($array['categoryAttributes'][$i]['attributeValues'])){
            echo $array['categoryAttributes'][$i]['attribute']['name'].': <input type="text" name="'.$array['categoryAttributes'][$i]['attribute']['name'].'" value="">';
          }
          else{
            echo '<label for="attribute">'.$array['categoryAttributes'][$i]['attribute']['name'].':</label>
    
            <select name="attributeNo='.$i.'" id="attributeNo='.$i.'">';
            for($j = 0; $j < count($array['categoryAttributes'][$i]['attributeValues']); $j++){
              echo "<option value=\"".$array['categoryAttributes'][$i]['attributeValues'][$j]['name']."\">\"".$array['categoryAttributes'][$i]['attributeValues'][$j]['name']."\"</option>";
            }
          }
          
          echo '</select><br><br>';
        }
      ?>
      </br></br>PARA BİRİMİ: <input type="text" name="currencyType" value="TRY" readonly>
      </br></br>PİYASA FİYATI (PSF): <input type="number" step=any name="listPrice" value="" required>
      </br></br>SATIŞ FİYATI (TSF): <input type="number" step=any name="salePrice" value="" required>
      </br></br>
      <label for="vatRate">KDV (%):</label>

      <select name="vatRate" id="vatRate">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="8">8</option>
        <option value="18">18</option>
      </select> 
      </br></br>
      <label for="cargoCompany">KARGO FİRMASI:</label>
      <select id="cargoCompany" name="cargoCompany">
        <?php 
          //kargo firmalarını çekip listeleme
          $getShipmentProviders = $trendyol->getShipmentProviders();

          $array = json_decode($getShipmentProviders, true);
          for($i = 0; $i < count($array); $i++){
            
            echo "<option value=\"".$array[$i]['name']."\">\"".$array[$i]['name']."\"</option>";
          }

        ?>
        <option name="cargoCompany"></option>   
      </select> 
      </br></br>RESİM URL: <input type="url" name="url" value=""> 
      <input type="submit" value="Next">
      
    </form>
    
  </body>
</html>