<!DOCTYPE html>
<html>
<body>
<?php
    include("../../vendor/autoload.php");
    include("../../trendyol_entegrasyon/Api.php");
    $trendyol = new Trendyol();

    $getCategories = $trendyol->getCategories();
    $GLOBALS['menu'] = $getCategories;
    $name = 'Takı & Mücevher';
    
?>
<p>Click the button to display an alert box.</p>

<button onclick="myFunction('<?php echo $name ; ?>')">Try it</button>

    <script type="text/javascript">
        function myFunction(name) {

            var category = <?php echo $GLOBALS['menu'] ?>;
            
            
            result = findByName(category, name);
            alert(result.id);
        }

        function findByName(o, name) {

            if( o.name === name ){
            return o;
            }
            var result, p; 
            for (p in o) {
            
                if( o.hasOwnProperty(p) && typeof o[p] === 'object' ) {
                    
                    result = findByName(o[p], name);
                    
                    if(result){
                        return result;
                    }
                }
            }
            return result;
            }
    </script>
    
</body>
</html>
