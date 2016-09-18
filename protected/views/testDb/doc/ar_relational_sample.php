<style>.php-hl-main {font-size:90% }</style>

<b class="badge">TESTING:</b><BR />

<div class="view2">
<b class="txtHead">eager loading approach "with 2 relation"</b>

<div class="ket">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'tabSize'=>1));  ?> 
$users=TblUserMysql::model()->with('TblDatas','Logs')->find("t.id=1"); //print_r($users);
echo $users->Logs->event ."<br>";

foreach($users as $key=>$value)  { echo $value."&nbsp;,"; }
echo"<br>";
foreach($users->TblDatas as $key=>$value)  { echo $value."&nbsp;,"; }
echo"<br>";
foreach($users->Logs as $key=>$value)  { echo $value; }
<?php $this->endWidget(); ?> 
</div>

<b> Result :</b><br>
<?php 
$users=TblUserMysql::model()->with('TblDatas','Logs')->find("t.id=1"); //print_r($users);
echo $users->Logs->event ."<br>";

foreach($users as $key=>$value)  { echo $value."&nbsp;,"; }
echo"<br>";
foreach($users->TblDatas as $key=>$value)  { echo $value."&nbsp;,"; }
echo"<br>";
foreach($users->Logs as $key=>$value)  { echo $value; }
?>
</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------->
<div class="view2">
<b class="txtHead">nested eager loading</b>
<div class="ket">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'tabSize'=>1));  ?> 
$users=TblData::model()->with(
    'TblUserMysqls.TblDatas',
		'TblUserMysqls.Logs')->find("t.id=1");
foreach($users as $key=>$value) {  echo $key."&nbsp;,"; } 
foreach($users as $key=>$value) {  echo $value."&nbsp;,"; } 
echo"<br>";
foreach($users->TblUserMysqls as $key=>$value) {  print_r( $value); }
echo"<br>";
<?php $this->endWidget(); ?> 
</div>

<b> Result :</b><br>
<?php 
$users=TblData::model()->with(
    'TblUserMysqls.TblDatas',
		'TblUserMysqls.Logs')->find("t.id=1");
foreach($users as $key=>$value) {  echo $key."&nbsp;,"; } 
foreach($users as $key=>$value) {  echo $value."&nbsp;,"; } 
echo"<br>";
foreach($users->TblUserMysqls as $key=>$value) {  print_r( $value); }
echo"<br>";
//foreach($users->Logs as $key=>$value) {  print_r( $value); }
//echo"<pre>";		print_r($users); echo"</pre>";
?>
</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------->
<div class="view2">
<b class="txtHead">nested eager loading CDbCriteria::with</b>
<div class="ket">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'tabSize'=>1));  ?> 
$criteria=new CDbCriteria;
$criteria->condition='t.id=1';
$criteria->with=array(
    'TblUserMysqls.TblDatas',
		'TblUserMysqls.Logs',
);
$users=TblData::model()->findAll($criteria);

foreach($users as $key=>$value) {  echo "key ->". $key."&nbsp;,"; } 
echo"<br>"; 
foreach($users as $key=>$value) {  echo "value->"; dump($value->attributes); } 
<?php $this->endWidget(); ?> 
</div>

<b> Result :</b><br>
<?php 
$criteria=new CDbCriteria;
$criteria->condition='t.id=1';
$criteria->with=array(
    'TblUserMysqls.TblDatas',
		'TblUserMysqls.Logs',
);
$users=TblData::model()->findAll($criteria);

foreach($users as $key=>$value) {  echo "key ->". $key."&nbsp;,"; } 
echo"<br>"; 
foreach($users as $key=>$value) {  echo "value->"; dump($value->attributes); } 
?>

	<div class="tpanel"> <!--- load model ------->
		<b class="toggle txtHead" style="float:right"><?php echo Yii::t('ui','print array - dump($users);'); ?></b>
		<div class="scroll2"><?php dump($users); ?></div>
	</div>
	
<div class="ket">
<b class="txtHead"> Other sample</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'tabSize'=>1));  ?> 
$users = TblUserMysql::model()->find("t.id=1");
foreach($users->TblDatas as $key=>$value) {  echo $value."&nbsp;,"; } 
<?php $this->endWidget(); ?> 
</div>
<b> Result :</b><br>
<?php 
$users = TblUserMysql::model()->find("t.id=1");
//foreach($users as $key=>$value) {  echo $key."&nbsp;,"; } 
foreach($users->TblDatas as $key=>$value) {  echo $value."&nbsp;,"; } 
?>
	<div class="tpanel"> <!--- load model ------->
		<b class="toggle txtHead" style="float:right"><?php echo Yii::t('ui','print array - dump($users); '); ?></b>
		<pre class="scroll2"><?php dump($users); ?></pre>
	</div>
</div>

