<?php
	
	namespace Epttavm;
	use Epttavm\Exception\EpaException;


	/**
	 * @method StokUrun setUrunId(int $urunId)
	 * @method StokUrun setUrunId(int $urunId)
	 * @method StokUrun setUrunId(int $urunId)
	 * @method StokUrun setUrunId(int $urunId)
	 * @method StokUrun setUrunId(int $urunId)
	 * @method StokUrun setUrunId(int $urunId)
	 */

	class StokUrun extends BaseDataContract {
		static protected $_properties = [
			'UrunId',
			'ShopId',
			'KDVOran',
			'Fiyat',
			'Miktar',
			'BoyX',
			'BoyY',
			'BoyZ',
			'Iskonto',
			'Agirlik',
			'Aktif'
		];
	}