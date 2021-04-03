<!DOCTYPE html>
<html>
<body>

<h1><span style="color:#DC143C;text-align:center;">FORMS TEST</span></h1>
<?php echo '<span style="color:#008B8B;text-align:center;">please choose option from below: </br></br></span>'; ?>



<?php
if(isset($_POST['buttonUrun'])){
    $link='urun_entegrasyonu/urunMainTest.php';
    header('location:'.$link); 
 }elseif(isset($_POST['buttonSiparis'])){ 
   $link='siparis_entegrasyonu/siparisMainTest.php';
   header('location:'.$link); 
 } 
?>

<form action="" method="POST">
    <button type="submit" name="buttonUrun" value="buttonUrun">Ürün Entegrasyonu</button>
    <button type="submit" name="buttonSiparis" value="buttonSiparis">Sipariş Entegrasyonu</button>



</body>
</html>