<?php $this->pageTitle='View - '.$model->id;?>

<?php if(isset($_GET['layout'])) $this->layout='column1_custom'; ?> <!--SET LAYOUT for fancy box (default null/set di controller)--> 

<b class="txtHead">View Data user (Custom with TbldData) :<?php echo $model->id; ?></b>
<!------------ CONTENT---------->
<div class="view2" style="width: auto">
	<div class="left">
	
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',             // title attribute (in plain text)
		'owner.name',        // an attribute of the related object "owner"
        'description:html',  // description attribute in HTML
		
		'id',
		'username',
		'password',
		array(
			'label'=>'email', 
			'type'=>'raw',
			'value'=>Yii::app()->format->formatEmail($model->email),
		),
		'first_name',
		'role',
		'TblDatas.ket',
		// OR USING LIKE THIS
		// array(              
            // 'label'=>'ket',
            // //'type'=>'raw',   #'raw', 'text', 'ntext', 'number',html, date, time, datetime, boolean, email, image, url
            // 'value'=>TblData::model()->FindByPk($model->id)->ket,
        // ),
		array( 'label'=>'picture', 'value'=>Yii::app()->baseUrl.'/upload/'.$model->TblPics["filename_ori"], ),
		
	),
	//public $itemTemplate="<tr class=\"{class}\"><th>{label}</th><td>{value}</td></tr>\n";
	'itemTemplate'=>'<tr class={class}> <th width="700px">{label}&nbsp:</th> <td>{value}</td></tr>',
	)); ?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	</div>

	<div class="left">
		<?php echo tblPic::model()->pic($model->TblPics["filename_ori"],150,150); ?><br>
	</div>
</div>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
	<?php $this->render_script(); /* from AdminController*/ ?>
</div>

<div class="clear"></div>

<p class="txtDisable">FILE :<?php echo __FILE__; ?> LAYOUT : <?php echo $this->getLayoutFile('main'); ?></p>
