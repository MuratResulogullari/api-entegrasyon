<html lang="en">
<head>
<body>
<form action="" method="POST">
   <input type="text" id="batch request id" name="batch request id" value="">
   <input type="submit" name="bul" value="bul">
</form>
<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();
   if(isset($_POST['bul'])){
    //$batchReq = $trendyol->updateProduct($data, 'create'); 
    //batchrequest ile ürün bulma sadece update ve create fonksiyonları kullanılınca bize trendyol tarafından
    //gönderilen batchrequestID ile kullanılıyor.
    
    $getProductsWithBatchRequest = $trendyol->getProductsWithBatchRequest($batchReq);

    echo($getProductsWithBatchRequest);
   }
?>

</body>
</head>
</html>