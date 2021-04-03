<!DOCTYPE html>
<html>
  <body>
  
    <h1><span style="color:#DC143C;text-align:center;">UPDATE PRODUCT TEST</span></h1>
    <?php echo '<span style="color:#008B8B;text-align:center;">please fill the form below: </br></br></span>'; ?>
    <?php 
      include('../../vendor/autoload.php');
      include('../../trendyol_entegrasyon/Api.php');

      $trendyol = new Trendyol(); 
      $getCategories = $trendyol->getCategories();
      $GLOBALS['menu'] = $getCategories;//javascript kodlarında rahat erişebilmek için GLOBAL olarak aldık

    ?>

    <!-- Bu ilk formda kullanıcıdan güncellemek istediği ürünün barkodunu girmesini istiyoruz. Bu barkoda göre önce aşağıda kategori adı 
    bulunacak -->
    <form action="" method="POST">
      </br></br>BARKOD: <input type="text" name="barcode" value="">
      <input type="submit" name="next" value="find" >
    </form>

    <form action="updateProductsTestCont.php" method="POST">
      <?php
        $array;
        if(isset($_POST['next'])){
          $barcodeGet= $_POST['barcode']; //barkodu yukarıdaki formdan çektik.
          $getProductsWithBarcode = $trendyol->getProductsWithBarcode($barcodeGet);//barkoda göre ürünü buldu
          $array = json_decode($getProductsWithBarcode, true);

          if($array['totalElements']==0){
            echo "Ürün Bulunamadı. Lütfen barkodu kontrol ediniz.\n";
          }else{
            $GLOBALS['categoryName'] = $array['content'][0]['categoryName']; //kategori adını sonra javascript kodlarında kullanmak 
            //için GLOBAL yaptık.
            echo "<input type='text' name='bar1' value='". $barcodeGet."' readonly>";//barkodu bir sonraki sayfaya yani 
            //updateProductsTestCont.php'ye atabilmek için yukarıdan çektiğimiz değeri tekrar burada readonly olacak şekilde input formuna 
            //yazdık. ikisi farklı form olduğu için böyle yapmak zorunda kaldık.
            echo "<input type='text' name='cat1' value='". $GLOBALS['categoryName']."' readonly>";
          }
          
        }
      ?>
      <button type ="submit" id="btn1" onclick="myFunction('<?php echo $GLOBALS['categoryName'];?>')">Ürün IDsini getir</button> 
      <!-- bu butona tıklandığında myFunction() isimli bir fonksiyon çalışacak ve içine yukarıda readonly olarak yazdığımız kategori 
      adını yollayacak-->
      <script type="text/javascript">
        function myFunction(name) {

          var category = <?php echo $GLOBALS['menu'] ?>;//tüm kategorileri JSON olarak çektik
          var result = findByName(category, name);//tüm kategorilerin olduğu JSON objesi ile yukarıda barkoduna göre çektiğimiz ürünün 
          //kategori adını findByName fonksiyonuna yolladık.
          
          createInput(result.id); //aradığımız kategorinin id'sini bulunca bu id createInput fonksiyonunu çalıştırdık.

        }
        function findByName(o, name) {//bu bir arama fonksiyonu. biz bunu kullanarak kategorilerin içinde ismini bildiğimiz bir 
        //kategorinin id'sini bulduk. bu id'yi bulmak istememizin sebebi ürün güncellerken bizden kategori id'si isteniyor ancak 
        //barkod ile ürün aratıp bulduğumuzda, bize döndürülen üründe sadece kategori adı var.

          if( o.name === name ){//eğer objenin adı istediğimiz isimse objeyi döndür.
            return o;
          }
          var result, p; 
          for (p in o) {

              if( o.hasOwnProperty(p) && typeof o[p] === 'object' ) {//eğer objenin içnde başka objeler (property) varsa o property'nin
                //içine gir ve aynı fonksiyonu çağırarak recursive bir şekilde istediğimizi bulana kadar arama yapmaya devam et
                  
                  result = findByName(o[p], name);
                  
                  if(result){
                      return result;
                  }
              }
          }
          return result;
        }
        
        function createInput(id){//bu input'u sadece yukarıda bulduğumuz kategori id'yi bir sonraki sayfaya yani updateProductsTestCont.php'ye
          //yollayabilmek için oluşturduk.
            inp = '<input type="text" id="categoryID" name="categoryID" value="'+id+'" size="4" readonly> ';
            document.getElementById("demoj").innerHTML = inp;
        }
      </script>
      <p id ="demoj"></p>

     
    </form>
  </body>
</html>