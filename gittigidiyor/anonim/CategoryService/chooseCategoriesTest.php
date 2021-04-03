<?php
    error_reporting(E_ALL);

    include "../../client.php";
    $client = new ggClient();

    $cate = $client->getParentCategories(false, false , false);
    $a=$cate->categories->category;
    $array=json_encode($a);
     $categories=json_decode($array, true);   
  
    $GLOBALS['menu']=json_encode($a);

    $sayi=range(0,9);
    $harf=range("a","z");
    $harfler=array_merge_recursive($sayi,$harf);
    
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<form method="POST" name="form" action="ekleme2.php"> 

<script type="text/javascript">
var myObj;
function makeSubmenu(value,say) {
    var citiesOptions,code1 = "";
       
    if (value.length == 0) {
        
        document.getElementById("subcategory"+say).innerHTML = "<option></option>";
        document.getElementById("subcategory"+(say+2)).innerHTML = "<option></option>";
        
    }
    else {
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myObj=JSON.parse(mymenu);
                  alert(myObj);
                //  names=findByName(myObj,value);
                 document.getElementById("subcategory"+say).innerHTML = names;
            }
          
        
               
        };
        xmlhttp.open("GET", "demo_file_array.php", true);
        xmlhttp.send();
        xmlhttp.close();
    }
}

function findwithName(o, name) {//bu bir arama fonksiyonu. biz bunu kullanarak kategorilerin içinde ismini bildiğimiz bir 
//kategorinin id'sini bulduk. bu id'yi bulmak istememizin sebebi ürün güncellerken bizden kategori id'si isteniyor ancak 
//barkod ile ürün aratıp bulduğumuzda, bize döndürülen üründe sadece kategori adı var.


    if( o.categoryCode === name ){//eğer objenin adı istediğimiz isimse objeyi döndür.
      return o;
    }
    var result, p; 
    for (p in o) {
      
        if( o.hasOwnProperty(p) && typeof o[p] === 'object' ) {//eğer objenin içnde başka objeler (property) varsa o property'nin
        //içine gir ve aynı fonksiyonu çağırarak recursive bir şekilde istediğimizi bulana kadar arama yapmaya devam et
                  
            
            result = findwithName(o[p], name);
            
            if(result){
                return result;
            }
        }
    }
    return result;
}
var result;
var inp;
function selected() {
    var parentCategory = document.getElementById("category").value;
    var subCategory1 = document.getElementById("subcategory1").value;
    var subCategory2 = document.getElementById("subcategory2").value;
    var subCategory3 = document.getElementById("subcategory3").value;
    var subCategory4 = document.getElementById("subcategory4").value;
    
    //en son seçili kategorinin hangisi olduğunu buluyoruz ve seçili kategori adına göre id'sini çekmek için findByName fonksiyonuna yolluyoruz
    if(subCategory4!=""){
        result= findwithName(myObj, subCategory4);
    }else if(subCategory3!=""){
        result= findwithName(myObj, subCategory3);
    }else if(subCategory2!=""){
        result= findwithName(myObj, subCategory2);
    }else if(subCategory1!=""){
        result= findwithName(myObj, subCategory1);
    }
    
    createInput(result.id);//bulduğumuz id'yi bir sonraki sayfaya yani createProductsTest.php'ye gönderebilmek için formun içinde bir input alanı oluşturduk.

    
}
function createInput(id){
    inp = '<input type="text" id="categoryID" name="categoryID" value="'+id+'" size="4" readonly>';
    document.getElementById("demoj").innerHTML = inp;
}


function findByName(o, code1) {//bu bir arama fonksiyonu. biz bunu kullanarak kategorilerin içinde ismini bildiğimiz bir 
//kategorinin id'sini bulduk. bu id'yi bulmak istememizin sebebi ürün güncellerken bizden kategori id'si isteniyor ancak 
//barkod ile ürün aratıp bulduğumuzda, bize döndürülen üründe sadece kategori adı var.

         var name="";
      
           alert(code1);
         if( o.categoryCode === code1){//eğer objenin adı istediğimiz isimse objeyi döndür.
            for (k in o) {
                 name+= "<option>"+o[k].categoryName+"</option>";
            }
          return name;
         
        }
      
    var result, p; 
    for (p in o) {
      
        if( o.hasOwnProperty(p) && typeof o[p] === 'object' ) {//eğer objenin içnde başka objeler (property) varsa o property'nin
        //içine gir ve aynı fonksiyonu çağırarak recursive bir şekilde istediğimizi bulana kadar arama yapmaya devam et
                  
            
            result = findByName(o[p], name);
            
            if(result){
                return result;
            }
        }
    }
    return result;
}

var result;
var inp;
function selected() {
    var parentCategory = document.getElementById("category").value;
    var subCategory1 = document.getElementById("subcategory1").value;
    var subCategory2 = document.getElementById("subcategory2").value;
    var subCategory3 = document.getElementById("subcategory3").value;
    var subCategory4 = document.getElementById("subcategory4").value;
    
    //en son seçili kategorinin hangisi olduğunu buluyoruz ve seçili kategori adına göre id'sini çekmek için findByName fonksiyonuna yolluyoruz
    if(subCategory4!=""){
        result= findwithName(myObj, subCategory4);
    }else if(subCategory3!=""){
        result= findwithName(myObj, subCategory3);
    }else if(subCategory2!=""){
        result= findwithName(myObj, subCategory2);
    }else if(subCategory1!=""){
        result= findwithName(myObj, subCategory1);
    }
    
    createInput(result.id);//bulduğumuz id'yi bir sonraki sayfaya yani createProductsTest.php'ye gönderebilmek için formun içinde bir input alanı oluşturduk.

    
}
function createInput(id){
    inp = '<input type="text" id="categoryID" name="categoryID" value="'+id+'" size="4" readonly>';
    document.getElementById("demoj").innerHTML = inp;
}

function resetSelection() {
    document.getElementById("category").selectedIndex = 0;
    document.getElementById("subcategory1").selectedIndex = -1;
    document.getElementById("subcategory2").selectedIndex = -1;
    document.getElementById("subcategory3").selectedIndex = -1;
    document.getElementById("subcategory4").selectedIndex = -1;
}
</script>
</head>

<body onload="resetSelection()">
<?php
   
    

?>

<select id="category" onchange="makeSubmenu(this.value,1)">
<option value="" disable selected>Choose Category</option>
<?php
       
        foreach ($categories as $value) {
        
        echo '<option>'.$value['categoryName'].'</option>'."\n";
         
    }

    
?>
            
</select>
<select id="subcategory1"onchange="makeSubmenu(this.value,2)">
<option value="" disabled selected>Choose Subcategory</option>
<option></option>

</select>

<select id="subcategory2" onchange="makeSubmenu(this.value,3)">
<option value="" disabled selected>Choose Subcategory</option>
<option></option>
</select>

<select id="subcategory3" onchange="makeSubmenu(this.value,4)">
<option value="" disabled selected>Choose Subcategory</option>
<option></option>
</select>

<select id="subcategory4" onchange="makeSubmenu(this.value,5)">
<option value="" disabled selected>Choose Subcategory</option>
<option></option>
</select>


<button onclick="selected()">Seç</button>
<p id="demoj"></p>


</form>
<form action = "">
    <button onclick="resetSelection()">Seçili kategorileri temizle</button>
</form>

</body>
</html>





