<?php
include '../../client.php';

$client = new ggClient();
//$deneme3 = $client->getParentCategories(false, false, false);




?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<form method="POST" name="form" action="createProductsTest.php"> 

<script type="text/javascript">
var categories = $GLOBALS['menu'];
var myObj;
function makeSubmenu(value,say) {
    var names= "";
    
    if (value.length == 0) {
        
        document.getElementById("subcategory"+say).innerHTML = "<option></option>";
        document.getElementById("subcategory"+(say+2)).innerHTML = "<option></option>";
        
    }
    else {
       
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myObj = JSON.parse(this.responseText);
                names=findByName(myObj,value);  
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


    if( o.name === name ){//eğer objenin adı istediğimiz isimse objeyi döndür.
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

function findByName(o, name) {//bu bir arama fonksiyonu. biz bunu kullanarak kategorilerin içinde ismini bildiğimiz bir 
//kategorinin id'sini bulduk. bu id'yi bulmak istememizin sebebi ürün güncellerken bizden kategori id'si isteniyor ancak 
//barkod ile ürün aratıp bulduğumuzda, bize döndürülen üründe sadece kategori adı var.
     var id="";
      
    if( o.name === name ){//eğer objenin adı istediğimiz isimse objeyi döndür.
        for (i in o.subCategories) {
         id+= "<option>"+o.subCategories[i].name+"</option>";
        }
        return id;
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
    $depth = 0;
    function print_menu_1 ($menu, $key, $depth) {
        $indent_string = " ";

        foreach ($menu as $value) {
            // $this_key = $value['id'];
            echo str_repeat($indent_string,$depth+2).'<option>'.$value['name'].'</option>'."\n";
        }
    }   

?>

<select id="category" onchange="makeSubmenu(this.value,1)">
<option value="" disable selected>Choose Category</option>

<?php
    $menu = $client->getParentCategories(false, false, false);
    print_menu_1 ($menu, 0, 0);
?>
</select>
<select id="subcategory1"onchange="makeSubmenu(this.value,2)">
<option value="" disabled selected>Choose Subcategory</option>
<option>


</option>
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
</br></br>MARKA ADI ARA: <input type="text" name="brands" value=""> <!--marka adı aratılarak bir sonraki sayfaya
gönderiliyor.-->

<button onclick="selected()">Seç</button>

</form>

<form action = "">
    <button onclick="resetSelection()">Seçili kategorileri temizle</button>
</form>

</body>
</html>