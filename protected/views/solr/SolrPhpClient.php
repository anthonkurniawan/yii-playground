<h1>SOLR search engine</h1>
<pre>
TOMCAT SERVER
http://localhost:8080/

LUCANE-SOLR SERVER
http://localhost:8983/solr/

 java -jar start.jar
 http://localhost/SolrPhpClient/
http://localhost/SolrPhpClient/alternative_http_trans.php
http://localhost/SolrPhpClient/simple_form.php

test SOLR SERVER
http://localhost:8983/solr/#/collection1/query
http://localhost:8983/solr/collection1/select?q=the

TUTORIAL
file:///C:/solr-4.7.0/docs/tutorial.html

SolrPhpClient Docs
http://localhost/SolrPhpClient/phpdocs/

TAMBAHAN :
https://code.google.com/p/solr-php-client/wiki/FAQ#How_Can_I_Use_Additional_Parameters_(like_fq,_facet,_etc)
http://wiki.apache.org/solr/SimpleFacetParameters
http://www.ayalon.ch/en/code-samples/solr-php-client-example
http://wiki.apache.org/solr/Suggester
</pre>

<div class="view2">
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php
$res = Yii::app()->userSearch->get('solr',0,20); 
?>
<div class="scroll">
<?php  dump($res); ?>
</div>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

<PRE>
hello 

thanks for giving nice link but i required more help

i use

$additionalParameters = array(
								
'facet' => 'true',
'facet.range'=>'priceTot',
'facet.range.start'=>$facet_min,
'priceTot.facet.range.end'=>$facet_max,
'facet.query'=>"priceTot:[ ".$facet_min ." TO " .$facet_max." ] ",		
'facet.field' =>'priceTot',
'stats'=>'on',
'stats.field'=>'priceTot'
 );

but its not working 


my controlller seach method productsearch  first time no data if i search by Name like "Apple" 

than my facet query scroll filter of price range 0-9999 current its fix but i required dynamic base on result 


ok than i select price range 12 to 24 between data of record get by ajax query .
call of ajax ok but my query has problem not get result send same result at first time search i get 


sol please guide me .
 


Donovan Jimenez 	
7/30/13

If i understand what you want, and I'm not totally sure that I do, then I think you might have done two things wrong:
1. you used both a ranged facet and a regular facet query - i believe you're only interested in the range query
2. you forgot to specify the range gap (this establishes the size of your buckets

So... your additional parameters should probably look like this (based on http://wiki.apache.org/solr/SimpleFacetParameters#Facet_by_Range):

$additionalParameters = array(
'facet' => true,
'facet.range' => 'priceTot',
'facet.range.start' => $facet_min,
'facet.range.end' => $facet_max,
// this is your range bucket size... ie. 10, 100, 500, whatever you want  your individual price ranges to be e.g. $10-$20
// if you need it to be very dynamic, maybe you could compute it as ($facet_max - $facet_min) / $desired_number_of_buckets ?
'facet.range.gap' => $facet_gap,

'stats' => 'on',
'stats.field' => 'priceTot'
);


without a better understand of what you're looking for, this is probably the best I can help - hope it gets you to your solution.


- show quoted text -
- show quoted text -
-- 
You received this message because you are subscribed to the Google Groups "PHP Solr Client" group.
To unsubscribe from this group and stop receiving emails from it, send an email to php-solr-clie...@googlegroups.com.
To post to this group, send email to php-sol...@googlegroups.com.
Visit this group at http://groups.google.com/group/php-solr-client.
For more options, visit https://groups.google.com/groups/opt_out.
 

Upadhyay Ritesh 	
7/31/13

Hello

	$additionalParameters = array('facet' => 'true',
                                   //'q' => 'priceTot',
                                   'facet.field' =>'priceTot',
                                   'stats'=>'on',//on
                                   'stats.field'=>'priceTot',
);
this use to done my faceted range problem solved but i have onq more query how can i dyanmic facet add 

parent child relation ship node like amazon disply same type of requirement i have

so guide me 

thnks for nice support 
</PRE>

<pre>
http://sabitlabscode.wordpress.com/2012/01/08/yii-framework-membuat-index-data-pada-apache-solr/
Membuat Index Data Pada Apache Solr

JANUARY 8, 2012 BY SABIT HURAIRA 5 COMMENTS
Sebelumnya saya pernah memaparkan perkenalan dengan apache solr. Nah, sekarang saya akan menjelaskan step-step untuk melakukan index data apache solr pada 
Yii Framework. Okehh, tidak berbeda dengan menggunakan code PHP biasa kok, pertama-tama kita harus meng-include file Solr PHP Client untuk menghubungkan 
antara aplikasi kita dengan apache solr. Caranya adalah masukkan kode berikut pada controller tempat anda mengiput kode index apache solr :
Yii::import('application.tambahan.*');
require_once('SolrPhpClient/Apache/Solr/Service.php');
Yah, setelah itu buatlah setelah action tempat kita akan memasukkan kode membuat index pada apache solr. Nah, berikut kode membuat index data baru pada apache solr tersebut :
$solr = new Apache_Solr_Service('localhost', 8983, '/solr');
 if ($solr->ping())
 {
    try
    { 
       $doc = new Apache_Solr_Document();
       $doc->namaAttribute1 = 'isi attribute1';
       $doc->namaAttribute2 = 'isi attribute2';
       $solr->addDocument($doc); //Menambahkan dokumen
       $solr->commit(); //commit untuk melihat perubahan
       $solr->optimize(); //menggabungkan beberapa segmen menjadi satu sehingga efektif. 
    }
    catch(Exception $e)
    {
       echo $e->getMessage();
    }
 }
Penjelasan : pertama-tama kita mendefinisikan Apache Solr yang akan kita akses termasuk mendefinisikan port apache solr tersebut bekerja. Lalu aplikasi akan mengecek apakah sudah terhubung antara aplikasi dengan apache solr. Jika sudah terhubung, maka akan dibuat dokumen apache solr baru yang kemudian akan dimasukkan 2 buah attribute di dalamnya beserta nilainya(tidak harus 2 attirbute, ini sesuai dengan kebutuhan anda). Kemudian setelah di tambahkan attribute-attribute tersebut, maka akan disimpan sementara di variabel tersebut nilai-nilainya lalu disimpan ke dalam index file apache solr.
Nah, contoh kode yang ada di atas adalah kode untuk membuat index data baru. Apabila ingin melakukan delete index, anda dapat membuat kodenya seperti berikut :
 $solr = new Apache_Solr_Service('localhost', 8983, '/solr');
 if ($solr->ping()) 
 {
     try 
     {
        $solr->deleteByQuery('id: hhuu');
        $solr->commit();
        $solr->optimize();
     } 
     catch ( Exception $e ) 
    {
       echo $e->getMessage();
    }
 } 
else 
{
   echo "Connecting to solr failed....<br>";
}
</pre>