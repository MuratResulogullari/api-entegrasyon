<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
	require('EPTTAvmLibrary.php');
	//require('BaseDataContract.php');

	$EPTT = new EPTTAvm();
	$EPTT->__setOptions('deneme','deneme55',array('debug' => false,'showerrors' => true));
	
	
	print("-------------------- KATEGORİ LİSTESİ --------------------");
	echo "<pre>";
	$kategori= $EPTT->KategoriListesi();
	print_r($kategori);
	
	//echo "<pre>";
	//var_dump($EPTT->AltKategoriListesi());
	print("-------------------- ALT KATEGORİ LİSTESİ --------------------");
	echo "<pre>";
	$altKategori= $EPTT->AltKategoriListesi();
	print_r($altKategori);

	print("----------------------- BARKOD KONTROL ------------------------");
    echo "<pre>";
	$barcode= $EPTT->BarkodKontrol(771439000000804,210520);
	print_r($barcode);
	
	print("---------------------------STOK KONTROL LİSTESİ------------------------------------------------------");
	echo "<pre>";
	$stokKontrolListesi= $EPTT->StokKontrolListesi($shopID = 0,$categoryID = 43,$subCategoryID = 1174,$productName = '',$barcode = '',$status = 0,$own = 0);
	print_r($stokKontrolListesi);
	//var_dump($EPTT->StokKontrolListesi(0,43,0));

	print("---------------------------SİPARİS KONTROL------------------------------------------------------");
    echo "<pre>";
	$date1 = new DateTime('2018-01-01 00:00:00');
    $date2 = new DateTime(); // now()
    //$result = $EPTT->SiparisKontrolListesiV2($date1, $date2, 0);
	//echo $date1->format('Y-m-d H:i:s');

	$siparisKontrolListesiV2= $EPTT->SiparisKontrolListesiV2($date1,$date2,$isActive = 0);
    print_r($siparisKontrolListesiV2);
	//print("---------------------------------------------------------------------------------");
	
	
	