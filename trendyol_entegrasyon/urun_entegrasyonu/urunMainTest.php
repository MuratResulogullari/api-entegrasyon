<!DOCTYPE html>
<html>
<body>

<h1><span style="color:#DC143C;text-align:center;">ÜRÜN ENTEGRASYONU TEST</span></h1>
<?php echo '<span style="color:#008B8B;text-align:center;">please choose option from below: </br></br></span>'; ?>


<?php
//ürün entegrasyonunun an asayfası. buradan seçim yaparak farklı sayfalara gidilebiliyor
if(isset($_POST['button1'])){
    $link='getBrandsTest.php';
    header('location:'.$link); 
 }/*elseif(isset($_POST['button2'])){ 
   $link='getBrandsWithNameTest.php';
   header('location:'.$link); 
 } */elseif(isset($_POST['button3'])){ 
   $link='getCategoriesTest.php'; 
   header('location:'.$link);
 }elseif(isset($_POST['button4'])){ 
  $link='chooseCategoriesTest.php'; 
  header('location:'.$link);
}
?>

    <form action="" method="POST"> 
      <button type="submit" name="button1" value="button1">Markaları Getir</button><!-- Tüm markaları getirme -->
    </form>  
      
    <form action="getBrandsWithNameTest.php" method="POST">
      </br></br>Marka Adı Girerek Markaları Getir: <input type="text" name="brandname" value=""><!-- Aratarak marka getirme -->
      <input type="submit" value="Markaları Getir">
    </form>
      
    <form action="" method="POST">
      </br></br><button type="submit" name="button3" value="button3">Kategorileri Getir</button><!-- Kategorileri getirme -->
    </form>

    <form action="" method="POST"> 
    </br></br><button type="submit" name="button4" value="button4">Ürün Oluştur</button><!-- Ürün oluşturma -->
    </form>  

  </body>
</html>