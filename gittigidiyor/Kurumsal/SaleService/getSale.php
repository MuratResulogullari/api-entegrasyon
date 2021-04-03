<?php
include "../../client.php";
$client = new ggClient();

$deneme = $client->getSale("SC106899371");
$a = $deneme->sales;
$b = $deneme->sales->sale->buyerInfo;

           foreach($a as $item){
                   
                         echo $item->saleCode;
                         echo $item->productTitle;
                         echo $item->productId;
                         echo $b->username;
           }

                           
                           

   //Bu servis ile satıcı, satış kodunu girmek suretiyle mevcut satışın alıcı bilgileri,ürün ücreti ve ürün stok kodu vb. bilgileri elde eder                        
                
//print_r ($a);
?>