<?php $this->pageTitle='CTabView'; ?>
<?php $this->breadcrumbs=array('CTabView',);?>


<div class="view2">
	<b class="badge">CTabView</b><br>
	<a href="http://localhost/yiidoc/CTabView.html" target="_blank" style="float:right">CTabView</a><br />
	
	<b>Each tab definition is an array of the following structure:</b>
	<ul>
	<li>title: the tab title.</li>
	<li>content: the content to be displayed in the tab.</li>
	<li>view: the name of the view to be displayed in this tab. The view will be rendered using the current controller's
		<a href="CController.html#renderPartial">CController::renderPartial</a> method. When both 'content' and 'view' are specified, 'content' will take precedence.
	</li>
	<li>url: a URL that the user browser will be redirected to when clicking on this tab.</li>
	<li>data: array (name=&gt;value), this will be passed to the view when 'view' is specified.</li>
	</ul>
	
	<b> Sample :</b><br>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$this->widget('CTabView', array(
		'tabs'=>array(
			'tab1'=>array(
				'title'=>'tab 1 title',
				'view'=>'CTabView/_view1',
				//'data'=>array('model'=>$model),
			),
			'tab2'=>array(
				'title'=>'tab 2 title',
				'view'=>'CTabView/_view2',
				//'data'=>array('model'=>$model),
			),
			'tab3'=>array(
				'title'=>'yii-playground site',
				'url'=>'http://localhost/yii/demos/Yii-Playground/index.php/en',
			),
		),
	));
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>