<?php
$this->pageTitle=Yii::app()->name . ' - CJui AutoComplete'; 
$this->breadcrumbs=array('CJuiAutoCompleter',);
?>

<a href="http://localhost/yiidoc/CVarDumper.html" target="_blank" style="float:right">CVarDumper</a><br />

<a href="http://www.learningjquery.com/2010/06/autocomplete-migration-guide" target="_blank">a good migration guide from the author of both JavaScript solutions</a>.

<div class="view2">
<b class="badge">CJuiAutoComplete</b><br><br>
sample : type 'ac1, ac2, ac3' <br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php	
  $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
     'name'=>'nama_ID',  //as ID name
      'source'=>array('ac1', 'ac2', 'ac3'),
     // additional javascript options for the autocomplete plugin
     'options'=>array(
          'minLength'=>'2',
     ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
      ),
  ));		
?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
 <div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div> <?php Yii::app()->sc->renderSourceBox();?></div>
</div>
</div>
  
<div class="view2">
<b class="badge">AutoComplete with model</b><br><br>
sample : Call action <code>createUrl('widget/AutoComplete', array('model'=>'TblUserMysql', 'order'=>'username'))</code><br>

<?php //dump( TblUserMysql::model()->suggestUsername('ko') ); ?>
<?php //dump( TblUserMysql::model()->suggest('ko', 'username') ); ?>
<?php //dump( $this->createUrl('request/suggestUsername') ); ?>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php	
$model = new TblUserMysql;
 $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'model'=>$model,   //as ID name
	//'model'=>$model->isNewRecord ? $model : $model->Expediters,   #with relational db
	'htmlOptions'=>array('style'=>'width:110px'),
	'attribute'=>'username',
	'source'=>$this->createUrl('widget/AutoComplete', array('model'=>'TblUserMysql', 'order'=>'username')), #suggestUsername($keyword, $limit=20) @"TblUserMysql - model"
	//'source'=>$this->createUrl('widget/AutoComplete', array('model'=>'TblUserMysql')), #suggestUsername($keyword, $limit=20) @"TblUserMysql - model"
	//'source'=>$this->createUrl('request/suggestUsername'), #suggest($keyword, $order, $limit=20 )  @"MYCActiverecord -model"
	'options'=>array(      //jika ga di set nilai nya = jumlah yg diketik misal "adm" bukan "admin"
		'focus'=>"js:function(event, ui) {
			$('#".CHtml::activeId($model,'username')."').val(ui.item.value);
		}"
	),		
));		
?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
 <br>use difference ID ( biar ga bentrok ) , where set the ID at <code>name</code> or <code>model</code> :<br>
 <code>CHtml::activeId($model,'username') </code> : <?php echo CHtml::activeId($model,'username'); ?>
 
 <div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div> <?php Yii::app()->sc->renderSourceBox();?></div>
</div>

 <div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','Code Controller'); ?></div>
	<div class='scroll'> 
		<?php //$this->render_script('widget/AutoComplete');?>
		<?php
			Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
			'public function actionAutoComplete',
			'protected/components/AdminController.php'
		), false, true);
		?>
		<?php
			Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
			'protected function getModel',
			'protected/components/AdminController.php'
		), false, true);
		?>
		<?php
			Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
			'public function suggest',
			'protected/components/AdminController.php'
		), false, true);
		?>
		<?php Yii::app()->sc->renderSourceBox();?>
	</div>
</div>
 </div>
 
 <div class="view2">
<b class="badge">AutoComplete with ext XSuggestAction</b><br><br>
sample : Call action <code>$this->createUrl('request/suggestUsername')</code> using <code>'class'=>'ext.actions.XSuggestAction'</code><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php	
//$model = new TblUserMysql;
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	//'model'=>$model,
	'name'=>'apa_aja',	 //as ID name
	'htmlOptions'=>array('style'=>'width:110px'),
	'attribute'=>'username',
	'source'=>$this->createUrl('widget/suggestUsername'), #suggest($keyword, $order, $limit=20 )  @"MYCActiverecord -model"
	'options'=>array(      //jika ga di set nilai nya = jumlah yg diketik misal "adm" bukan "admin"
		'focus'=>"js:function(event, ui) {
			$('#apa_aja').val(ui.item.value);
		}"
	),		
));		
?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
 <div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div> <?php Yii::app()->sc->renderSourceBox();?></div>
</div>
	
 <div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
	<div class="scroll">
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
class RequestController extends AdminController
{
	/**
	 * @return array actions
	 */
	public function actions()
	{
		return array(
		'suggestUsername'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'TblUserMysql',
				'methodName'=>'suggestUsername', //call method at model
				'limit'=>30
			),
	 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>	
	 
	 <?php
		Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
		'public function suggestUsername',
		'protected/components/MYCActiveRecord.php'
	), false, true);
	?>
		
	  <?php Yii::app()->sc->renderSourceBox();?>
	</div>
</div>
</div>

<div class="view2">
<b class="badge"> JS rendered from widget</b><br><br>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<![CDATA[*/
jQuery(function($) {
	jQuery('#nama_ID').autocomplete({'minLength':'2','source':['ac1','ac2','ac3']});

	jQuery('#TblUserMysql_username').autocomplete({'focus':function(event, ui) {
		$('#TblUserMysql_username').val(ui.item.value);
	},
	'source':'/yii/yiiTest/index.php/widget/AutoComplete?model=TblUserMysql&order=username&language=id'});
		
	jQuery('#apa_aja').autocomplete({'focus':function(event, ui) {
		$('#apa_aja').val(ui.item.value);
	},
	'source':'/yii/yiiTest/index.php/request/suggestUsername?language=id'});
});
/*]]>
 <?php Yii::app()->sc->collect('javascript', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>	
  <?php Yii::app()->sc->renderSourceBox();?>
  </div>