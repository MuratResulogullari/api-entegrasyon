<?php
include '../../client.php';
$client=new ggClient(); // mesaj atıldı.
$xml=

'<product>
<categoryCode>ebec</categoryCode>
<storeCategoryId>0</storeCategoryId>
<title>__ggtest API test ürünü</title>
<specs>
   <spec required="false" value="575" name="Marka"/>
   <spec required="false" value="Diğer" name="Durum"/>
</specs>
<photos>
   <photo photoId="0">
      <url>https://mcdn01.gittigidiyor.net/53642/536423161_0.jpg</url>
   </photo>
   <photo photoId="1">
      <url>https://mcdn01.gittigidiyor.net/53642/536423161_0.jpg</url>
   </photo>
</photos>
<pageTemplate>2</pageTemplate>
<description>API test ürün açıklaması</description>
<catalogId>0</catalogId>
<catalogDetail>0</catalogDetail>
<format>S</format>
<buyNowPrice>15.0</buyNowPrice>
<listingDays>30</listingDays>
<productCount>4</productCount>
<cargoDetail>
   <city>34</city>
   <cargoCompanies>
      <cargoCompany>aras</cargoCompany>
   </cargoCompanies>
   <shippingPayment>S</shippingPayment>
   <shippingWhere>city</shippingWhere>
   <cargoCompanyDetails>
      <cargoCompanyDetail>
         <name>aras</name>
         <value>Aras Kargo</value>
      </cargoCompanyDetail>
   </cargoCompanyDetails>
   <shippingTime>
      <days>2-3days</days>
   </shippingTime>
</cargoDetail>
<affiliateOption>false</affiliateOption>
<boldOption>false</boldOption>
<catalogOption>false</catalogOption>
<vitrineOption>false</vitrineOption>
<variantGroups>
   <variantGroup alias="Renk:Zümrüt" valueId="962183" nameId="2927">
      <variants>
         <variant>
            <variantSpecs>
               <variantSpec specDataOrderNumber="820" orderNumber="3" value="Zümrüt" valueId="962183" name="Renk" nameId="2927"/>
               <variantSpec specDataOrderNumber="2" orderNumber="4" value="2" valueId="760374" name="Yaş" nameId="2926"/>
            </variantSpecs>
            <quantity>2</quantity>
            <stockCode/>
            <soldCount>0</soldCount>
         </variant>
      </variants>
      <photos>
         <photo photoId="0">
            <url>https://images.gittigidiyor.com/i/32/tn30/320131_tn30_R_962183_0.jpg</url>
         </photo>
      </photos>
   </variantGroup>
   <variantGroup alias="Renk:Kırmızı" valueId="70550" nameId="2927">
      <variants>
         <variant>
            <variantSpecs>
               <variantSpec specDataOrderNumber="320" orderNumber="3" value="Kırmızı" valueId="70550" name="Renk" nameId="2927"/>
               <variantSpec specDataOrderNumber="1" orderNumber="4" value="1" valueId="760373" name="Yaş" nameId="2926"/>
            </variantSpecs>
            <quantity>2</quantity>
            <stockCode/>
            <soldCount>0</soldCount>
         </variant>
      </variants>
      <photos>
         <photo photoId="0">
            <url>https://images.gittigidiyor.com/i/32/tn30/320131_tn30_R_70550_0.jpg</url>
         </photo>
      </photos>
   </variantGroup>
</variantGroups>
<marketPrice>70.0</marketPrice>
<manufacturerPartNo/>
</product>'
;

$deneme = $client->updateProductWithNewCargoDetail("598876311","" ,$xml,true,false, false);
 print_r ($deneme);


?>