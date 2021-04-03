<html lang="en">
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
    <ol>
        <?php
        //oluşturulan ürünü tablo halinde listeliyoruz
        include("../../vendor/autoload.php");
        include("../../trendyol_entegrasyon/Api.php");
        $trendyol = new Trendyol();

        //seçilen marka adına göre marka id'sini bulma
        $brandName = $_POST['foundBrand'];
        $getBrandsWithName = $trendyol->getBrandsWithName($brandName);
        $array = json_decode($getBrandsWithName, true);
        $brandId =0;
        for($i=0; $i < count($array); $i++){
          
          if(strpos($array[$i]['name'],$brandName)!==false){
            $brandId =  $array[$i]['id'];
            break;
          }
        }
        
        //seçilen kargo firmasının adına göre id'sini bulma
        $cargoCompany = $_POST['cargoCompany'];
        $cargoCompanyId =0;
        $getShipmentProviders = $trendyol->getShipmentProviders();
        $array = json_decode($getShipmentProviders, true);
        for($i = 0; $i < count($array); $i++){
            if(strpos($array[$i]['name'],$cargoCompany)!==false){
                $cargoCompanyId =  $array[$i]['id'];
                break;
            }
            
        }

        //bir önceki sayfada yani createProductsTest.php'de çektiğimiz değerleri kaydediyoruz
        $barcode =  $_POST['barcode']; 
        $title =  $_POST['title']; 
        $productMainId =  $_POST['productMainId'];
        $categoryId =$_POST['categoryID'];
        $quantity = $_POST['quantity'];
        $stockCode = $_POST['stockCode'];
        $dimensionalWeight = $_POST['dimensionalWeight'];
        $description = $_POST['description'];
        $currencyType = $_POST['currencyType'];
        $listPrice = $_POST['listPrice'];
        $salePrice = $_POST['salePrice'];
        $vatRate = $_POST['vatRate'];
        $url = $_POST['url'];
        
        //kategori id'sine göre kategori özelliklerini getirme ve oluşturulan ürünün içine kaydetmek
        //için attributes arrayine atama:
        $attributes;
        $color;
        $getCategorieAttributes = $trendyol->getCategorieAttributes($categoryId);
        $array = json_decode($getCategorieAttributes, true);
        for($i = 0; $i < count($array['categoryAttributes']); $i++){
            $attributes[$i]['attributeId']= $array['categoryAttributes'][$i]['attribute']['id'];//attrbute id'sini
            //kategori özelliklerinden buluyoruz
            
            if (empty($array['categoryAttributes'][$i]['attributeValues'])){
                //eğer kullanıcının istediğini girmekte özgür olduğu bir özellikse: (renk gibi)
                $attributes[$i]['customAttributeValue'] = $_POST[$array['categoryAttributes'][$i]['attribute']['name']];
                $color=$_POST[$array['categoryAttributes'][$i]['attribute']['name']];
            }
            else{
                for($j = 0; $j < count($array['categoryAttributes'][$i]['attributeValues']); $j++){
                    $attributes[$i]['attributeValueId'] = findAttrValID($array['categoryAttributes'][$i] ,$_POST['attributeNo='.$i]);
                    //seçili özelliğin adına göre id'sin bulma

                }
            }
        }
        //print_r($attributes);
            
        function findAttrValID($attributeArray, $attributeValueName){

            for($j=0; $j<count($attributeArray['attributeValues']) ; $j++){
                if(strpos($attributeArray['attributeValues'][$j]['name'],$attributeValueName) !==false){//attribute arrayindeki isimle 
                    //seçili isim arasında karşılaştırma yapılıyor. eğer ikisi birbirine eşitse id geri döndürülüyor
                    return $attributeArray['attributeValues'][$j]['id'];
                }
                else{
                    return 0;
                }
            }
        }
    


        $json_arr = array(
            array("barcode" => $barcode,
                "title" => $title, 
                "productMainId" => $productMainId, 
                "brandId" => $brandId,
                "categoryId" => $categoryId,
                "quantity" => $quantity,
                "stockCode" => $stockCode,
                "dimensionalWeight" => $dimensionalWeight,
                "description" => $description,
                "currencyType" => $currencyType,
                "listPrice" => $listPrice,
                "salePrice" => $salePrice,
                "vatRate" => $vatRate,
                "cargoCompanyId" => $cargoCompanyId,
                "images" => array(
                    array(
                        "url" => $url
                    )
                ),
                "attributes" => $attributes
            )
        
        );
    
        $JSON['items'] = $json_arr;
        $JSON_en = json_encode($JSON);
         //838659f7-7288-49ed-a0a6-6de638371885-1600470065  
        /*$json_arr2 = array(
            array("barcode" => "3492348",
                "title" => "demo", 
                "productMainId" => "347584375", 
                "brandId" => 994331,
                "categoryId" => 3883,
                "quantity" => 1,
                "stockCode" => 409543,
                "dimensionalWeight" => 0.04,
                "description" => "demo satılmıyor",
                "currencyType" => "TRY",
                "listPrice" => 10000,
                "salePrice" => 9500,
                "vatRate" => 18,
                "cargoCompanyId" => 1,
                "images" => array(
                    array(
                        "url" =>"https://takiatolyesi.com/img/urunler/markazit-925-ayar-gumus-bileklik-24VL30vnVp.jpg"
                    )
                ),
                "attributes"  => array (
                   
                    array (
                      'attributeId' => 40,
                      'attributeValueId' => 3993,
                    ),
                   
                    array (
                      'attributeId' => 43,
                      'attributeValueId' => 405,
                    ),
                 
                    array (
                      'attributeId' => 46,
                      'attributeValueId' => 520,
                    ),
                   
                    array (
                      'attributeId' => 124,
                      'attributeValueId' => 3937,
                    ),
                 
                    array (
                      'attributeId' => 346,
                      'attributeValueId' => 4290,
                    ),
                  ) 
            )
        
        );*/
        $updateProduct = $trendyol->updateProduct($JSON_en, 'create');//ürünü oluşturması için 
        //trendyola gönderdik
        
        $batchID = $updateProduct;
        $batchID = json_decode($batchID,true);  //batchID yaptığımız request'in id'si. bu id'yi kullanarak aşağıda olduğu gibi güncelleme isteği gönderdiğimiz ürünleri
        print_r($batchID);
        //görebiliyoruz
        $newBatchID = $batchID['batchRequestId'];   
        $getProductsWithBatchRequest = $trendyol->getProductsWithBatchRequest($newBatchID);
        
        
        ?>
        <!--oluşan ürünü tablo olarak yazma-->
        <table style="width:85%">
        <tr>
            <th>ÜRÜN ADI</th>
            <th>BARKOD</th> 
            <th>MARKA</th>
            <th>RENK</th>
            <th>MODEL KODU</th>
            <th>STOK KODU</th>
            <th>PİYASA FİYATI (PSF)</th>
            <th>SATIŞ FİYATI (TSF) </th> 
            <th>STOK</th>
            <th>ÜRÜN AÇIKLAMASI</th> 
            <th>PARA BİRİMİ</th>
            <th>KDV (%)</th>
            <th>KARGO FİRMASI</th>
            <th>RESİM URL</th> 
        </tr>
        
        <?php
                

        echo "<tr>
        <td>". $title . "</td>
        <td>". $barcode . "</td>
        <td>". $brandName . "</td>
        <td>". $color . "</td>
        <td>". $productMainId . "</td>
        <td>". $stockCode . "</td>
        <td>". $listPrice . "</td>
        <td><input type='text' name='salePrice' value='". $salePrice . "' size='8'></td>
        <td><input type='text' name='quantity' value='". $quantity . "' size='5'></td>
        <td>". $description . "</td>
        <td>". $currencyType . "</td>
        <td>". $vatRate . "</td>
        <td>". $cargoCompany . "</td>
        <td>". $url . "</td>
        </tr>";
          
        ?>
    </table>
    </ol>

    <form method="POST" action="updateProductsTest.php"><!--ürün düzenleme sayfasına yönlendiriyor-->
        <input type="submit" value="Düzenle">
    </form>
    <form method="POST" action="getProductsTest.php"><!--bütün ürünlerin listediği sayfaya yönlendiriyor-->
        <input type="submit" value="Bütün Ürünleri Göster">
    </form>
</body>
</html>
