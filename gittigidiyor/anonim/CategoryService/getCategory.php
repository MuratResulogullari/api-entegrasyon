<?php
include "../../client.php";
$client = new ggClient();



$deneme = $client->getCategorySpecs($_POST["categoryCode"], true);



$result = $deneme->specs->spec[0]->values->value;

//Tek bir kategori ile ilgili "sadece özelliklerin alınması gerektiği durumlarda" kullanılır. Bu metot, ürün ekleme işlemi sırasında girilen kategoriye ait bazı özelliklerin belirtilmesi zorunlu olduğu için önemlidir.

//print_r($deneme4->categories->category[0]);


?>
    <option value=""> Marka Seç</option>
<?php foreach($result as $item){ ?>
    
    <option value="<?php echo $item;?>"><?php echo $item;?></option>
    
<?php } ?>





<?php













    
   /* 
   for($i=0;$i<=2;$i++){
    if($i=0){
        $deneme = $client->getCategory($_POST["categoryCode"],true);
        $default = $deneme->categories->category;
        foreach($default as $item){
            return $item;
        }
        if($item == 'stdClass Object'){
            $result = $default->specs->spec[0]->values->value;
            ?>
        
            <?php foreach($result as $item){ ?>
                
                <option value="<?php echo $item;?>"><?php echo $item;?></option>
                
            <?php 
            
                }
            
            }
        break;
        }
    elseif($i=1){
        $deneme = $client->getCategory($_POST["categoryCode"],true);
        $default = $deneme->categories->category;
        foreach($default as $item){
            return $item;
        }
        if($item == 'stdClass Object'){
            $result = $default->specs->spec[0]->values->value;
            ?>
        
            <?php foreach($result as $item){ ?>
                
                <option value="<?php echo $item;?>"><?php echo $item;?></option>
                
            <?php 
            
            }
       
        }
    break;
    }
    else{
        $deneme = $client->getCategory($_POST["categoryCode"],true);
        $default = $deneme->categories->category;
        foreach($default as $item){
            return $item;
        }
        if($item == 'stdClass Object'){
            $result = $default->specs->spec[0]->values->value;
            ?>
        
            <?php foreach($result as $item){ ?>
                
                <option value="<?php echo $item;?>"><?php echo $item;?></option>
                
            <?php 
            
            }
        
        }
    break;
    }
}
?>

<?php
*/