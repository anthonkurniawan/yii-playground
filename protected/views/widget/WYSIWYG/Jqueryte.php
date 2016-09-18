<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - XHeditor'; 
$this->breadcrumbs=array('groupgridview',);
$this->renderPartial('WYSIWYG/_menu');
?>

<h1>Jqueryte</h1>

<div class="flash-error">
 * Jqueryte extends CInputWidget and implements a base class for a jqueryte jQuery plugin. <br>
 * more about Jqueryte can be found at http://jqueryte.com/
 </div>
 
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php 
	$model = new TblUserMysql;
	
	$this->widget('ext-coll.WYSIWYG_EDITOR.jqueryte.Jqueryte', array(
		'id'=>'contrl',
		'model'=>$model,
		'attribute'=>'username',
		'value'=>$model->username,
		'options'   => [
			'strike'=> false,
			'sub'=>false,
			'source'=>false,
			'button'=>'SEND',  // kaga nongol
			//'format'=>false,
			'formats'=>[["p","Paragraph"],["h1","My Head 1"]],
			'fsizes'=>["10", "15", "20"],   
			'linktypes'=>["Web URL", "E-mail", "Picture"],
		],
	));
?>

  <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

	<div class="pull-right">
		<span class="badge badge-info" onClick="js:$(this).siblings().slideToggle(); ">show code</span>
		<!--<span class="pull-right" onClick="js:$(this).siblings().slideToggle(); ">show code</span> -->
		<div style="display:none"><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>