<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
            
        include "urun.php";
        include "../../client.php";
        $client=new ggClient();
        $deneme = $client->getCategories(0,100,true,true,true);
         //print_r ($deneme->categories->category);

         foreach($deneme->categories->category as $item){
             $a = $item->categoryCode;
             echo $a."<br>";
         }
        
    ?>
    
    <script>
          function ilceListesiGetir() {
                var data = {
                    'MainCategory': $('#MainCategory').val()
                };
            console.log(data)
          }
    </script>






</body>
</html>