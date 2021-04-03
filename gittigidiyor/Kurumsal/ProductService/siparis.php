<?php
// Sipariş kontrol sayfasında kullandığımız metotlar
    include "../../client.php";
    $client=new ggClient();
  //$deneme = $client->remindForApproval($_POST["saleCode"]);
  //$deneme1 = $client->giveRateAndComment(587955657,1,'asdfasf');//product
  //$deneme2 = $client->receiveRemandedItem($_POST["saleCode"]);
  //$deneme3 = $client->getReasonsToCancelSales(20,"asdfghj");
  //$deneme4 = $client->cancelSaleAfterEarlyCancellationRequest($_POST["saleCode"]);
  $deneme5 = $client->getCargoInformation($_POST["kargo"]); //Bu metot, satış kodunu girdikten sonra mevcut satışın kargo bilgisini girmek için kullanılır.
  $deneme6 = $client->remindForApproval($_POST["onay"]);//Bu method ile kargolanan ürüne onay hatırlatması yapılabilir. Kargo bilgisini girdiğiniz tarihten itibaren 3 iş günü içinde alıcı gönderilen ürüne onay vermezse onay hatırlatması yapılabilir. Kullanıcıya onay hatırlatarak son 24 saat hakkı tanınır. Eğer bu 24 saatlik dilim içerisinde de onay verilmezse GittiGidiyor ürüne otomatik onay verir, para ise bir sonraki iş günü içinde satıcıya yatırılır. Onay hatırlatmak için satışın onay bekleyenler durumunda olması gerekmektedir.
  $deneme7 = $client->receiveRemandedItem($_POST["iade"]);//Bu metot alıcılar tarafından iade kargo bilgisi girilen işlemlere iade onayı vermek için kullanılır.
  $deneme8 = $client->cancelSaleAfterEarlyCancellationRequest($_POST["iptal"]);//Bu metot kargolama aşamasında olan ve alıcılar tarafından iptal talep edilen işlemlere iptal onayı vermek için kullanılır.
  $deneme9 = $client->cancelSale($_POST["cancel"],1);//Bu metod kargolama aşamasındaki işlemleri iptal etmek için kullanılır. reasonId alanına girilebilecek değerleri getReasonsToCancelSale metodu ile öğrenebilirsiniz.
  $deneme10 = $client->getSale($_POST["aktif"]);//Bu servis ile satıcı, satış kodunu girmek suretiyle mevcut satışın alıcı bilgileri,ürün ücreti ve ürün stok kodu vb. bilgileri elde eder.
  print_r($deneme10);

 
   
