<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <?php

    include "../../client.php";
    $client=new ggClient();
    $deneme = $client->getProducts(0,50,'L',true); //GittiGidiyor, Hesabım/Ürün Yönetimi sayfasında yer alan: Aktif Satışlarım, Yeni Listelenenler, Satılanlar, Satılmayanlar bölümündeki ürün bilgilerine ulaşmak için kullanılır.
   // print_r ($deneme->products->product);
   

    ?>

    <div class="container" >
        <div class="row">
            <div class="col-6">
           
           
            <form method="POST" action="deleteProduct.php">
                <div class="form-group">
                    <label for="productID">Silinecek ürün Product Id</label>
                    <input type="text" name="productID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-danger">Ürünü Sil</button>
            </form>
            
            </div>
            <div class="col-6">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Title</th>
                    </tr>
                </thead>
                <tbody>
                <?php  foreach($deneme->products->product as $item){?>
                    <tr>
                        <td><?php echo $item->productId;?></td>
                        <td><?php echo $item->product->title;?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
</html>