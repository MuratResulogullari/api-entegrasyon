<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
		Kategori Listesi
	</title> 

</head> 

<body style="text-align:center;"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<h1 style="color:green;"> 
		Kategori Listesi 
	</h1> 
	



	
	<form id = "gonderenForm" method="post"> 
		<input type="submit" id ="butonid" name="button1"
				value="Kategori Listesi Göster"/> 
		<div id="con2"> </div>
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

			//	$kategori= $EPTT->KategoriListesi();
			//	$a=json_encode($kategori);
			//	print_r($a);
				$cate= $EPTT->GetCategoryTree(6);
				$b=json_encode($cate);
              //  $dizi = array($b['Category']);
               // $c = json_encode($b(0));
             //   $dizi2 = json_decode($dizi);
                $d = array();
             $c = json_decode($b,true);
           //  $d = array($c['name']);
             foreach ($c as $i){ 
                $d = $i;
              } 
			   // var_dump(json_decode($b["Category"]));
                
               
               var_dump($d[5]['name']);
		} 
		
	?> 



	</body>
</head> 

</html>