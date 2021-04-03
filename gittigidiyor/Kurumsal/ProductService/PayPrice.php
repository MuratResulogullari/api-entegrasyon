<?php
/*Listeleme servisi ve revizyon ücretlerini ödemek için kullanılır.
 Kullanıcı, ödeme çeki ve kredi kartı bilgilerini kullanarak ödeme işlemini gerçekleştirir. 
 Eğer kullanıcının ödeme çekinde ücretsiz ve ücreti bulunan ilanlar mevcut ise ücretsiz ilanlarda diğer ilanların ücreti ödenene kadar satışa alınmayacaktır. 
 Kullanıcı toplu bir şekilde ücretli ilanları için ödeme yapabilir yada ücretsiz ilanlarını bu methodun dışında içerisinde ücretli bir ilan bulunmayacak şekilde listeleyebilir.*/
include "../../client.php";
$client=new ggClient();
$deneme = $client->payPrice('FT-hxGYCrx7cFS','xyz','zwg','5419xxxxxx2','128','06','12'); // kredi kartı bilgileri girilecek.
 print_r ($deneme);



?>