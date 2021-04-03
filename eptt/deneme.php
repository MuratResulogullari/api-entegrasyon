<!DOCTYPE html> 
<html> 
	
<head> 
	<title> 
		Ürün Ekleme
	</title> 

</head> 

<body style="text-align:center;"> 
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<h1 style="color:green;"> 
		Ürün Ekleme 
	</h1> 
    


	
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
    Ürün ID: <input name="sUrunId"/><br>
    Mağaza ID: <input name="sShopId"/><br>
    Barkod Numarası: <input name="sbarkod"/><br>
    Ürün Adı: <input name="sUrunAdi"/><br>
    Ana Kategori ID: <input name="sAnaId"/><br>
    Alt Kategori ID: <input name="sSubId"/><br>
    Tag: <input name="sTag"/><br>
    Kdvsiz Fiyatı: <input name="sKdvsiz"/><br>
    Açıklama: <input name="sAciklama"/><br>
    Resim Linki: <input name="sResim"/><br>
    Desi: <input name="sDesi"/><br>
    
    
    Uzun Açıklama : <input name="sUzunAciklama"/><br>
    Miktar: <input name="sMiktar"/><br>
    KDV li Fiyatı: <input name="sKDVli"/><br>
    KDV Oranı: <input name="sKDVOran"/><br>
    Iskonto: <input name="sIskonto"/><br>
    Mevcut(1 veya 0): <input name="sMevcut"/><br>
    Agğırlık: <input name="sAgirlik"/><br>
    Boy X : <input name="sBoyX"/><br>
    Boy Y: <input name="sBoyY"/><br>
    Boy Z: <input name="sBoyZ"/><br>
    Resim 2 Url: <input name="sResim2Url"/><br>
    Resim 3 Url: <input name="sResim3Url"/><br>
    Garanti Süresi: <input name="sGarantiSuresi"/><br>
    Garanti Veren Firma: <input name="sGarantiVerenFirma"/><br>
    Ürün Kodu : <input name="sUrunKodu"/><br>


			
		<input type="submit" id ="butonid" name="button1"
				value="Ürün Ekle"/> 
		<div id="con2"> </div>
	</form> 

    <?php 
     
		
	require('epttavm-library/vendor/autoload.php');


	use Epttavm\ApiClient;
	use Epttavm\Exception\EpaException;
	use Epttavm\KayitDurum;
	use Epttavm\StokKontrolDetay;
	use Epttavm\Variants;

	

	/*$data = $a->KategoriListesi();
	echo "<pre>";
	var_dump($data);die();*/
    if(isset($_POST['button1'])) {
        error_reporting(E_ALL);
			error_reporting(-1);
			ini_set('error_reporting', E_ALL);
				require('EPTTAvmLibrary.php');
				//require('BaseDataContract.php');
			
				$EPTT = new EPTTAvm();
				$EPTT->__setOptions('deneme','deneme55',array('debug' => false,'showerrors' => true));
                $kategori= $EPTT->KategoriListesi();
				$altKategori= $EPTT->AltKategoriListesi();
       
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
         $sShopId = $_POST["sShopId"];
         $sbarkod = $_POST["sbarkod"];
         $sUrunAdi = $_POST["sUrunAdi"];
         $sAnaId = $_POST["sAnaId"];
         $sSubId = $_POST["sSubId"];
         $sTag = $_POST["sTag"];
         $sKdvsiz = $_POST["sKdvsiz"];
         $sAciklama = $_POST["sAciklama"];
         $sResim = $_POST["sResim"];
         $sDesi = $_POST["sDesi"];
//////////////////////////////////////////////////////////////////////
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
			->setShopId($sShopId)//9999
			->setBarkod($sbarkod)//'Lenovo-999'
			->setDurum(KayitDurum::YENI)
			->setUrunAdi($sUrunAdi)//'lenovo'
			->setAnaKategoriId($sAnaId)//129
			->setAltKategoriId($sSubId)//2425
			->setTag($sTag)//'test-tag'
			->setKDVsiz($sKdvsiz)//12.34
			->setAciklama($sAciklama)//'Ürün Açıklama'
			->setVariantListesi([$v1, $v2])
			->setResim1Url($sResim)//'https://lh3.googleusercontent.com/-qdwFGB4s4L0/AAAAAAAAAAI/AAAAAAAAAC0/EQxe1kOm1pI/w800-h800/photo.jpg'
			->setAktif(1)
            ->setDesi($sDesi)
            ////////////////////////////////////////////////////////////////
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
			echo "BAŞARILI!\n";
		else
			echo "İŞLEM BAŞARISIZ!\n";
	} catch (EpaException $e) {
		echo "HATA OLDU:\n".$e->getMessage();
	}


    }
?>
 <div class="container" style=" margin-top:20px;">
        <div class="row">

            <div class="col justify-content-center">
                <p>EPTT ürün ekleme</p>
                <form method="POST" action="InsertProduct.php">
                    <table border="3">
                        <tr>
                            <td><label for="yasGirsi_lb">Kategori</label></td>

                            <td>
                                <select name="categorycode" id="MainCategory">
                                    <option value="default">Select Category</option>
                                    <?php foreach ($kategori->categories->category as $item) { ?>
                                        
                                        <option  value="<?php echo $item->categoryCode ?>"><?php echo $item->categoryName ?></option>

                                    <?php } ?>
                                </select>
                            </td>


                        </tr>
                        </div>
                        </div>
                        </div>
	</body>
</head> 

</html>