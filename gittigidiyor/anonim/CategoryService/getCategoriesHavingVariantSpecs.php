<?php

include "../../client.php";


$client = new ggClient();


$deneme = $client->getCategoriesHavingVariantSpecs();
//Seçenekli ürün girişi yapabileceğiniz en alt kategori bilgilerini döner. Sistemde her kategoriye ait seçenekli ürün özellik bilgisi olmadığı için sadece bu metottan dönen kategorilere ürün girişi yapılabilir.
$default = $deneme->categories->category;



foreach($default as $item){
   if($item->categoryCode == $_POST["categoryCode"]){
 
 ?>
    <option value="<?php echo $item->categoryCode;?>"><?php echo $item->categoryName;?></option>
        


    <?php

   }   
}



?> 
