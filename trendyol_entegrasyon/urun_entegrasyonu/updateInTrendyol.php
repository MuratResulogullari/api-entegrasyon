
<?php 

    include('../../vendor/autoload.php');
    include('../../trendyol_entegrasyon/Api.php');

    //bu sınıfta sadece güncellenecek ürünü akıp trendyol'a yolluyoruz ki orada da güncellenebilsin.
        $trendyol = new Trendyol(); 

        $barcodeGet= $_POST['barcode'];//barkodu çektik
        $brand = $_POST['brand'];//markayı çektik
        $cargoCompany= $_POST['cargoCompany'];//kargo firmasının adını çektik
        $attributes;

        $getProductsWithBarcode = $trendyol->getProductsWithBarcode($barcodeGet);//çektiğimiz barkod ile ürünü bulduk
        $array = json_decode($getProductsWithBarcode, true);

        for($i = 0; $i < count( $array['content'][0]['attributes']); $i++){//ürünün tüm özelliklerini çekip attributes array'ine atadık
            $attributes[$i]['attributeId']=$array['content'][0]['attributes'][$i]['attributeId'];

            if(count($array['content'][0]['attributes'][$i])!=4){
                $attributes[$i]['customAttributeValue']=$array['content'][0]['attributes'][$i]['attributeValue'];//kullanıcıya özel
            }
            else{
                $attributes[$i]['attributeValueId']=$array['content'][0]['attributes'][$i]['attributeValueId'];//seçmeli
            }

        }
       
        $cargoCompanyId =0;
        $getShipmentProviders = $trendyol->getShipmentProviders();
        $array = json_decode($getShipmentProviders, true);
        for($i = 0; $i < count($array); $i++){
            if(strpos($array[$i]['name'],$cargoCompany)!==false){//kargo adına göre karşılaştırma yaparak kargo id'sini çektik
                $cargoCompanyId =  $array[$i]['id'];
                break;
            }
            
        }
        

        $getBrandsWithName = $trendyol->getBrandsWithName($brand);
        $array = json_decode($getBrandsWithName, true);
        $brandId =0;
        for($i=0; $i < count($array); $i++){
          
          if(strpos($array[$i]['name'],$brand)!==false){//marka adına göre karşılaştırma yaparak marka id'sini çektik
            $brandId =  $array[$i]['id'];
            break;
          }
        }

        $updatedArray = array (
        'items' => 
        array (
          0 => 
          array (
            'barcode' => $_POST['barcode'],
            'title' => $_POST['title'],
            'productMainId' => $_POST['productMainId'],
            'brandId' => $brandId,
            'categoryId' => $_POST['kategori'],
            'stockCode' => $_POST['stockCode'],
            'dimensionalWeight' => $_POST['dimensionalWeight'],
            'description' => $_POST['description'],
            'vatRate' => $_POST['vatRate'],
            'cargoCompanyId' => $cargoCompanyId,
            'images' => 
            array (
              0 => 
              array (
                'url' => $_POST['url'],
              ),
            ),
            'attributes' => $attributes
            
          ),
        ),
        );//güncellenmiş ürünün tüm elemanlarını bir arraye atadık

        $JSON_en=json_encode($updatedArray, JSON_UNESCAPED_UNICODE);

        print_r($updatedArray);

        $updateProduct = $trendyol->updateProduct($JSON_en, 'update');//güncelleme yapması için trendyola gönderdik
        $batchID = $updateProduct;
        echo $batchID;//batchID yaptığımız request'in id'si. bu id'yi kullanarak aşağıda olduğu gibi güncelleme isteği gönderdiğimiz ürünleri
        //görebiliyoruz
        $batchID = json_decode($batchID,true);  
        $newBatchID = $batchID['batchRequestId'];   

        $getProductsWithBatchRequest = $trendyol->getProductsWithBatchRequest($newBatchID);
        echo($getProductsWithBatchRequest);
        

?>
