<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
		Alt Kategori Listesi
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
                //$a= $EPTT->GetMainCategories();
                //$a= $EPTT->GetCategory(5);
				$a= $EPTT->GetCategoryTree(5);
				//$b=json_encode($a);
	            print_r($a);
		
				
		
		
		
	?> 
	
	
	</body>
</head> 

</html>