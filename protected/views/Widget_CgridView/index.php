<?php $this->layout="column2"; ?>
<?php 
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('Cgrid View', ); 
?>
	
<?php $this->renderPartial('/Widget_CgridView/_menu'); ?>
	
<a href="http://localhost/yiidoc/CGridView.html" target="_blank" style="float:right">CGridView - DOKUMENTASI</a><br>
<b class="badge">CGridView</b><br>

<div class="ket">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'title',          // display the 'title' attribute
        'category.name',  // display the 'name' attribute of the 'category' relation
        'content:html',   // display the 'content' attribute as purified HTML
        array(            // display 'create_time' using an expression
			'header'=>'Create Time',
            'name'=>'create_time',
            'value'=>'date("M j, Y", $data->create_time)',
			'footer'=>'text footer',
        ),
        array(            // display 'author.username' using an expression
            'name'=>'authorName',
            'value'=>'$data->author->username',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
        ),
    ),
));
<?php $this->endWidget(); ?>
</div>
	
<div class="ket">
<b class="txtHead"> Beberapa contoh method pengambilan data column pada gridview</b><br>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
#with function on controller
'value' => array($this,'gridProductCategories')

#So I just changed this to use closure (or anonimous function)!!!

'value' => function () {
      return "Whatever you want"; // it works both with echo and return
}

#or if you need to use some widget could be:

'value' => function () {
      Yii::app()->controller->widget(...);
}

#If you just want to render the data you can also use render partitial diretly this way

'value'=>'$this->grid->getOwner()->renderPartial(\'tableviews/_column_view\',array(\'data\'=>$data),true)',

<?php $this->endWidget(); ?>
</div>

