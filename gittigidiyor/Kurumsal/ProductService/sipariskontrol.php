<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Kontrol</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <?php

    include "../../client.php";
   
    $client=new ggClient();
   // $deneme = $client->getProducts(0,50,'L',true);
    //$getSale=$client->getSale('SC91958276');
    $deneme = $client->getSale("SC106899371");//Bu servis ile satıcı, satış kodunu girmek suretiyle mevcut satışın alıcı bilgileri,ürün ücreti ve ürün stok kodu vb. bilgileri elde eder.
    $a = $deneme->sales;
    $b = $deneme->sales->sale->buyerInfo;
  
   // print_r ($deneme->products->product);
   

    ?>
    <div class="container" >
        <div class="row">
            <div class="col">
           
           
            <form method="POST" action="siparis.php">
                <div class="form-group">
                    <label for="productID">Kargo yapılacaklar</label>
                    <input type="text" name="kargo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-danger">Ürünleri Göster</button>
                <div class="form-group">
                    <label for="productID">Onay Bekleyenler</label>
                    <input type="text" name="onay" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-danger">Listele</button>
                <div class="form-group">
                    <label for="productID">İade Konumunda Olanlar</label>
                    <input type="text" name="iade" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-danger">Listele</button>
                <div class="form-group">
                    <label for="productID">İptali Beklenenler</label>
                    <input type="text" name="iptal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-danger">İptal</button>
                <div class="form-group">
                    <label for="productID">İptal Olanlar</label>
                    <input type="text" name="cancel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-danger">İptal Listele</button>
                <div class="form-group">
                    <label for="productID">Aktif Satışlar</label>
                    <input type="text" name="aktif" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-danger">Satışlar</button>
            </form>
            
            </div>
            <div class="col">
            <table class="table">
                <thead>
                    <tbody>
                    <tr>
                            <td><label for="yasGirsi_lb">Siparişlerim</label></td>
                            <td>

                           
  
                                <select onchange="this.options[this.selectedIndex].value != '' ? location = this.options[this.selectedIndex].value : false">
                                    <option value="default">Select Category</option>
                                    
                                        <option  value="https://test.cevizsoft.com/gittigidiyor/Kurumsal/SaleService/getSaleProcessReport.php">Para Transferleri</option>
                                        <option  value="https://test.cevizsoft.com/gittigidiyor/Kurumsal/SaleService/getAccountTransactionsV2.php">Tamamlamalar</option>


                                  
                                </select>
                            </td>


                        </tr>
                    </tbody>
                </thead>
                
            </table>
            </div>
            <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Satış Kodu</th>
                    <th scope="col">Ürün adı</th>
                    <th scope="col">ürün ID</th>
                    <th scope="col">Alıcı</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($a as $item){?>
                   
                    <td><?php echo $item->saleCode;?></td>
                    <td><?php echo $item->productTitle;?></td>
                    <td><?php echo $item->productId;?></td>
                    <td><?php echo $b->username;;?></td>
     
                <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
</html>