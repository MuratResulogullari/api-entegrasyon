<?php
include "../../vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
class Trendyol {
    function __construct() {
        //$CI = get_instance();
        $this->supplierId = '178927';
        $this->username = 'nDbtBmDDFMy4fy399DYN';
        $this->password = 'kBa2wEbH9ZfiWHzrzzwr';
        $options['headers'] = array(
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
            'Content-Type' => 'application/json'
        );
        $options['http_errors'] = false;
        
        $this->guzzle = new GuzzleHttp\Client($options);
        
        $this->baseurl = 'https://api.trendyol.com/sapigw/suppliers/';
        $this->categories = null;

        
        
    }

    /*
     * Trendyol Markalarını Getirir
    */
    
    public function getBrands($page = null, $size = null) {
       
        $url = 'https://api.trendyol.com/sapigw/brands?';
        if ($page != null) {
           $url .= 'page=' . $page;
            
        }
        if ($size != null) {
            $url .= '&size=' . $size;
        }

        //echo $url;
        $response = $this->guzzle->get($url);
        return $response->getBody();
    }
    /*
     * Trendyol Markasını ismine göre filtreleyerek getirir.
    */
    public function getBrandsWithName($name) {
        $response = $this->guzzle->get('https://api.trendyol.com/sapigw//brands/by-name?name=' . $name);
        return $response->getBody();
    }
    /*
     * Trendyol Kategorilerini Getirir.
    */
    public function getCategories() {
        $returnData = $this->guzzle->get('https://api.trendyol.com/sapigw/product-categories?ParentId=' . 403);
        return $returnData->getBody();
    }
    /*
     * Trendyol Kategorilerine ait özellik listesini döndürür.
    */
    public function getCategorieAttributes($categoryId) {
        $response = $this->guzzle->get('https://api.trendyol.com/sapigw/product-categories/' . $categoryId . '/attributes');
        return $response->getBody();
    }
    /*
     * Trendyol'un çalıştığı tüm kargo firmalarını döner
    */
    public function getShipmentProviders() {
        //Kargo Firmalarını Listeler
        $response = $this->guzzle->get('https://api.trendyol.com/sapigw/shipment-providers');
        return $response->getBody();
    }
    /*
     * Trendyol Kullanıcı hesabınızda kayıtlı olan Adreslerini döndürür.
    */
    public function getSuppliersAdress() {
        $url = $this->baseurl . $this->supplierId . '/addresses';
        $response = $this->guzzle->get($url);
        return $response->getBody();
    }
    /*
     * Trendyol üzerindeki ürünlerinizi fitrelemeye yarar. Verilen değerlere göre ürünleri döndürür.
    */
    public function getProducts($approved = true, $page = 0, $size = 100, $barcode = null, $startDate = null, $endDate = null) {
        $url = $this->baseurl . $this->supplierId . '/products?';
        if ($approved != null) {
            $url .= 'approved=' . $approved;
        }
        if ($barcode != null) {
            $url .= '&barcode=' . $barcode;
        }
        if ($page != null) {
            $url .= '&page=' . $page;
        }
        if ($size != null) {
            $url .= '&size=' . $size;
        }
        if ($startDate != null) {
            $url .= '&startDate=' . $startDate;
        }
        if ($endDate != null) {
            $url .= '&endDate=' . $endDate;
        }
        $response = $this->guzzle->get($url);
        return $response->getBody();
    }
    /*
     * Trendyol üzerindeki ürününüzü barkod numarası ile sorgular ve döndürür.
    */
    public function getProductsWithBarcode($barcode = null) {
        $url = $this->baseurl . $this->supplierId . '/products?';
        if ($barcode != null) {
            $url .= '&barcode=' . $barcode;
        }
        $response = $this->guzzle->get($url);
        return $response->getBody();
    }
    /*
     * Trendyol üzerine aktardığınız üründen dönen batchRequestId ile aktarım durumunu sorguluyabilirsiniz.
    */
    public function getProductsWithBatchRequest($batchRequest) {
        $url = $this->baseurl . $this->supplierId . '/products/batch-requests/' . $batchRequest;
        $response = $this->guzzle->get($url);
        return $response->getBody();
    }

