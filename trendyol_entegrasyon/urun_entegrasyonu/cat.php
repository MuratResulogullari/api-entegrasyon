<?php 
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();

   $getCategories = $trendyol->getCategories();
   $array = json_decode($getCategories, true);
   $GLOBALS['menu'] = $array['categories']; 
  
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <script type="text/javascript">
        var subcategory = $GLOBALS['menu'];
        
        function makeSubmenu(value,say) {
          var citiesOptions = "";
            if (value.length == 0) document.getElementById("subcategory"+say).innerHTML = "<option>murat</option>";
            else {
              var myObj, i, j, k,l,t= "";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    myObj = JSON.parse(this.responseText);
                     
                    for (i in myObj.categories) {
                         if(myObj.categories[i].name!=value){
                             for (j in myObj.categories[i].subCategories) {
                                    if(myObj.categories[i].subCategories[j].name!=value){
                                            for (k in myObj.categories[i].subCategories[j].subCategories) {
                                                if(myObj.categories[i].subCategories[j].subCategories[k].name!=value){
                                                  for (l in myObj.categories[i].subCategories[j].subCategories[k].subCategories) {
                                                     if(myObj.categories[i].subCategories[j].subCategories[k].subCategories[l].name==value){
                                                      for (t in myObj.categories[i].subCategories[j].subCategories[k].subCategories[l].subCategories) {
                                                        citiesOptions += "<option>" +myObj.categories[i].subCategories[j].subCategories[k].subCategories[l].subCategories[t].name + "</option>"; 

                                                         }
                                                      }
                                                     else{
                                                     
                                                       
                                                       }
                                                  } 
                                                }else{
                                                  for (l in myObj.categories[i].subCategories[j].subCategories[k].subCategories) {
                                                  citiesOptions += "<option>" +myObj.categories[i].subCategories[j].subCategories[k].subCategories[l].name + "</option>"; 

                                                  } 
                                                }
                                          
                                            }
                                     }else{
                                        for (k in myObj.categories[i].subCategories[j].subCategories) {
                                         citiesOptions += "<option>" +myObj.categories[i].subCategories[j].subCategories[k].name + "</option>"; 
                                             }
                                           }
                             }
                         }
                         else{
                            for (j in myObj.categories[i].subCategories) {
                              citiesOptions += "<option>" +myObj.categories[i].subCategories[j].name + "</option>";
                             }
                         }
                     }
                  
                 document.getElementById("subcategory"+say).innerHTML = citiesOptions;
                   }
                };
                xmlhttp.open("GET", "demo_file_array.php", true);
                xmlhttp.send();
                xmlhttp.close();
            }
         }
          
       
        function displaySelected() {
            var parentCategory = document.getElementById("category").value;
            var subCategory1 = document.getElementById("subcategory1").value;
            var subCategory2 = document.getElementById("subcategory2").value;
            var subCategory3 = document.getElementById("subcategory3").value;
            var subCategory4 = document.getElementById("subcategory4").value;
            alert(country + "\n" + city);
        }

        function resetSelection() {
            document.getElementById("category").selectedIndex = 0;
            document.getElementById("subcategory1").selectedIndex = 0;
        }
    </script>
  </head> 
 
<body onload="resetSelection()">
<?php      
            $depth = 0;
            function print_menu_1 ($menu, $key, $depth) {
              $indent_string = "    ";

                foreach ($menu as $value) {
               //   $this_key = $value['id'];
                  echo str_repeat($indent_string,$depth+2).'<option>'.$value['name'].'</option>'."\n";
               } 
              } 
         
?>


  <select id="category"  onchange="makeSubmenu(this.value,1)">
    <option value="" disable selected>Choose Category</option>
               
      <?php 
              //<option> Mobile</option>
             print_menu_1 ($menu, 0, 0);
      ?>
  </select>
  <select id="subcategory1"onchange="makeSubmenu(this.value,2)">
    <option value="" disabled selected>Choose Subcategory</option>
          
          <option></option>
            
  </select>
  <select id="subcategory2"  onchange="makeSubmenu(this.value,3)">
    <option value="" disabled selected>Choose Subcategory</option>
         <option></option>
  </select>
  <select id="subcategory3"  onchange="makeSubmenu(this.value,4)">
    <option value="" disabled selected>Choose Subcategory</option>
         <option></option>
  </select>
  <select id="subcategory4"  onchange="makeSubmenu(this.value,5)">
    <option value="" disabled selected>Choose Subcategory</option>
         <option></option>
  </select>
    <button onclick="displaySelected()">show selected</button>

 
<button onclick="clickButton()">Click me!</button>

<p id="demoj"></p>

<script>
function clickButton() {
  var s = document.createElement("script");
  s.src = "demo_file_array.php";
  document.body.appendChild(s);
}

function myFunc(myObj) {
  document.getElementById("demoj").innerHTML = myObj.name;
}
</script>

</body>
</html>






  