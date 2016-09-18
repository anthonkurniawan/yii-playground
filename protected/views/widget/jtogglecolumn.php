<?php $this->layout='column2';?>

<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('jToggleColumn',);
?>

<?php $this->renderPartial('_menuGrid'); ?>

<b class="badge"> jToggleColumn</b><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<style>
 /* grid border CUSTOM */
    .grid-view table.items th, .grid-view table.items td {
        border: 1px solid gray !important;
    } 
    /* disable selected for merged cells */     
    .grid-view td.merge {
       background: none repeat scroll 0 0 #F8F8F8; 
    }
</style>

<a href="http://jToggleColumn.demopage.ru" target="_blank">SUMBER</a>
<!-------------------------- CONTENT ---------------------------------->
<?php
 $this->widget('zii.widgets.grid.CGridView', array(
      'id' => 'tblUserMysql',
      'dataProvider'=>$model->search(),	
	  'filter'=>$model,	//form filter/search
	  'htmlOptions'=>array('style'=>'width:700px',),
      'columns' => array(
         'id','username','password','email','first_name','role' , 'active',
		 array(
         	'class'=>'jtogglecolumn',
            'name'=>'active', // boolean model attribute (tinyint(1) with values 0 or 1)
            'filter' => array('0' => 'No', '1' => 'Yes'), // filter
            'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
         ),
		 array(
         	'class'=>'JToggleColumn',
            'name'=>'active', // boolean model attribute (tinyint(1) with values 0 or 1)
            'filter' => array('0' => 'No', '1' => 'Yes'), // filter
            'action'=>'switch', // other action, default is 'toggle' action
            'checkedButtonImageUrl'=>'images/checked.png', // checked image
            'uncheckedButtonImageUrl'=>'../../protected/extensions/jtogglecolumn/images/toggle/no.png', // unchecked image
            'checkedButtonLabel'=>'No', // tooltip
            'uncheckedButtonLabel'=>'Yes', // tooltip
            'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                ),
	  	  array(
			'class'=>'CButtonColumn',
			//'class' =>'CLinkColumn',
			//'class'=>'CCheckBoxColumn',
		  ),  
	   ),  
    ));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	
<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div class='scoll'><?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?></div>
</div>
<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','Code Controller'); ?></div>
	<div class='scoll'><?php $this->render_script( array('widget/jtogglecolumn') ); ?></div>
</div>