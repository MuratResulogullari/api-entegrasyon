<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
		Ürün Güncelleme
	</title> 

</head> 

<body style="text-align:center;"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<h1 style="color:green;"> 
		Ürün Güncelleme 
	</h1> 
	
    <form method="post"> 
    Barkod No: <input name="barkodNo"/>
    
		<input class ="<?php echo $class ?>" type="submit" id ="butonid" name="button2"
				value="Barkod Kontrol"/> 
	
	
      </br></br>
  
    <?php 
    
		
	require('epttavm-library/vendor/autoload.php');


	use Epttavm\ApiClient;
	use Epttavm\Exception\EpaException;
	use Epttavm\KayitDurum;
	use Epttavm\StokKontrolDetay;
	use Epttavm\Variants;

	if(isset($_POST['button2'])) { 
		
		error_reporting(E_ALL);
		error_reporting(-1);
		ini_set('error_reporting', E_ALL);
			require('EPTTAvmLibrary.php');
			//require('BaseDataContract.php');
		
			$EPTT = new EPTTAvm();
			$EPTT->__setOptions('deneme','deneme55',array('debug' => false,'showerrors' => true));
			$barkodNo = $_POST["barkodNo"];
			$barcode= $EPTT->BarkodKontrol($barkodNo,279);
			//print_r($barcode);
			//771439000000804
            //210520
            $jsonBarcode=json_encode($barcode);
           // $ab=$barcode[7];
           $decode=json_decode($jsonBarcode,true);
          //  print_r(json_decode($jsonBarcode['BoyX'],true));
            $agirlik= $decode["Agirlik"];
            //echo $agirlik;
            $boyX=$decode["BoyX"];
            $boyY=$decode["BoyY"];
            $boyZ=$decode["BoyZ"];
            $urunID=$decode["UrunId"];
            $urunAdi=$decode["UrunAdi"];
            $barkod=$decode["Barkod"];
            $urunKod=$decode["UrunKodu"];
            $subID=$decode["AltKategoriId"];
            $tag=$decode["Tag"];
            $kdvsiz=$decode["KDVsiz"];
            $aciklama=$decode["Aciklama"];
            $resim2=$decode["Resim2Stream"];
            $resim1=$decode["Resim1Stream"];
            $resim3=$decode["Resim3Stream"];
            $desi=$decode["Desi"];
            $uzunAciklama=$decode["UzunAciklama"];
            $miktar=$decode["Miktar"];
            $kdvli=$decode["KDVli"];
            $kdvOran=$decode["KDVOran"];
            $iskonto=$decode["Iskonto"];
            $mevcut=$decode["Mevcut"];
            $garantiSuresi=$decode["GarantiSuresi"];
            $garantiVerenFirma=$decode["GarantiVerenFirma"];



            
    } 
    

	/*$data = $a->KategoriListesi();
	echo "<pre>";
	var_dump($data);die();*/
    if(isset($_POST['button1'])) {
	try {

		$a = ApiClient::init('https://ws.epttavm.com:83/service.svc/service?wsdl', 'deneme', 'deneme55', ['debug'=>false]);
        $v1Deger1 = $_POST["v1Deger1"];
        $v1Deger2 = $_POST["v1Deger2"];
        $v1miktar = $_POST["v1miktar"];
        $v1barkod = $_POST["v1barkod"];
        $v1Fiyat = $_POST["v1Fiyat"];


       
		//Birinci varyant
		$v1 = Variants::create()
			->setVariant1Deger($v1Deger1)
			->setVariant2Deger( $v1Deger2)
			->setMiktar($v1miktar)
			->setVariantBarkod($v1barkod)
			->setFiyat($v1Fiyat)
			->setFiyatFarkiMi(false);
        
         $v2Deger1 = $_POST["v2Deger1"];
         $v2Deger2 = $_POST["v2Deger2"];
         $v2miktar = $_POST["v2miktar"];
         $v2barkod = $_POST["v2barkod"];
         $v2Fiyat = $_POST["v2Fiyat"];
		//İkinci varyant
		$v2 = Variants::create()
			->setVariant1Deger($v2Deger1)
			->setVariant2Deger($v2Deger2)
			->setMiktar( $v2miktar)
			->setVariantBarkod($v2barkod)
			->setFiyat($v2Fiyat)
            ->setFiyatFarkiMi(false);
            
         $sUrunId = $_POST["sUrunId"];
        
         $sbarkod = $_POST["sbarkod"];
         $sUrunAdi = $_POST["sUrunAdi"];
         $sSubId = $_POST["sSubId"];
         $sTag = $_POST["sTag"];
         $sKdvsiz = $_POST["sKdvsiz"];
         $sAciklama = $_POST["sAciklama"];
         $sResim = $_POST["sResim"];
		 $sDesi = $_POST["sDesi"];
		 
		 $UzunAciklama = $_POST["sUzunAciklama"];
         $Miktar = $_POST["sMiktar"];
         $KDVli = $_POST["sKDVli"];
         $KDVOran = $_POST["sKDVOran"];
         $Iskonto = $_POST["sIskonto"];
         $Mevcut = $_POST["sMevcut"];
         $Agirlik = $_POST["sAgirlik"];
         $BoyX = $_POST["sBoyX"];
         $BoyY = $_POST["sBoyY"];
         $BoyZ = $_POST["sBoyZ"];
         $Resim2Url = $_POST["sResim2Url"];
         $Resim3Url = $_POST["sResim3Url"];
         $GarantiSuresi = $_POST["sGarantiSuresi"];
         $GarantiVerenFirma = $_POST["sGarantiVerenFirma"];
         $UrunKodu=$_POST["sUrunKodu"];
         
		//Stok Detay
		$s = StokKontrolDetay::create()
			->setUrunId($sUrunId)//'lenovo'
			->setShopId(279)//9999
			->setBarkod($sbarkod)//'Lenovo-999'
			->setDurum(KayitDurum::MEVCUT)
			->setUrunAdi($sUrunAdi)//'lenovo'
			->setAnaKategoriId($sAnaId)//129
			->setAltKategoriId($sSubId)//2425
			->setTag($sTag)//'test-tag'
			->setKDVsiz($sKdvsiz)//12.34
			->setAciklama($sAciklama)//'Ürün Açıklama'
			->setVariantListesi([$v1, $v2])
			->setResim1Url($sResim)//'https://lh3.googleusercontent.com/-qdwFGB4s4L0/AAAAAAAAAAI/AAAAAAAAAC0/EQxe1kOm1pI/w800-h800/photo.jpg'
			->setAktif(1)
			->setDesi($sDesi)//5


			->setUzunAciklama( $UzunAciklama)
            ->setMiktar($Miktar)
            ->setKDVli($KDVli)
            ->setKDVOran($KDVOran)
            ->setIskonto($Iskonto)
            ->setMevcut($Mevcut)
            ->setAgirlik($Agirlik)
            ->setBoyX($BoyX)
            ->setBoyY($BoyY)
            ->setBoyZ($BoyZ)
            ->setResim2Url( $Resim2Url)
            ->setResim3Url($Resim3Url)
            ->setGarantiSuresi($GarantiSuresi)
            ->setGarantiVerenFirma($GarantiVerenFirma)//5
            ->setUrunKodu($UrunKodu);
            


		$res = $a->StokGuncelle($s);
		if($res)
			echo "Ürün Güncelleme Başarıyla Tamamlandı !\n";
		else
			echo "İŞLEM BAŞARISIZ!\n";
	} catch (EpaException $e) {
		echo "HATA OLDU:\n".$e->getMessage();
	}


    }