        /*onaylanmış ürün*/
    public function getFilterProductsWithApproved($approved=null) {
        $url = $this->baseurl . $this->supplierId . '/products?approved=' . $approved;
        
        $response = $this->guzzle->get($url);
        
        return $response->getBody();
    }
    /*
     * Trendyol üzerine ürün aktarımı yapmayı sağlar. Ürün formatı trendyola uygun olmalıdır.
    */
    public function updateProduct($item, $type) {
        $url = $this->baseurl . $this->supplierId . '/v2/products';
        
        //$items[] = $item;
        //$data['items'] = $items;
        //$options['body'] = json_encode($data);
        $options['body'] = $item;
        $options['headers'] = array(
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
            'Content-Type' => 'application/json'
        );
        $options['http_errors'] = false;
        $guzzle = new GuzzleHttp\Client($options);
        $client = new Client(['base_uri' =>$url,
        'timeout'  => 2.0]);
        if ($type == "create") {

            $response = $guzzle->post($url);
            
        }
        elseif ($type == "update") {
            $response = $guzzle->put($url);

            
        }
        return $response->getBody();
    }

    /*
     * Trendyol üzerinde mevcut ürününüzün sadece stok ve fiyat bilgisini güncellemenize yarar.
    */
    public function updateProductPriceAndInventory($item) {
        $url = $this->baseurl . $this->supplierId . '/products/price-and-inventory';
        //$items[] = $item;
        //$data['items'] = $items;
        $options['body'] = $item;
        $options['headers'] = array(
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
            'Content-Type' => 'application/json'
        );
        $options['http_errors'] = false;
        $guzzle = new GuzzleHttp\Client($options);
        $response = $guzzle->post($url);
        return $response->getBody();
    }
    /*
   *
   *
   * TRENDYOL SİPARİŞ ENTEGRASYONLARI
   *
   *
   * */
    /*
     * Trendyol Siparişlerini Durumlarını Döner
     */
    public function getOrderStatusWithKey($key = null) {
        $status = array(
            "Awaiting" => array("title" => "Beklemede", "class" => "text-warning fa-clock-o"),
            "Created" => array("title" => "Oluşturuldu", "class" => "text-success fa-plus-circle"),
            "Picking" => array("title" => "Paket Oluşturuluyor", "class" => "text-success fa-cube"),
            "Invoiced" => array("title" => "Fatura Hazırlanıyor", "class" => "text-success fa-file-pdf-o"),
            "Shipped" => array("title" => "Kargoda", "class" => "text-success fa-truck"),
            "Cancelled" => array("title" => "İptal Edildi", "class" => "text-danger fa-minus-circle"),
            "Delivered" => array("title" => "Teslim Edildi", "class" => "text-success fa-check-circle"),
            "UnDelivered" => array("title" => "Teslim Edilemedi", "class" => "text-danger fa-minus-circle"),
            "Returned" => array("title" => "İade Edildi", "class" => "text-info fa-minus-circle"),
            "Repack" => array("title" => "Yeniden Paketleniyor", "class" => "text-info fa-cube"),
            "UnSupplied" => array("title" => "Tedarik Edilemedi", "class" => "text-danger fa-times"),
            "ReadyToShip" => array("title" => "Kargolamaya Hazır", "class" => "text-primary fa-refresh"),
        );
        if ($key != null) {
            if (isset($status[$key])) {
                return $status[$key];
            }
            else {
                return array("title" => $key, "class" => "text-info fa-question-circle-o");
            }
        }
        else {
            return $status;
        }
    }
    

    /*
     * Trendyol Siparişlerini Getirir
     */
    //getShipmentPackages
    public function getShipmentPackages($status, $size, $startDate, $endDate, $orderByField, $orderByDirection) {
        $url = $this->baseurl . $this->supplierId . '/orders';
        $url .= '?status=' . $status;
        if ($size != null) {
            $url .= '&size=' . $size;
        }
        if ($startDate != null) {
            $url .= '&startDate=' . strtotime($startDate);
        }
        if ($endDate != null) {
            $url .= '&endDate=' . strtotime($endDate);
        }
        if ($orderByField != null) {
            $url .= '&orderByField=' . $orderByField;
        }
        if ($orderByDirection != null) {
            $url .= '&orderByDirection=' . $orderByDirection;
        }
        //echo $url;
        $response = $this->guzzle->get($url);
        return $response->getBody();
    }

    
    /** Ödeme Onayı Bekleyen Sipariş Paketlerini Çekme */
    public function getWaitingShipmentPackages($status){
        $url = $this->baseurl . $this->supplierId . '/orders?status=' . $status;
        $response = $this->guzzle->get($url);
        return $response->getBody();
    }

    /** Kargo Takip Kodu Bildirme 
     * Eğer bir sipariş iptal edilmiş ise Sipariş Paketlerini Çekme servisi kullanılıp
     * güncel paket numarasına gönderim işlemi yapılması gerekmektedir.
    */
    public function updateTrackingNumber($shipmentPackageId, $shipmentPackageStatus){
        $url = $this->baseurl . $this->supplierId . '/' . $shipmentPackageId;
        if($shipmentPackageStatus == "Cancelled"){
            $url .= '/update-tracking-number';
        }

        
        $response = $this->guzzle->put($url);
        return $response->getBody();
    }

