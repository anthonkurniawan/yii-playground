<style>.php-hl-main {font-size:90% }</style>

<div class="ket">
<b class="txtAtt">Catatan: Query builder tidak bisa digunakan untuk memodifikasi query yang sudah ada sebagai statement SQL. Misalnya, code berikut tidak akan berjalan:</b>
				<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
    				$command = Yii::app()->db->createCommand('SELECT * FROM tbl_user');
    				// baris berikut tidak akan menambahkan WHERE ke klausa SQL di atas.
   				 $command->where('id=:id', array(':id'=>$id));
				<?php $this->endWidget(); ?>
	Oleh karena itu, jangan campur penggunaan SQL biasa dengan query builder.<br />

<b class="txtHead2"> Langkah2 : </b>
<ul class="txtHead">
<li>Mempersiapkan Query Builder</li>
<li>Membangung Query Penarik Data</li>
<li>Membuat Query Manipulasi Data</li>
<li>Membuat Query Manipulasi Schema</li>
</ul>
    
<ul>
 <li><b class="txtHead">1. Mempersiapkan Query Builder</b></li>
  <b class="txtKet">$command = Yii::app()->db->createCommand();</b> kemudian melakukan pemanggilanpada <b class="txtKet">CDbConnection::createCommand()</b> untuk membuat instance command yang diperlukan.
  <li><b class="txtHead">2. Membangung Query Penarik Data </li>
  <b class="txtHead2">Query penarik data merujuk pada statement SELECT pada SQL. Query builder menyediakan sekumpulan method untuk membangun bagian dari statement SELECT.<br /> DIkarenakan semua method ini mengembalikan instance CDbCommand, kita dapat memanggil mereka dengan menggunakan method chaining, seperti pada contoh di awal.
  	<ul>
    <li><b class="txtKet">select($columns='*'):</b> menentukan bagian SELECT pada query</li>
    	<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT'));  ?> 
    	select()
			select('id, username')
			select('tbl_user.id, username as name')
			select(array('id', 'username'))
			select(array('id', 'count(*) as num'))
			<?php $this->endWidget(); ?>
    <li><b class="txtKet">selectDistinct($columns):</b> menentukan bagian SELECT pada query serta mengaktifkan flag DISTINCT</li>
    cth : selectDistinct(id,username')`
    <li><b class="txtKet">from($tables):</b> menentukan bagian FROM pada query</li>
    	<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT'));  ?> 
   		 from('tbl_user')
			// FROM `tbl_user` `u`, `public`.`tbl_profile` `p`
			from('tbl_user u, public.tbl_profile p')
			// FROM `tbl_user`, `tbl_profile`
			from(array('tbl_user', 'tbl_profile'))
			// FROM `tbl_user`, (select * from tbl_profile) p
			from(array('tbl_user', '(select * from tbl_profile) p'))
			<?php $this->endWidget(); ?>
    <li><b class="txtKet">where($conditions, $params=array()):</b> menentukan bagian WHERE pada query</li>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT'));  ?> 
		where('id=1 or id=2')
		// WHERE id=:id1 or id=:id2
		where('id=:id1 or id=:id2', array(':id1'=>1, ':id2'=>2))
		// WHERE id=1 OR id=2
		where(array('or', 'id=1', 'id=2'))
		// WHERE id=1 AND (type=2 OR type=3)
		where(array('and', 'id=1', array('or', 'type=2', 'type=3')))
		// WHERE `id` IN (1, 2)
		where(array('in', 'id', array(1, 2))
		// WHERE `id` NOT IN (1, 2)
		where(array('not in', 'id', array(1,2)))
		// WHERE `name` LIKE '%Qiang%'
		where(array('like', 'name', '%Qiang%'))
		// WHERE `name` LIKE '%Qiang' AND `name` LIKE '%Xue'
		where(array('like', 'name', array('%Qiang', '%Xue')))
		// WHERE `name` LIKE '%Qiang' OR `name` LIKE '%Xue'
		where(array('or like', 'name', array('%Qiang', '%Xue')))
		// WHERE `name` NOT LIKE '%Qiang%'
		where(array('not like', 'name', '%Qiang%'))
		// WHERE `name` NOT LIKE '%Qiang%' OR `name` NOT LIKE '%Xue%'
		where(array('or not like', 'name', array('%Qiang%', '%Xue%')))
			
		**Perhatikan bahwa ketika menggunakan operator like, kita harus menentukan karakter wildcard secara eksplisit (seperti % dan _) . 
		JIka polanya **berasal dari input user, maka kita harus menggunakan code berikut untuk escape karakter spesial guna menghindarinya 
		dianggap sebagai wildcard:
		$keyword=$_GET['q'];
		// escape % and _ characters
		$keyword=strtr($keyword, array('%'=>'\%', '_'=>'\_'));
		$command->where(array('like', 'title', '%'.$keyword.'%'));
		<?php $this->endWidget(); ?>
    <li><b class="txtKet">join():</b> menambah pecahan query inner join</li>
    <li><b class="txtKet">leftJoin():</b> menambah pecahan left query left outer join</li>
    <li><b class="txtKet">rightJoin():</b> menambah pecahan query right outer join</li>
    <li><b class="txtKet">crossJoin():</b> menambah pecahan query cross join</li>
    <li><b class="txtKet">naturalJoin():</b> menambah pecahan query natural join</li>
    <li><b class="txtKet">	join(): menambah pecahan query inner join</li>
			<ul><li>function join($table, $conditions, $params=array())</li>
			<li>function leftJoin($table, $conditions, $params=array())</li>
			<li>function rightJoin($table, $conditions, $params=array())</li>
			<li>function crossJoin($table)</li>
			<li>function naturalJoin($table)</li></ul>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT'));  ?> 
		// JOIN `tbl_profile` ON user_id=id
		join('tbl_profile', 'user_id=id')
		// LEFT JOIN `pub`.`tbl_profile` `p` ON p.user_id=id AND type=1
		leftJoin('pub.tbl_profile p', 'p.user_id=id AND type=:type', array(':type'=>1))
		<?php $this->endWidget(); ?>
    <li><b class="txtKet">group($columns):</b> menentukan bagian GROUP BY pada query</li>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT'));  ?> 
		// GROUP BY `name`, `id`
		group('name, id')
		// GROUP BY `tbl_profile`.`name`, `id`
		group(array('tbl_profile.name', 'id')
		<?php $this->endWidget(); ?>
    <li><b class="txtKet">having($conditions, $params=array()):</b> menentukan bagian HAVING pada query</li>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT'));  ?> 
		// HAVING id=1 or id=2
		having('id=1 or id=2')
		// HAVING id=1 OR id=2
		having(array('or', 'id=1', 'id=2'))
		<?php $this->endWidget(); ?>
    <li><b class="txtKet">order($columns):</b> menentukan bagian ORDER BY pada query</li>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT'));  ?> 
		order('name, id desc')
		order(array('tbl_profile.name', 'id desc'))
		<?php $this->endWidget(); ?>
    <li><b class="txtKet">limit($limit, $offset=null):</b> menentukan bagian LIMIT pada query</li>
    <li><b class="txtKet">offset($offset):</b> menentukan bagian OFFSET pada query</li>
	Method limit() dan offset() menentukan bagian OFFSET dan LIMIT pada query. Perhatikan bahwa beberapa DBMS mungkin tidak mendukung <br>sintaks LIMIT dan OFFSET. Pada kasus tersebut, Query Builder akan menulis ulang seluruh statement SQL untuk mensimulasi fungsi limit dan offset.
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT'));  ?> 
		limit(10)
		// LIMIT 10 OFFSET 20
		limit(10, 20)
		// OFFSET 20
		offset(20)
		<?php $this->endWidget(); ?>
    <li><b class="txtKet">union($sql):</b> menentukan bagian UNION pada query</li>
		cth : union('select * from tbl_profile')
	
</ul>
 </div>
