<?php
//Gittigidiyor üzerinde ürün listelemek için bu metot kullanılır. 
//Eklenen ürünler GittiGidiyor sayfasında Hesabım/Ürün Yönetimi/Listelemeye Hazır Ürünler kısmında gözükecektir.
include "../../client.php";
$client = new ggClient();


$xml =
    ' <product>
    <categoryCode>'.$_POST['categorycode'].'</categoryCode>
    <storeCategoryId>0</storeCategoryId>
    <title>'.$_POST['title'].'</title>
    <specs>
       <spec required="false" value="'.$_POST['marka'].'" name="Marka"/>
       <spec required="false" value="'.$_POST['value1'].'" name="Durum"/>
    </specs>
    <photos>
       <photo photoId="0">
          <url>'.$_POST['url'].'</url>
       </photo>
       <photo photoId="1">
          <url>'.$_POST['url1'].'</url>
       </photo>
      
    </photos>
    <pageTemplate>2</pageTemplate>
    <description>'.$_POST['description'].'</description>
    <catalogId>0</catalogId>
    <catalogDetail>0</catalogDetail>
    <format>'.$_POST['format'].'</format>
    <buyNowPrice>'.$_POST['buyNowPrice'].'</buyNowPrice>
    <listingDays>'.$_POST['listiningdays'].'</listingDays>
    <productCount>5</productCount>
    <cargoDetail>
       <city>'.$_POST['City'].'</city>
       <cargoCompanies>
          <cargoCompany>'.$_POST['CargoCompany'].'</cargoCompany>
       </cargoCompanies>
       <shippingPayment>'.$_POST['ShippingPayment'].'</shippingPayment>
       <shippingWhere>'.$_POST['Shippiningwhere'].'</shippingWhere>
       <cargoCompanyDetails>
          <cargoCompanyDetail>
             <name>aras</name>
             <value>aras</value>
             <cityPrice>'.$_POST['cityPrice'].'</cityPrice>
             <countryPrice>'.$_POST['countryPrice'].'</countryPrice>

          </cargoCompanyDetail>
       </cargoCompanyDetails>
       <shippingTime>
          <days>'.$_POST['days'].'</days>
       </shippingTime>
    </cargoDetail>
    <affiliateOption>false</affiliateOption>
    <boldOption>false</boldOption>
    <catalogOption>false</catalogOption>
    <vitrineOption>false</vitrineOption>
    <variantGroups>
       <variantGroup alias="Renk:Zümrüt" valueId="962183"  nameId="2927" >
          <variants>
             <variant>
                <variantSpecs>
                   <variantSpec specDataOrderNumber="820" orderNumber="3" value="Altın/Dore" valueId="'.$_POST['variantSpecvalueId'].'" name="Renk" nameId="2927"/>
                   <variantSpec specDataOrderNumber="2" orderNumber="4" value="2" valueId="760374" name="Yaş" nameId="2926"/>
                </variantSpecs>
                <quantity>'.$_POST['quantity'].'</quantity>
                <stockCode/>
                <soldCount>'.$_POST['soldCount'].'</soldCount>
             </variant>
          </variants>
          <photos>
             <photo photoId="0">
                <url>https://mcdn01.gittigidiyor.net/53642/536423161_0.jpg</url>
             </photo>
          </photos>
       </variantGroup>
     
    </variantGroups>
    <marketPrice>'.$_POST['marketprice'].'</marketPrice>
    <manufacturerPartNo/>
 </product>

 ';

 //$xmll = simplexml_load_string($xml);
//$json = json_encode($xmll);
//$array = json_decode($json,TRUE);
//print_r($array);
//592463716 productıd
$deneme = $client->insertProducts(null, $xml, false, false);
print_r($deneme);
