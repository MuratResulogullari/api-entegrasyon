<?php

include "../client.php";
$client=new ggClient();
$client-> getModifiedCities();
/* Bu metot, belirtilen tarihten şimdiki zamana kadar şehir adları, kodları değişmiş olan şehirleri listelemek için kullanılır. Bu metodu kullanarak, değişiklikleri güncellemek için her seferinde bütün şehirlere ait veriyi çekmek yerine, sadece belirtilen tarihten sonra gerçekleşmiş olan değişiklikleri çekebilirsiniz.*/
print_r($client);

?>