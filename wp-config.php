<?php
/**
 * WordPress için taban ayar dosyası.
 *
 * Bu dosya şu ayarları içerir: MySQL ayarları, tablo öneki,
 * gizli anahtaralr ve ABSPATH. Daha fazla bilgi için
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php düzenleme}
 * yardım sayfasına göz atabilirsiniz. MySQL ayarlarınızı servis sağlayıcınızdan edinebilirsiniz.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri sunucunuzdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define( 'DB_NAME', 'parisgez' );

/** MySQL veritabanı kullanıcısı */
define( 'DB_USER', 'parisgez' );

/** MySQL veritabanı parolası */
define( 'DB_PASSWORD', 'paris225522' );

/** MySQL sunucusu */
define( 'DB_HOST', 'localhost' );

/** Yaratılacak tablolar için veritabanı karakter seti. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define('DB_COLLATE', '');

/**#@+
 * Eşsiz doğrulama anahtarları.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{!y]npg9$G:L#sz6IyJq#-!j]a;.)cSwCO^2vu2; 0k:Ng6D6:=^F_7Ylupil8&p' );
define( 'SECURE_AUTH_KEY',  '?A<fbiQ%->p:11vnvEU1:rB4)N.Tl>=)Htg<g27FCR;*kuiyZ5r7&-fr|sRblBG_' );
define( 'LOGGED_IN_KEY',    '_CGKTQ~4V}E4u$Rq2)RYmL8|~QU.QPH>1?3,6XYQ=k?Cco0qsD<~~MXP ]cPcGMU' );
define( 'NONCE_KEY',        'F7g/,UAq*n[jPBS/y2yU.F miT.rEcoTv9c:C7jz3t6RI|kcr.c8qAhq<oLsm!-C' );
define( 'AUTH_SALT',        '<u)LlD5!SAP!yxy45f6=`|}hjF,3&*<X, /@oi*d-| ,0*cr7k(w4i7EX[/Apu8w' );
define( 'SECURE_AUTH_SALT', '1)3[*VBY!Gtpg+?@U)>eHKa7ey3Po$S)hVJu^|]8d)a?W=ZcaN6=[9CS>v<-R^JO' );
define( 'LOGGED_IN_SALT',   ' yOmNKlC3F>Ev%f6vC92o ?UuUxZ ZM= J<A>wSP9l0.twptP05tFd(.vR_(-a;3' );
define( 'NONCE_SALT',       'W(e]p2[4F:tln~Cp[jza14~YW+dV^kF.#XV{nh[0 hlK_FnZV1&MRm&WMT9)Av!m' );
/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 */
define('WP_DEBUG', false);

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** WordPress değişkenlerini ve yollarını kurar. */
require_once(ABSPATH . 'wp-settings.php');
