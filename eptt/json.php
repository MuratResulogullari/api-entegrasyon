<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
        Barkod Kontrol 
	</title> 
	
</head> 
 
<body style="text-align:center;" > 
	
	<h1 style="color:green;"> 
		Barkod Kontrol 
	</h1> 

	<table  cellpadding="5" cellspacing="5"  padding="15" align="center">
    <form method="post" > 
	<tr>
    <td>Barkod No: <input name="barkodno"/><br></td>
	</tr>
	
	<tr>
	<td><input class ="<?php echo $class ?>" type="submit" id ="butonid" name="button1" value="Barkod Kontrol"/></td>
	</tr>
	</form> 
    </table>

	<?php
	
		if(isset($_POST['button1'])) { 
		
			error_reporting(E_ALL);
			error_reporting(-1);
			ini_set('error_reporting', E_ALL);
				require('EPTTAvmLibrary.php');
				//require('BaseDataContract.php');
			
				$EPTT = new EPTTAvm();
				$EPTT->__setOptions('deneme','deneme55',array('debug' => false,'showerrors' => true));
                $barkodno = $_POST["barkodno"];
				$barcode= $EPTT->BarkodKontrol($barkodno,279);
                print_r($barcode);
                //771439000000804
                //210520
                
                
		} 
		
	?> 
    
	
	
	</body>
</head> 

</html>