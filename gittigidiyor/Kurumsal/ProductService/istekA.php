<?php
        error_reporting(E_ALL);

    include "../../client.php";

    
		
    
        if($_REQUEST)
        {
            $a = $_REQUEST;
            function getData($a){
                $client = new ggClient();
                $categorys = $client->getSubCategories($a,false,false,false);
                foreach($categorys->categories->category as $item){
                    return print_r($item->array[0]]);
                }
                return response()->$item;
            }
        }

?>