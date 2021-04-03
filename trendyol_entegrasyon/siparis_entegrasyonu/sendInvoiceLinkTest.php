<?php 
/** NOT : "Created" statüsünde olan sipariş paketine "Picking" statüsü iletilmezse 
 * "Shipped" statüsüne kadar müşteri tarafında iptal edilebilir olacaktır */
   include("../../vendor/autoload.php");
   include("../../trendyol_entegrasyon/Api.php");


   $trendyol = new Trendyol();
 
   $invoiceLink = "https://extfatura.faturaentegratoru.com/324523-34523-52345-3453245.pdf";
   $shipmentPackageId = 229391782;

   //invoice link dosyadan gelecek
   

   $item = '{
    "invoiceLink": null,
    "shipmentPackageId": null
    }';
   
    $json = json_decode($item, true);
    $json['invoiceLink'] = $invoiceLink;
    $json['shipmentPackageId'] = $shipmentPackageId;

    //  echo(json_encode($json) . "<br/>" );
    $sendInvoiceLink=$trendyol->sendInvoiceLink(json_encode($json));
    echo($sendInvoiceLink);