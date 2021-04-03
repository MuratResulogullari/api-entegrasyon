<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//Ürün/ürünleri silmek için kullanılır. ***************************
    include "../../client.php";
    $client=new ggClient();

    $deneme = $client->deleteProduct([$_POST['productID']]);

    if($_POST['productID']){
        echo "Data silindi.";
    }else{
        echo "Bir Problem olustu";
    }
    ?>
    <br>
    <br>
    <br>
    
    <a  href="http://localhost/gittigidiyor/Kurumsal/ProductService/getProducts.php">Product silme sayfasına geri dön.</a>

</body>

</html>