    /** Paket Statü Bildirimi 
     * picking olanları bulup invoiced olarak çeviriyor
     * tedarike edememe -- lineID quantity status
     
    */
    public function updatePackage($status){
       
        $shipmentPackages = $this->getShipmentPackages($status, $size = 100, $startDate = null, $endDate= null, $orderByField= null, $orderByDirection= "DESC");
        
        if($shipmentPackages != null){
            $decoded = json_decode($shipmentPackages, true);
            $id=($decoded['content'][0]['id']);
            $lineID = $decoded['content'][0]['lines']['id'];

            $item ="";
            if($status == "Picking"){
                
                $item = '{
                "lines": [{
                    "lineId": null,
                    "quantity": 3
                }],
                "params": {
                    "invoiceNumber": "EME2018000025208"
                },
                "status": "Invoiced"
                }';
               
            }
            else if($status == "UnSupplied"){
                $item = '{
                    "lines": [
                      {
                        "lineId": null,
                        "quantity": 1
                      }
                    ],
                    "params": {},
                    "status": "UnSupplied"
                  }';
            }


            $decoded2 = json_decode($item, true);
                $decoded2['lines'][0]['lineId'] = $lineID;

                $url = $this->baseurl . $this->supplierId . '/shipment-packages' . '/' . $id;
            
                $options['body'] = json_encode($decoded2);
                $options['headers'] = array(
                    'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
                    'Content-Type' => 'application/json'
                );
                $options['http_errors'] = false;
                $guzzle = new GuzzleHttp\Client($options);
                $client = new Client(['base_uri' =>$url,
                'timeout'  => 2.0]);
        
                $response = $guzzle->put($url);     
        }

        return $response->getBody();
    
    }


     /** Fatura Linki Gönderme */
    public function sendInvoiceLink($json){
        $url = $this->baseurl . $this->supplierId . '/supplier-invoice-links';


        $options['body'] = json_encode($json);
        $options['headers'] = array(
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
            'Content-Type' => 'application/json'
        );
        $options['http_errors'] = false;
        $guzzle = new GuzzleHttp\Client($options);
        $client = new Client(['base_uri' =>$url,
        'timeout'  => 2.0]);
        
        $response = $this->guzzle->post($url);
        //print_r($response);
        return $response->getBody();
    }

    /** Sipariş Paketlerini Bölme */
    public function splitPackage($splitMethod){
        $url = $this->baseurl . $this->supplierId . '/shipment-packages' . '/1212';

        if($splitMethod != null){
            $url .= '/' . $splitMethod;
        }

   
        $response = $this->guzzle->post($url);
        return $response->getBody();
    }
    /** Desi ve Koli Bilgisi Bildirimi */ //??ne istiyor
    public function updateBoxInfo(){ 

        
        $shipmentPackages = $this->getShipmentPackages($status="Created", $size = 100, $startDate = null, $endDate= null, $orderByField= null, $orderByDirection= "DESC");
        $decoded_cargo = json_decode($shipmentPackages, true);
  
        $shipmentPackageId = $decoded_cargo['content'][0]['id'];
        
        $url = $this->baseurl . $this->supplierId . '/shipment-packages' . '/' . $shipmentPackageId ;
        $item ='{
          "boxQuantity": 4,
          "deci": 4.4
        }';

        $options['body'] = $item;
        $options['headers'] = array(
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
            'Content-Type' => 'application/json'
        );
        $options['http_errors'] = false;
        $guzzle = new GuzzleHttp\Client($options);
        $client = new Client(['base_uri' =>$url,
        'timeout'  => 2.0]);

        
        $response = $this->guzzle->post($url);
        return $response->getBody();
    }

    /** Barkod Talebi */
    public function createCommonLabel(){
        
        $shipmentPackages = $this->getShipmentPackages("Picking", $size = 100, $startDate = null, $endDate= null, $orderByField= null, $orderByDirection= "DESC");
        $decoded = json_decode($shipmentPackages, true);

        $cargoTrackingNumber = $decoded['content'][0]['cargoTrackingNumber'];

        $url = $this->baseurl . $this->supplierId . '/common-label' . '/' . $cargoTrackingNumber . '?format=ZPL';
        $response = $this->guzzle->post($url);
        $this->getCommonLabel($cargoTrackingNumber);
        
     }

     /** Oluşan Barkodun Alınması */
     public function getCommonLabel($cargoTrackingNumber){
       
        $url = $this->baseurl . $this->supplierId . '/common-label' . '/' . $cargoTrackingNumber;
        
        $response = $this->guzzle->get($url);
        return $response->getBody();
    }
}