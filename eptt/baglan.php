<?php

$servername = "localhost"; // Host adı
$username = "test";  // database kullanıcı ismi
$password = "R34#g9@MF5EpFx{nbFB*2x9YQ48c";  // database şifre
$db_name="eptt";  // database ismi 

try {
  // database bağlantısı
  $baglanti = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
  // Hata modu ayarı
  $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Baglanti basarili !";
} catch(PDOException $e) {
  echo "Baglanti basarisiz !: " . $e->getMessage();
}


?>