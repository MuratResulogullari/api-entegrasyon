<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
        Stok Kontrol Listesi 
	</title> 
	
</head> 

<body style="text-align:center;"> 
	
	<h1 style="color:green;"> 
	Stok Kontrol Listesi 
	</h1> 
	
    <form method="post"> 
    Mağaza ID: <input name="shopID"/><br>
    Kategori ID: <input name="categoryID"/><br>
    Alt Kategori ID: <input name="subCategoryID"/><br>
    Ürün İsmi: <input name="productName"/><br>
    Barkod No: <input name="barcode"/><br>
    Aktiflik Durumu: <input name="status"/><br>
    Mevcut Durum: <input name="own"/>
		<input class ="<?php echo $class ?>" type="submit" id ="butonid" name="button1"
				value="Barkod Kontrol"/> 
		
	</form> 


	<?php
	
		if(isset($_POST['button1'])) { 
		
			error_reporting(E_ALL);
			error_reporting(-1);
			ini_set('error_reporting', E_ALL);
				require('EPTTAvmLibrary.php');
				//require('BaseDataContract.php');
			
				$EPTT = new EPTTAvm();
				$EPTT->__setOptions('deneme','deneme55',array('debug' => false,'showerrors' => true));
                $shopID = $_POST["shopID"];
                $categoryID = $_POST["categoryID"];
                $subCategoryID = $_POST["subCategoryID"];
                $productName = $_POST["productName"];
                $barcode = $_POST["barcode"];
                $status = $_POST["status"];
                $own = $_POST["own"];
				$stokKontrolListesi= $EPTT->StokKontrolListesi($shopID ,$categoryID ,$subCategoryID ,$productName = '',$barcode = '',$status = 0,$own = 0);
	            print_r($stokKontrolListesi);
                // $categoryID = 43,$subCategoryID = 1174
				
		} 
		
	?> 
    
	
	
	</body>
</head> 

</html>