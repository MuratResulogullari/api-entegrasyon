<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
    Siparis Kontrol Listesi
	</title> 
	
</head> 

<body style="text-align:center;"> 
	
	<h1 style="color:green;"> 
    Siparis Kontrol Listesi 
	</h1> 
	
	<form method="post"> 
		<input class ="<?php echo $class ?>" type="submit" id ="butonid" name="button1"
				value=" Siparis Kontrol Listesi"/> 
		
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

				$date1 = new DateTime('2018-01-01 00:00:00');
                $date2 = new DateTime(); // now()
                $siparisKontrolListesiV2= $EPTT->SiparisKontrolListesiV2($date1,$date2,$isActive = 0);
				print_r($siparisKontrolListesiV2);
		} 
		
		
	?> 
	
	
	</body>
</head> 

</html>