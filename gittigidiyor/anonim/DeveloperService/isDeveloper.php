
<?php

include "../../client.php";
$client=new ggClient();
$a=$client->isDeveloper("gamzesirakaya736044","130199ga");
//Herhangi bir GittiGidiyor kullanıcısının geliştirici olup olmadığını kontrol etmek için bu metot kullanılır.


print_r($a);

?>