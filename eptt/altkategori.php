<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
		
	</title> 
	
</head> 

<body style="text-align:center;"> 
	
	<?php
	
		
		
			error_reporting(E_ALL);
			error_reporting(-1);
			ini_set('error_reporting', E_ALL);
				require('EPTTAvmLibrary.php');
				//require('BaseDataContract.php');
			
				$EPTT = new EPTTAvm();
				$EPTT->__setOptions('deneme','deneme55',array('debug' => false,'showerrors' => true));

				$altKategori= $EPTT->AltKategoriListesi();
				print_r($altKategori);
				//$getCategories= $EPTT->GetCategoryTree(0);
               //   $GLOBALS['ParentCategories']=current($getCategories);
		
				//  print_r(json_encode($ParentCategories));
		
		
		
	?> 
	
	
	</body>
</head> 

</html>