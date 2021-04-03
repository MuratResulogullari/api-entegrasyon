<?php

include "../client.php";
$client=new ggClient();

$developerId=$client->getDeveloperId();
$result=$client->getApplicationList($developerId);
//Bu metot, geliştirici tarafından oluşturulan uygulamaların bilgisine ulaşmak için kullanılır.
print_r($result);

?>