<!DOCTYPE html>
<html>

<head>
    <title>Gittigidiyor</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>


    <?php
    error_reporting(E_ALL);
    include "../../client.php";
    $client = new ggClient();
    $deneme3 = $client->getParentCategories(false, false, false); //Bu metot GittiGidiyor'daki tüm ana kategorilere ulaşmak için kullanılır.
    $a = $client->getCities(0, 82); //GittiGidiyor daki bütün şehir bilgilerine ulaşmak için kullanılır. Ürün ekleme işlemi sırasında ilgili şehir bilgisinin (şehir adları ve kodları) belirtilmesi gerektiği için bu bilginin gönderilmesi zorunludur.

    $deneme4 = $client->getSubCategories("e", false, false, false);
   //Bu metot istenilen kategorinin alt kategorilerine ulaşmak için kullanılır.
  

    $deneme2 = $client->getCategorySpecs("ebec");
//Tek bir kategori ile ilgili "sadece özelliklerin alınması gerektiği durumlarda" kullanılır. Bu metot, ürün ekleme işlemi sırasında girilen kategoriye ait bazı özelliklerin belirtilmesi zorunlu olduğu için önemlidir.
    
   
   
   
    $deneme6 = $client->getCategoriesHavingVariantSpecs(); //Seçenekli ürün girişi yapabileceğiniz en alt kategori bilgilerini döner. Sistemde her kategoriye ait seçenekli ürün özellik bilgisi olmadığı için sadece bu metottan dönen kategorilere ürün girişi yapılabilir.
    $deneme7=$client->getCategoryVariantSpecs("ebec"); //Bir kategoriye ait olan seçenekli ürün özellik bilgilerini döner. Ürün girişinin yapılacağı en alt kategoriye ait özellik bilgilerinin bu metot ile edinilmesi gerekmektedir.
    


    //print_r($deneme2->specs->spec); 
    //print_r($a->cities->city);




    /*<?php foreach ($deneme4->categories->category as $item) { ?>
                                    
        //<option value="<?php echo $item->categoryCode ?>"><?php echo $item->categoryName ?></option>

     <?php } ?>*/


    ?>


    <div class="container" style=" margin-top:20px;">
        <div class="row">

            <div class="col justify-content-center">
                <p>Gittigidiyor ürün ekleme</p>
                <form method="POST" action="InsertProduct.php">
                    <table border="3">
                    <tr>
                            <td><label for="yasGirsi_lb">Kategori</label></td>

                            <td>
                                <select name="categorycode" id="categorycode">
                                    <option value="default">Select Category</option>
                                    <?php foreach ($deneme3->categories->category as $item) { ?>
                                        
                                        <option  value="<?php echo $item->categoryCode ?>"><?php echo $item->categoryName ?></option>

                                    <?php } ?>
                                </select>
                            </td>


                        </tr>
                        <tr id="subcategory-row" style="display:none;">
                            
                            <td ><label for="yasGirsi_lb">Alt Kategori</label></td>

                            <td>
                                <select name="categorycode" id="subcategory">
                                    
                                </select>
                            </td>


                        </tr>
                        <tr id="subsubcategory-row" style="display:none;">
                            <td><label for="yasGirsi_lb">2. Alt Kategori</label></td>

                            <td>
                                <select name="categorycode" id="subsubcategory">
                                   
                                </select>
                            </td>


                        </tr>
                        <tr id="subsubsubcategory-row" style="display:none;">
                            <td><label for="yasGirsi_lb">3. Alt Kategori</label></td>

                            <td>
                                <select name="categorycode" id="subsubsubcategory">

                                </select>
                            </td>


                        </tr>
                       



                        <tr>
                            <td><label for="yasGirsi_lb">Başlık:</label></td>
                            <td><input type="text" id="tYas" name="title" default value="Test Ürünü"></td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Marka</label></td>
                            <td>
                                <select name="marka"  id="marka">
                                    
                                </select>
                            </td>

                        </tr>

                        <tr>

                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Durum</label></td>
                            <td><select name="value1" id="">
                                    <option value="Diğer">Diğer</option>
                                    <option value="Etiketli">Yeni:Etiketli</option>
                                    <option value="Etiketsiz">Yeni:Etiketsiz</option>

                                </select></td>
                        </tr>




                        <tr>
                            <td><label for="yasGirsi_lb">Fotoğraf</label></td>
                            <td><input type="text" id="tYas" name="url" default value="https://mcdn01.gittigidiyor.net/53642/536423161_0.jpg"></td>
                        </tr>

                        <tr>
                            <td><label for="yasGirsi_lb">Fotoğraf</label></td>
                            <td><input type="text" id="tYas" name="url1" default value="https://mcdn01.gittigidiyor.net/53642/536423161_0.jpg"></td>
                        </tr>

                        <tr>
                            <td><label for="yasGirsi_lb">Ürün açıklaması</label></td>
                            <td><input type="text" id="tYas" name="description" default value="test ürünü api php client"></td>
                        </tr>



                        <tr>
                            <td><label for="yasGirsi_lb">Seçtiğiniz Satış türü:</label></td>
                            <td> <select name="format" id="">
                                    <option value="S">Mağaza Satışı</option>
                                    <option value="F">Sabit fiyat</option>

                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Ürün Fiyatı:</label></td>
                            <td><input type="text" id="tYas" name="buyNowPrice" default value="15.0"></td>
                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Ürününüz Kaç Günde Satışa çıksın?</label></td>
                            <td> <select name="listiningdays" id="">

                                    <option value="10">10 gün</option>
                                    <option value="30">30 gün</option>
                                    <option value="60">60 gün</option>
                                    <option value="180">180 gün</option>
                                    <option value="360">360 gün</option>

                                </select></td>
                        </tr>


                        <tr>
                            <td><label for="yasGirsi_lb">Nereden Kargolayacaksınız?</label></td>
                            <td>
                                <select name="City">

                                    <?php foreach ($a->cities->city as $item) { ?>
                                        <option value="<?php echo $item->trCode ?>"><?php echo $item->cityName ?></option>

                                    <?php } ?>
                                </select>



                            </td>
                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Kargo Firması:</label></td>
                            <td>

                                <select name="CargoCompany" id="cargo">
                                    <option value="aras">Aras Kargo</option>
                                    <option value="borusa">Borusan Lojistik</option>
                                    <option value="ceva">Ceva Lojistik</option>
                                    <option value="dhl">DHL</option>
                                    <option value="diger">Diğer</option>
                                    <option value="fedex">FedEx</option>
                                    <option value="fillo">Fillo Lojistik</option>
                                    <option value="horoz">Horoz Lojistik</option>
                                    <option value="mng">MNG Kargo</option>
                                    <option value="narpost">Narpost Kargo</option>
                                    <option value="ptt">PTT Kargo</option>
                                    <option value="surat">Sürat Kargo</option>
                                    <option value="tnt">TNT</option>
                                    <option value="tezel">Tezel Lojistik</option>
                                    <option value="ups">UPS</option>
                                    <option value="varan">Varan Kargo</option>
                                    <option value="yurtici">Yurtiçi Kargo</option>
                                </select></td>




                            </td>
                        </tr>
                        <tr>

                            <td><label for="yasGirsi_lb">Kargo ücretini kim ödeyecek?</label></td>
                            <td><select name=" ShippingPayment" id="">
                                    <option value="S">Satıcı Öder</option>
                                    <option value="B">Alıcı Kapıda Öder</option>

                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Ürün gönderim alanınızı seçin</label></td>
                            <td><select name="Shippiningwhere" id="">
                                    <option value="city">Şehir içi</option>
                                    <option value="country">Tüm Türkiye</option>

                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Şehir içi Kargo Ücret:</label></td>
                            <td><input type="text" id="tYas" name="cityPrice" default value="0"></td>
                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Tüm Türkiye Kargo Ücret:</label></td>
                            <td><input type="text" id="tYas" name="countryPrice" default value="1"></td>
                        </tr>



                        <tr>
                            <td><label for="yasGirsi_lb">Ne zaman kargoya teslim edeceksiniz?</label></td>
                            <td><select name="days" id="">
                                    <option value="2-3days">2-3 Gün</option>
                                    <option value="nextday">Ertesi Gün</option>
                                    <option value="sameday">Aynı Gün</option>

                                </select></td>
                        </tr>



                        <tr>







                        <tr>
                            <td><label for="yasGirsi_lb">Renk</label></td>
                            <td>

                                <select name="variantSpecvalueId">
                                    <?php foreach ($deneme7->specs->spec as $item) {
                                        foreach ($item->specValues->specValue as $data) {   ?>
                                            <option name="<?php echo $data->valueId ?>"><?php echo $data->valueId ?></option>

                                    <?php       }
                                    } ?>




                                </select>
                            </td>
                        </tr>






                        <tr>
                            <td><label for="yasGirsi_lb">Ürün Adeti:</label></td>
                            <td><input type="text" id="tYas" name="quantity" default value="2"></td>
                        </tr>
                        <tr>
                            <td><label for="yasGirsi_lb">Satılan Ürün Sayısı:</label></td>
                            <td><input type="text" id="tYas" name="soldCount" default value="0"></td>
                        </tr>





                        <tr>
                            <td><label for="yasGirsi_lb">Market Fiyatı</label></td>
                            <td><input type="text" id="tYas" name="marketprice" default value="70.0"></td>
                        </tr>



                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="ekle">
                                <input type="reset" name="Temizle" value="Temizle">

                            </td>
                        </tr>
                    </table>
                </form>



            </div>
            <div class="col-6">
                <br>
                <br>

                <a href="https://test.cevizsoft.com/gittigidiyor/Kurumsal/ProductService/urunsilme.php">Ürün silme Sayfasına Git</a>
                <br>
                <br>
                <a href="https://test.cevizsoft.com/gittigidiyor/Kurumsal/ProductService/urunfiyatGuncelleme.php">Ürün Fiyat Kontrol Sayfasına Git</a>
                <br>
                <br>
                <a href="https://test.cevizsoft.com/gittigidiyor/Kurumsal/ProductService/urunguncelleme.php">Ürün Güncelleme Sayfasına Git</a>
                <br>
                <br>
                <a href="https://test.cevizsoft.com/gittigidiyor/Kurumsal/ProductService/sipariskontrol.php">Sipariş Kontrol Sayfasına git</a>
            </div>
            <br>
            <br>

        </div>

        <script type="text/javascript">
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
 

            $(document).ready(function () {
             
               

               
                $('#categorycode').on('change',function(e) {
                 
                    var categoryCode = e.target.value;
                
                 $.ajax({

                       url:"../../anonim/categoryService/getSubCategories.php",
                       type:"POST",
                       data: {
                            categoryCode: categoryCode
                        },
                       cache: false,
                      
                       success:function (data) {
                            
                            if(data!=""){
                                $("#subcategory-row").show();
                                $("#subcategory").html(data);
                               
                            }else{
                                $("#subcategory-row").hide();
                                getBrands(categoryCode);
                            }
                        }
                    })
                })



                $('#subcategory').on('change',function(e) {
                 
                    var categoryCode = e.target.value;
                    
                    $.ajax({

                        url:"../../anonim/categoryService/getSubSubCategory.php",
                        type:"POST",
                        data: {
                                categoryCode: categoryCode
                            },
                        cache: false,
                        
                        success:function (data) {

                            
                            if(data!=""){
                                $("#subsubcategory-row").show();
                                $("#subsubcategory").html(data);
                               
                            }else{
                                $("#subsubcategory-row").hide();
                                getBrands(categoryCode);
                            }
                        }
                    })



                })


                $('#subsubcategory').on('change',function(e) {
                 
                 var categoryCode = e.target.value;
                 
                 $.ajax({

                     url:"../../anonim/categoryService/getSubSubSubCategory.php",
                     type:"POST",
                     data: {
                             categoryCode: categoryCode
                         },
                     cache: false,
                     
                     success:function (data) {

                         if(data!=""){
                             $("#subsubsubcategory-row").show();
                             $("#subsubsubcategory").html(data);
                            
                         }else{
                             $("#subsubsubcategory-row").hide();
                             getBrands(categoryCode);

                         }
                     }
                 })



             })

                $('#subsubsubcategory').on('change',function(e) {
                 var categoryCode = e.target.value;
                 $.ajax({

                    url:"../../../../../../anonim/categoryService/getCategoriesHavingVariantSpecs.php",
                    type:"POST",
                    data: {
                            categoryCode: categoryCode
                        },
                    cache: false,
                    success:function (data) {  
                            $("#subsubsubcategory").html(data);     
                    }
                 })
             })

            
           


            $('#subsubsubcategory').on('change',function(e) {
                 
                 var categoryCode = e.target.value;
                 getBrands(categoryCode);
             })
            });
            function getBrands(categoryCode){
                $.ajax({

                    url:"../../anonim/categoryService/getCategory.php",
                    type:"POST",
                    data: {
                            categoryCode: categoryCode
                        },
                    cache: false,
                    success:function (data) {           
                        $("#marka").html(data);
                    }  
                })

            }                    
        </script>


</body>

</html>