?>
    <form id = "gonderenForm" method="post">
      Variant1 Bedeni: <input name="v1Deger1"/><br>
    Variant1 Rengi: <input name="v1Deger2"/><br>
    Variant1 Miktarı: <input name="v1miktar"/><br>
    Variant1 Barkod No: <input name="v1barkod"/><br>
    Variant1 Fiyat: <input name="v1Fiyat"/><br>
    <p></p>
    Variant2 Bedeni: <input name="v2Deger1"/><br>
    Variant2 Rengi: <input name="v2Deger2"/><br>
    Variant2 Miktarı: <input name="v2miktar"/><br>
    Variant2 Barkod No: <input name="v2barkod"/><br>
    Variant2 Fiyat: <input name="v2Fiyat"/><br>
    <p></p>
    Ürün ID: <input name="sUrunId"value="<?php echo $urunID; ?>"/><br>
    Barkod Numarası: <input name="sbarkod"value="<?php echo $barkod; ?>"/><br>
    Ürün Adı: <input name="sUrunAdi"value="<?php echo $urunAdi; ?>"/><br>
    Alt Kategori ID: <input name="sSubId"value="<?php echo $subID; ?>"/><br>
    Tag: <input name="sTag"value="<?php echo $tag; ?>"/><br>
    Kdvsiz Fiyatı: <input name="sKdvsiz"value="<?php echo $kdvsiz; ?>"/><br>
    Açıklama: <input name="sAciklama"value="<?php echo $aciklama; ?>"/><br>
    Resim 1 Url: <input name="sResim"value="<?php echo $resim1; ?>"/><br>
    Desi: <input name="sDesi"value="<?php echo $desi; ?>"/><br>

	Uzun Açıklama : <input name="sUzunAciklama"value="<?php echo $uzunAciklama; ?>"/><br>
    Miktar: <input name="sMiktar"value="<?php echo $miktar; ?>"/><br>
    KDV li Fiyatı: <input name="sKDVli"value="<?php echo $KDVli; ?>"/><br>
    KDV Oranı: <input name="sKDVOran"value="<?php echo $kdvOran; ?>"/><br>
    Iskonto: <input name="sIskonto"value="<?php echo $iskonto; ?>"/><br>
    Mevcut(1 veya 0): <input name="sMevcut"value="<?php echo $mevcut; ?>"/><br>
    Ağırlık: <input name="sAgirlik"value="<?php echo $agirlik; ?>"/><br>
    Boy X : <input name="sBoyX"value="<?php echo $boyX; ?>"/><br>
    Boy Y: <input name="sBoyY"value="<?php echo $boyY; ?>"/><br>
    Boy Z: <input name="sBoyZ"value="<?php echo $boyZ; ?>"/><br>
    Resim 2 Url: <input name="sResim2Url"value="<?php echo $resim2; ?>"/><br>
    Resim 3 Url: <input name="sResim3Url"value="<?php echo $resim3; ?>"/><br>
    Garanti Süresi: <input name="sGarantiSuresi"value="<?php echo $garantiSuresi; ?>"/><br>
    Garanti Veren Firma: <input name="sGarantiVerenFirma"value="<?php echo $garantiVerenFirma; ?>"/><br>
    Ürün Kodu : <input name="sUrunKodu"value="<?php echo $barkod; ?>"/><br>



    <input type="submit" id ="butonid" name="button2"
				value="Ürün Güncelle"/> 
		<div id="con2"> </div>
	</form> 

	</body>
</head> 

</html>