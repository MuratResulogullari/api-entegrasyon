<?php

include "../client.php";
$client=new ggClient();
$a=$client->registerDeveloper("gamzesirakaya736044","130199ga");
//GittiGidiyor API kullanıcısını, "geliştirici" olarak sisteme kaydetmek için bu metot çağırılmalıdır. Bu metodun döndürmüş olduğu Developer ID vasıtasıyla uygulamalar yaratılabilir.
print_r($a);

?>