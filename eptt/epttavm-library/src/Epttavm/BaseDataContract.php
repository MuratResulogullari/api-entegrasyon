<?php


namespace Epttavm;

use Epttavm\Exception\EpaException;

abstract class BaseDataContract
{
	private $servername = "localhost"; // Host adı
	private $username = "test";  // database kullanıcı ismi
	private $password = "R34#g9@MF5EpFx{nbFB*2x9YQ48c";  // database şifre
	private $db_name="eptt";  // database ismi 
	
	public function database()
	{
		try {
			// database bağlantısı
			$baglanti = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
			// Hata modu ayarı
			$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Baglanti basarili !";
		  } catch(PDOException $e) {
			echo "Baglanti basarisiz !: " . $e->getMessage();
		  }
	}

	static protected $_properties = [];

	protected function __construct() {}

	public static function create() {
		return new static();
	}
	

	public function __call($name, $arguments)
	{
		if (preg_match('/^set[A-Z][A-Za-z0-9]+$/',$name))
		{
			$propertyName = preg_replace('/^set([A-Z][A-Za-z0-9]+)$/', '$1', $name);
			if(!in_array($propertyName, static::$_properties))
				throw new EpaException('Invalid property name!');
			$this->{$propertyName} = $arguments[0];
			$this->_validateData();
			return $this;
		}
		print_r(static::$_properties);
		throw new EpaException(sprintf('Invalid method: %s::%s', static::class, $name));
	}

	protected function _validateData(){

	}

    

}