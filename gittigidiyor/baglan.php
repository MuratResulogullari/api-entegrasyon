<?php
// Veritabanı bağlantı işlemleri
$Servername="localhost"; // Host Adı
$username="test"; // PhpMyAdmin'e giriş yapılan  kullanıcı adı
$sifre="R34#g9@MF5EpFx{nbFB*2x9YQ48c"; //PhpMyAdmin'e giriş yapılan  sifre
$dbname="gittigidiyor"; // oluşturduğunuz veritabanı ismi

$baglan=mysqli_connect($Servername,$username,$sifre,$dbname); 
//sunucuya bağlanmak için mysqli_connect fonksiyonunu kullanırız.
mysqli_set_charset($baglan,"UTF-8"); // türkçe karakterleri desteklemesi için mysqli_set_charset fonksiyonunu kullanırız.
mysqli_query($baglan,"SET NAMES UTF8"); // veritabanı sorgusu
/*
if($baglan){

	echo "basarili"; // işlem başarılıysa ekrana basarili yazısını yaz.
}
else {

	echo "basarisiz";
}
*/

?>