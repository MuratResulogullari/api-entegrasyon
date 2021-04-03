<html lang="en">
<head>
   <style>
      table, th, td {
      border: 1px solid black;
      }
   </style>
   <meta charset="UTF-8">
    
   <body>
   <form method="POST" action="updateProductsTest.php"><!--ürün düzenleme sayfasına yönlendiriyor-->
        <input type="submit" value="Düzenle">
   </form>
   <ol>
      <!--tüm ürünleri tablo halinde listeleme-->
      <table style="width:90%">
        <tr>
            <th>SIRA NO</th>
            <th>ÜRÜN ADI</th>
            <th>BARKOD</th> 
            <th>KATEGORİ</th> 
            <th>MARKA</th>
            <th>MODEL KODU</th>
            <th>STOK KODU</th>
            <th>PİYASA FİYATI (PSF)</th>
            <th>SATIŞ FİYATI (TSF) </th> 
            <th>STOK</th>
            <th>ÜRÜN AÇIKLAMASI</th> 
            <th>PARA BİRİMİ</th>
            <th>KDV (%)</th>
            <th>RESİM URL</th> 
        </tr>


      <?php 
         include("../../vendor/autoload.php");
         include("../../trendyol_entegrasyon/Api.php");

         $trendyol = new Trendyol();
         $getProducts=$trendyol->getProducts();

         $array = json_decode($getProducts, true);

         for($i = 0; $i < count($array['content']); $i++){

            echo "<tr>
               <td>".$i."</td>
               <td>". $array['content'][$i]['title'] . "</td>
               <td>". $array['content'][$i]['barcode'] . "</td>
               <td>". $array['content'][$i]['categoryName'] . "</td>
               <td>". $array['content'][$i]['brand'] . "</td>
               <td>". $array['content'][$i]['productMainId'] . "</td>
               <td>". $array['content'][$i]['stockCode'] . "</td>
               <td>". $array['content'][$i]['listPrice'] . "</td>
               <td>". $array['content'][$i]['salePrice'] . "</td>
               <td>". $array['content'][$i]['quantity'] . "</td>
               <td>". $array['content'][$i]['description'] . "</td>
               <td>TRY</td>
               <td>". $array['content'][$i]['vatRate'] . "</td>
               <td>". $array['content'][$i]['images'][0]['url'] . "</td>
               
               
            </tr>
            ";

         }
      ?>
    </table>
    </ol>

    <form method="POST" action="updateProductsTest.php"><!--ürün düzenleme sayfasına yönlendiriyor-->
        <input type="submit" value="Düzenle">
    </form>


   </body>
</html>