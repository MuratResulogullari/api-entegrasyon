<?php
    include("../../vendor/autoload.php");
    include("../../trendyol_entegrasyon/Api.php");


    $trendyol = new Trendyol();
    $getCategories = $trendyol->getCategories();
    $array = json_decode($getCategories, true);
    $menu = $array['categories'];
    //$myJSON = json_encode($menu);

    /*$myArr = array("John", "Mary", "Peter", "Sally");

    $myJSON = json_encode($myArr);*/
    echo json_encode($array);
    //print_r($menu);

?>
