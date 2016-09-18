<style> .container{width:1100px} </style>
<?php $this->layout='column2'; ?>

<a href="http://www.yiiframework.com/doc/guide/1.1/id/topics.security" target="_blank">Sumber</a>
<div class="tpanel">
	<span class="toggle"><?php echo Yii::t('ui','Load COOKIES'); ?></span>
	<pre class="txtSmall scroll_custom" style="height:200px; width:600px">
<?php print_r(Yii::app()->request->cookies); ?>
    </pre>
</div>

<pre class="txtSmall">
<b>SECURITY
1. Pecegahan Cross Site Scripting (XSS)</b>
	 $this->beginWidget('CHtmlPurifier'); ?>
	...display user-entered content here...
	$this->endWidget(); 

<b>2. Cross-Site Request Forgery (CSRF) /Pemalsuan Permintaan Situs-silang</b>
return array(
    'components'=>array(
        'request'=>array(
            'enableCsrfValidation'=>true,
        ),
    ),
);

<b>3. Pencegahan Serangan Cookie</b>
Melindungi cookie dari serangan adalah hal yang sangat penting, karena ID sesi umumnya disimpan dalam cookie. Jika seseorang memegang ID sesi, pada dasarnya dia memiliki semua informasi sesi relevan.

Ada beberapa langkah pencegahan guna menghadapi serangan terhadap cookie.

    Aplikasi bisa menggunakan SSL untuk membuat saluran komunikasi aman dan hanya mengoper cookie terotentikasi melalui koneksi HTTPS. Penyerang tidak bisa men-decipher isi dalam cookie yang ditransfer.
    Habiskan masa hidup sesi dengan benar, termasuk semua cookie dan token sesi untuk mengurangi serangan.
    Cegah cross site-scripting yang menyebabkan kode berbahaya dijalankan dalam browser pengguna dan mengekspos cookie yang dimilikinya.
    Validasi data cookie dan deteksi apakah isinya diubah.

Yii mengimplementasikan skema validasi cookie yang mencegah serangan perubahan terhadap cookie. Sebenarnya, ia melakukan pemeriksaan HMAC atas nilai cookie jika validasi cookie dihidupkan.

Validasi cookie secara default dimatikan. Untuk menghidupkannya, konfigurasi komponen aplikasi CHttpRequest dalam konfigurasi aplikasi seperti berikut,

return array(
    'components'=>array(
        'request'=>array(
            'enableCookieValidation'=>true,
        ),
    ),
);

Untuk menggunakan skema validasi cookie yang disediakan oleh Yii, kita juga harus mengakses cookie melalui koleksi cookies collection, daripada melalui $_COOKIES secara langsung:

// ambil cookie dengan nama yang ditetapkan
$cookie=Yii::app()->request->cookies[$name];
$value=$cookie->value;
......
// kirim cookie
$cookie=new CHttpCookie($name,$value);
Yii::app()->request->cookies[$name]=$cookie;
</pre>