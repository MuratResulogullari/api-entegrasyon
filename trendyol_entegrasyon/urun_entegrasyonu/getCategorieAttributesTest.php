

<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   
   $categoryId = 3629;//kategori id'sine göre kategori özelliklerini form olarak listeliyoruz
    $getCategorieAttributes = $trendyol->getCategorieAttributes($categoryId);

    $arrayAttributes = json_decode($getCategorieAttributes, true);

    for($i = 0; $i < count($arrayAttributes['categoryAttributes']); $i++){

      if (empty($arrayAttributes['categoryAttributes'][$i]['attributeValues'])){
       // echo $arrayAttributes['categoryAttributes'][$i]['attribute']['name'].": <input type='text' name='".$arrayAttributes['categoryAttributes'][$i]['attribute']['name']."' value=''>";

      }
      else{
       // echo "<label for='attribute'>".$arrayAttributes['categoryAttributes'][$i]['attribute']['name'].":</label>
        
        //<select name='attributeNo=".$i."' id='attributeNo=".$i."'>";
        for($j = 0; $j < count($arrayAttributes['categoryAttributes'][$i]['attributeValues']); $j++){
         // echo "<option value=\"".$arrayAttributes['categoryAttributes'][$i]['attributeValues'][$j]['name']."\">\"".$arrayAttributes['categoryAttributes'][$i]['attributeValues'][$j]['name']."\"</option>";
          
        }
        //echo "</select><br><br>";
      }
      
      
    }
    
    
    
  print_r($arrayAttributes);
?>
