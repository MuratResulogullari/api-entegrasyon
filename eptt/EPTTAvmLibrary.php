<?php
	require('epttavm-library/vendor/autoload.php');

	use Epttavm\ApiClient;
	use Epttavm\Exception\EpaException;
	use Epttavm\KayitDurum;
	use Epttavm\StokKontrolDetay;
	use Epttavm\Variants;


	/**
	 * EPTTAvm - Integration Library
	 */
	class EPTTAvm
	{

		/**
		 * @var string Soap WSDL Url
		 */
		private $wsdlUrl = 'https://ws.epttavm.com:83/service.svc/service?wsdl';
		private $servername = "localhost"; // Host adı
		private $username = "test";  // database kullanıcı ismi
		private $password = "R34#g9@MF5EpFx{nbFB*2x9YQ48c";  // database şifre
		private $db_name="eptt";  // database ismi 

		/**
		 * @var object Contains Username and Password
		 */
		private $auth;

		/**
		 * @var object Options Object
		 */
		private $opts;

		/**
		 * @var ApiClient SoapApiClient
		 */
		private $apiClient;

		/**
		 * Set Options Method
		 * @param string $user 
		 * @param string $pass 
		 * @param array $opts 
		 * @return null
		 */
		function __setOptions($user,$pass,$opts = array()) {
			$this->auth = new stdClass();
			$this->auth->user = $user;
			$this->auth->pass = $pass;

			$this->opts = new stdClass();
			$this->opts->debug = isset($opts['debug']) ? $opts['debug'] : false;
			$this->opts->showerrors = isset($opts['showerrors']) ? $opts['showerrors'] : false;

			$this->_connect();
		}
		/**
		 * Database baglantisi
		 */
		public function database($servername,$db_name,$username, $password)
		{
			try {
				
				$baglanti = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);// database bağlantısı
				$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Hata modu ayarı
				echo "Baglanti basarili !";
			  } catch(PDOException $e) {
				echo "Baglanti basarisiz !: " . $e->getMessage();
			  }
		
		}

		/**
		 * Try Connection
		 * @return mixed
		 */
		public function _connect() {
			try {
				$this->apiClient = ApiClient::init($this->wsdlUrl,$this->auth->user,$this->auth->pass, ['debug' => $this->opts->debug]);
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}

		/**
		 * Get EPTTAvm Category List
		 * @return mixed
		 */
		public function KategoriListesi() {
			try {
				$getData = $this->apiClient->KategoriListesi();
				return $getData->KategoriListesiResult->KategoriDetay;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}
		public function GetMainCategories() {
			try {
				$getData = $this->apiClient->GetMainCategories();
				return $getData->GetMainCategoriesResult->main_category;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}
		public function GetCategory($id) {
			try {
				$data = (object)array(
					'id' => $id
				);
				$getData = $this->apiClient->GetCategory($data);
				return $getData->GetCategoryResult->category;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}
		public function GetCategoryTree($parent_id) {
				try {
					$data = (object)array(
						'parent_id' => $parent_id
						
					);
				$getData = $this->apiClient->GetCategoryTree($data);
				return $getData->GetCategoryTreeResult->category_tree;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}
		
		
		/**
		 * Get EPTTAvm Sub Category List
		 * @return mixed
		 */
		public function AltKategoriListesi() {
			try {
				$getData = $this->apiClient->AltKategoriListesi();
				return $getData->AltKategoriListesiResult->AltKategoriDetay;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}

		/**
		 * Control Barcode 
		 * @param string $barcode Ürün Barkodu
		 * @param int $shopID Tedatikçi [Mağaza] ID Numarası
		 * @return mixed
		 */
		public function BarkodKontrol($barcode,$shopID) {
			try {
				$data = (object)array(
					'Barkod' => $barcode,
					'ShopId' => $shopID
				);
				$getData = $this->apiClient->BarkodKontrol($data);
				return $getData->BarkodKontrolResult;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}

		/**
		 * Multiple Stock Search
		 * @param int $shopID Tedatikçi [Mağaza] ID Numarası
		 * @param int $categoryID Kategori ID
		 * @param int $subCategoryID Alt Kategori ID
		 * @param string $productName Ürün Adı
		 * @param string $barcode Ürün Barkodu
		 * @param int $status Aktiflik Durumu [0: All, 1: Active, 2: Passive]
		 * @param int $own Mevcut Olup Olmadığı [0: All, 1: Active, 2: Passive]
		 * @return mixed
		 */
		public function StokKontrolListesi($shopID = 0,$categoryID = 0,$subCategoryID = 0,$productName = '',$barcode = '',$status = 0,$own = 0) {
			try {
				$data = new stdClass();
				if ($shopID !== 0) $data->ShopId = $shopID;
				if ($categoryID !== null) $data->SearchKategoriId = $categoryID;
				if ($subCategoryID !== null) $data->SearchAltKategoriId = $subCategoryID;
				if ($productName !== null) $data->SearchUrunAdi = $productName;
				if ($barcode !== null) $data->SearchBarkod = $barcode;
				if ($status !== null) $data->SearchAktifPasif = $status;
				if ($own !== null) $data->SearchMevcut = $own;
				$getData = $this->apiClient->StokKontrolListesi($data);
				return $getData->StokKontrolListesiResult->StokKontrolDetay;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}

		/**
		 * Control Orders
		 * @param datetime $beginDate 
		 * @param datetime $endDate 
		 * @param int $isActive [0: Tüm Siparişler, 1: Ödemesi Alınmış Fakat Tedarikçi Tarafından Hazırlanmamış Siparişler]
		 * @return mixed
		 */
		public function SiparisKontrolListesiV2($beginDate,$endDate,$isActive = 0) {
			try {
				$data = (object)array(
					'TarihiBas' => $beginDate,
					'TarihiBitis' => $endDate,
					'AktifSiparisler' => $isActive
				);
				$getData = $this->apiClient->SiparisKontrolListesiV2($beginDate,$endDate,$isActive);
				return $getData;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}

		/**
		 * Update Stock Price,Quantity,TaxRate....
		 * @param StokKontrolDetay $data
		 * > Required : ShopId , Barkod
		 * > Changeables : Fiyat , Miktar , KDV Oranı , Iskonto
		 * @return mixed
		 */
		public function StokFiyatGuncelleV3(StokKontrolDetay $data) {
			try {
				$getData = $this->apiClient->StokFiyatGuncelleV3($data);
				return $getData;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}

		/**
		 * 
		 * @param StokKontrolDetay $data
		 * > Required : ShopId , Barkod
		 * > Changeables : Fiyat , Miktar , KDV Oranı , Iskonto , BoyX , BoyY , BoyZ , Ağırlık , Aktif
		 * @return mixed
		 */
		public function StokGuncelleV2(StokUrun $data) {
			try {
				$getData = $this->apiClient->StokGuncelleV2($data);
				return $getData;
			} catch (EpaException $e) {
				$this->onError($e->getMessage());
				return false;
			}
			return true;
		}

		/**
		 * Check User & Password Confirmation
		 * @return bool
		 */
		public function _checkConnect() {
			try {
				$this->apiClient->KategoriListesi();
				return true;
			} catch (EpaException $e) {
				if (strpos($e->getMessage(), 'Gecersiz kullanici adi veya sifre') > 0)
					return false;
			}
			return false;
		}

		/**
		 * On Error Method - Show's Error
		 * @param type $errMsg 
		 * @return type
		 */
		private function onError($errMsg) {
			if ($this->opts->showerrors === true) {
				echo $errMsg."<br>";
			}
		}
       
	
	}