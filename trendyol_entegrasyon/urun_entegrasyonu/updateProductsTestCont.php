<!DOCTYPE html>
<html>
<body>
    <form action="updateInTrendyol.php" method ="POST">
      <?php
        include('../../vendor/autoload.php');
        include('../../trendyol_entegrasyon/Api.php');


        $trendyol = new Trendyol(); 
        $getCategories = $trendyol->getCategories();
        $getCategories = $trendyol->getCategories();
        $barcodeGet= $_POST['bar1'];//updateProductsTest.php'den girilen input'u çekiyor.
        $getProductsWithBarcode = $trendyol->getProductsWithBarcode($barcodeGet);//barkod numarasına göre ürünü bulup getiriyor.
        $array = json_decode($getProductsWithBarcode, true);

        if($array['totalElements']==0){
            echo "Ürün Bulunamadı. Lütfen barkodu kontrol ediniz.\n";
            
        }
        else{
            $approved;
            if($array['content'][0]['approved']==1){
              $approved = "Onaylı";
            }
            else{
              $approved="Onaylanmadı";
            }
            
            $categoryId = $_POST['categoryID'];//updateProductsTest.php'den çekiyor.
            $attributes;            
            $getCategorieAttributes = $trendyol->getCategorieAttributes($categoryId);//kategori id'sine göre kategori özelliklerini çekiyor
            $arrayAttributes = json_decode($getCategorieAttributes, true);

            //çekilen ürünün tüm bilgilerini form halinde yazma:
            echo"
            </br></br>ÜRÜN BİLGİLERİ--
            </br></br>ÜRÜN ADI: <input type='text' name='title' value='". $array['content'][0]['title']."'>
            </br></br>MODEL KODU: <input type='text' name='productMainId' value=".  $array['content'][0]['productMainId'] ." readonly>
            </br></br>BARKOD: <input type='text' name='barcode' value=". $array['content'][0]['barcode'] ." readonly>
            </br></br>KATEGORİ: <input type='text' name='categoryName' value='". $array['content'][0]['categoryName'] ."' readonly>
            KATEGORİ ID: <input type='text' name='kategori' value='". $categoryId."' readonly>
            </br></br>ONAY STATÜSÜ: <input type='text' name='status' value=". $approved ." readonly>
            </br></br>MARKA: <input type='text' name='brand' value='". $array['content'][0]['brand'] ."' readonly>
            </br></br>AÇIKLAMA: <br><br> <textarea name='description' rows='10' cols='30'>'". $array['content'][0]['description'] ."'</textarea>
            </br></br>STOK KODU: <input type='text' name='stockCode' value=". $array['content'][0]['stockCode'] .">";
            
            echo "</br></br></br></br>ÜRÜN ÖZELLİKLERİ--</br></br>";
            //döngü halinde ürünün tüm özelliklerini yazdırıyor.
            for($i = 0; $i < count($arrayAttributes['categoryAttributes']); $i++){

                if (empty($arrayAttributes['categoryAttributes'][$i]['attributeValues'])){
                    //eğer kullanıcının serbest bırakıldığı bir özellikse (renk gibi) kullanıcı input giriyor.
                    echo $arrayAttributes['categoryAttributes'][$i]['attribute']['name'].": <input type='text' name='".$arrayAttributes['categoryAttributes'][$i]['attribute']['name']."' value=''>";
                    echo "<br><br>";
                }
                else{
                    //eğer kullanıcının önceden belirlenmiş özelliklerden seçim yapması gerekiyorsa:
                    echo "<label for='attribute'>".$arrayAttributes['categoryAttributes'][$i]['attribute']['name'].":</label>
                    <select name='attributeNo=".$i."' id='attributeNo=".$i."'>";
                    for($j = 0; $j < count($arrayAttributes['categoryAttributes'][$i]['attributeValues']); $j++){
                    echo "<option value=\"".$arrayAttributes['categoryAttributes'][$i]['attributeValues'][$j]['name']."\">\"".$arrayAttributes['categoryAttributes'][$i]['attributeValues'][$j]['name']."\"</option>";
                    
                    }
                    echo "</select><br><br>";
                }
            }
            
            echo "</br></br></br></br>SATIŞ BİLGİLERİ--
            </br></br>Piyasa Satış Fiyatı (KDV Dahil): <input type='number' step=any name='listPrice' value=". $array['content'][0]['listPrice'] .">
            </br></br>Trendyol'da Satış Fiyatı (KDV Dahil): <input type='number' step=any name='salePrice' value=". $array['content'][0]['salePrice'] .">
            </br></br>KDV: <input type='number' name='vatRate' value=". $array['content'][0]['vatRate'] .">
            </br></br>STOK: <input type='number' name='quantity' value=". $array['content'][0]['quantity'] .">
      
            </br></br></br></br>KARGO VE TESLİMAT BİLGİLERİ--
            </br></br>DESİ BİLGİSİ: <input type='number' step=any name='dimensionalWeight' value=". $array['content'][0]['dimensionalWeight'] .">
            </br></br>KARGO ID'Sİ: <select id='cargoCompany' name='cargoCompany'> ";
              //seçilen kargo firması adına göre kargo firmasının id'sini bulma. id ürün güncellenirken giriliyor
              $getShipmentProviders = $trendyol->getShipmentProviders();
              $array2 = json_decode($getShipmentProviders, true);
              for($i = 0; $i < count($array2); $i++){
                echo "<option value=\"".$array2[$i]['name']."\">\"".$array2[$i]['name']."\"</option>";
              }
              echo "<option name='cargoCompany'></option>   
              </select> ";

              echo "</br></br></br></br>ÜRÜN GÖRSELLERİ--";
              for($i=0; $i<count($array['content'][0]['images']); $i++){
                echo '</br></br>image url: <input type="url" name="url" value="'.$array['content'][0]['images'][$i]['url'].'">';
              }
          }
          
      ?>
     
      <input type="submit" name="next" value="ürün güncelle">
    </form>
</body>
</html>