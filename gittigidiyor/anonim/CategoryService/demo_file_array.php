<?php

include "../../client.php";
$client= new ggClient();
$subcategories=array();
$subcategories2=array();
    $sayi=range(0,9);
       $harf=range("a","z");
       $harfler=array_merge_recursive($sayi,$harf);
     
       $cate = $client->getParentCategories(false, false , false);
       $parant=$cate->categories->category;
       
       for ($j=0; $j <count($harfler); $j++) { 

          $sub= $client->getSubCategories($harfler[$j], false, false, false);
           if($sub->categoryCount>0){
           $result= $sub->categories->category;
           $subcategories=array($result);
             //   print_r($result);
              for ($k=0; $k <count($result) ; $k++) { 
                $code=$result[$k]->categoryCode;
                     $sub= $client->getSubCategories($code, false, false, false);
                       if($sub->categoryCount>0){
                           $result= $sub->categories->category;
                           $subcategories=($result);
                              // print_r($result);
                                    for ($t=0; $t <count($result); $t++) { 
                                    $code2=$result[$t]->categoryCode;
                                    $sub= $client->getSubCategories($code2, false, false, false);
                                    if($sub->categoryCount>0){
                                        $result= $sub->categories->category;
                                        $subcategories=array($result);
                                     //  print_r($result);
                                        for ($s=0; $s <count($result); $s++) { 
                                          $code3=$result[$s]->categoryCode;
                                          $sub= $client->getSubCategories($code3, false, false, false);
                                           if($sub->categoryCount>0){
                                            $result= $sub->categories->category;
                                            $subcategories=array($result);
                                         //  print_r($result);
                                         }
                                     }
                  }    
                             
                 }
            }
              
        }
     
    }
   
}
     $subcategories2=array_merge_recursive($parant,$subcategories);
     
   echo json_encode($subcategories2);
        
  
    
   
    
   

