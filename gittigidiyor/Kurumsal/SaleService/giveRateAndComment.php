<?php
     include "../../client.php";
     $client=new ggClient();
     
     $deneme = $client->giveRateAndComment(587955657,1,'asdfasf');
     /* Bu servis, uygun satış durumlarında, kullanıcıların mevcut satış işlemi için yorum girip puan verebilmelerini sağlar. "Satıcı kargo yapmadı", "Alıcı ürüne onay verdi", "Ürün bedeli alıcıya iade edildi", "Alıcı depozito ücretini ödedi. Satıcının irtibat bilgileri mail yoluyla iletildi", "Satıcı, araç teslimini gerçekleştirmedi. İşlem alıcı tarafından iptal edildi" gibi satış durumlarında alıcılar, satıcı için yorum verebilirler. Satıcılar ise; "Alıcı ödeme yapmadı", "Alıcı ürüne onay verdi", "Alıcı ödeme yapmadı. İşlem satıcı tarafından iptal edildi ve ürün yeni kod numarasıyla satışa çıkarıldı" gibi satış durumlarında alıcı için yorum verebilir. */
     
     print_r ($deneme);
?>