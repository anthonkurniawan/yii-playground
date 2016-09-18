<style>.php-hl-main {font-size:90% }</style>

<div style="clear:both"></div>   

<div class="ket">
<b class="txtHead">Contoh Query Builder : </b><br />
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$sql = Yii::app()->db->createCommand()
  ->select('t.id, username, email, ket')	
  ->from('tbl_user_mysql t')	
  ->where('active=:active', array(':active'=>1))
  //->selectDistinct()	
  ->join('tbl_data t2', 't.id=t2.id')  
  //->leftJoin()		
  //->rightJoin()		
  //->crossJoin()		
  //->naturalJoin()		
  ->order('t.id')	
  ->group('t.id');		
  //->having()		
  //->limit(1);		
  //->offset()		
  //->union();		
<?php $this->endWidget(); ?>

<b class="txtHead">Contoh HASIL, Pengambilan dan Update Parameter  : </b><br />
<?php
		$sql = Yii::app()->db->createCommand()
    ->select('t.id, username, email, ket')	//menentukan bagian SELECT pada query (default='*')
    ->from('tbl_user_mysql t')	//menentukan bagian FROM pada query
		//->where('id=:id1 or id=:id2', array(':id1'=>1, ':id2'=>2))	//menentukan bagian WHERE pada query
		->where('active=:active', array(':active'=>1))
    //->selectDistinct()	//menentukan bagian SELECT pada query serta mengaktifkan flag DISTINCT
		->join('tbl_data t2', 't.id=t2.id')  //menambah pecahan query inner join($table, $conditions, $params=array())
    //->leftJoin()		//menambah pecahan left query left outer join
    //->rightJoin()		//menambah pecahan query right outer join
    //->crossJoin()		//menambah pecahan query cross join
    //->naturalJoin()		//menambah pecahan query natural join
		->order('t.id')	//menentukan bagian ORDER BY pada query
    ->group('t.id');		//menentukan bagian GROUP BY pada query
    //->having()		//menentukan bagian HAVING pada query
    //*->limit(1);		//menentukan bagian LIMIT pada query
    //->offset()		//menentukan bagian OFFSET pada query
    //->union();		//menentukan bagian UNION pada query
		
		//->query();	//jalankan query
		//->execute(); //exec query
    //->text;

		echo "<b>(Hasil) print_r(sql->queryAll(): </b> <pre class='res'>"; print_r($sql->queryAll()); echo"</pre><br>";
		echo "<b>(Get) echo sql->text : </b> <pre class='res'>". $sql->text ."</pre><br>";
		echo "<b>(Get) echo sql->select : </b> <pre class='res'>". $sql->select ."</pre><br>";
		echo "<b>(Get) echo sql->params : </b><pre class='res'>"; print_r($sql->params); echo"</pre><br>";
		echo "<b>(Get) echo sql->PdoStatement : </b><pre class='res'>"; print_r($sql->PdoStatement); echo"</pre><br>";
?>

<b class="txtHead">Update Parameter  : </b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>  
		$sql->where('active=:active', array(':active'=>0));
<?php $this->endWidget(); ?>

<b class="txtHead">Hasil  : </b><br />
<?php		
		$sql->where('active=:active', array(':active'=>0)); //rubah kondisi SQL
		echo "<b>echo sql->where : </b> <pre class='res'>". $sql->where ."</pre><br>";
		echo "<b>print_r(sql->queryRow(): </b> <pre class='res'>"; print_r($sql->queryRow()); echo"</pre><br>";
?>
</div>
<div style="clear:both"></div>    