<?php $this->layout='column2';?>
<!--
<script>
	function selectRow(target_id) {
		var id =$.fn.yiiGridView.getSelection(target_id);		alert(id);
																
		$('#id').val(id);		//kasih value berupa "id" yg di load
		$('#save_btn').attr('disabled', (id > 0 ? false : true));   //klo #save_btn id > 0 maka "enable"

		$.getJSON('<?php #echo $this->createUrl('ajax_getUser'); ?>&id='+id,
			function(data) {
				$('#username').val(data.username);
				$('#TblUserMysql_password').val(data.password);
				$('#email').val(data.email);
				$('#first_name').val(data.first_name);
				$('#role').val(data.role);
			});
	}

	function formSaved(data, textStatus, XMLHttpRequest) {
		$.fn.yiiGridView.update('user-grid');
	}
	
	function cekID() {		//alert('test');
		alert($(this).attr('name'));
	}
</script>-->

<?php echo $this->createUrl('ajax_getUser'); ?>

<?php $this->breadcrumbs=array( 'Users'=>array('index'), 'Manage', ); ?>
		
<?php
$this->menu=array(
	array('label'=>'Basic Http respose',  'url'=>array('ajax/index'), 'linkOptions'=>array('target'=>'_blank'),),
	array('label'=>'GridView With Ajax(Other Cotroller)', 'url'=>array('admin_ajax')),
	//array('label'=>'Create user', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){         
	$('.search-form').toggle();
	return false;
});				
							
$('.search-form form').submit(function(){		 alert( $(this).serialize());  //--> $(this) = $('.search-form form')
	$.fn.yiiGridView.update('user-grid', {   
		data: $(this).serialize()  //--->  string text( r=userMysql%2Fadmin&TblUserMysql%5Bid%5D=1&.....)
		//data:'r=userMysql/admin&TblUserMysql%5Bid%5D=1'  //ajax=user-grid2id=2r=userMysql/admin
		//data:'TblUserMysql[id]=1' //BUAT TEST
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('selectRow', "
function selectRow(target_id) {
	var id =$.fn.yiiGridView.getSelection(target_id);		alert(id);
																
	$('#id').val(id);		//kasih value berupa 'id' 
	$('#save_btn').attr('disabled', (id > 0 ? false : true));   //klo #save_btn id > 0 maka 'enable'
	var Dtype = $('#dataType').val();
	
	$.getJSON( 
		'/yii/yiitest/index.php/ajax/ajax_getUser?language=id&id=' + id +'&tipe=' + Dtype ,
		function(data) {
			$('#username').val(data[0].username);
			$('#TblUserMysql_password').val(data[0].password);
			$('#email').val(data[0].email);
			$('#first_name').val(data[0].first_name);
			$('#role').val(data[0].role);

			var items = [];
			items.push( JSON.stringify(data[0]) +'<br>' );
			$.each(data[0], function(key, val) {
				items.push(key + '=' + val + '<br>' ); 
			});			
			$('#get_data_json').html( items);
				
			// $('<ul/>', {
				// 'class': 'my-new-list',
				// html: items.join('')
				// }).appendTo('body');
		});
}

/*Save Button*/
function formSaved(data, textStatus, XMLHttpRequest) {
	$.fn.yiiGridView.update('user-grid');
}
	
function cekID() {		//alert('test');
	alert($(this).attr('name'));
}

");
?>

<h1>GridView With Ajax (load data from CJSON)</h1>
<!----------------------------- search-form --------------------->
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('gridView/_search',array('model'=>$model, )); ?>
</div>

<!----------------------------- TABLE LIST ----------------------------->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	//'selectionChanged'=>'selectRow',   //** ON CHANGE SELECT ROW TABLE (FROM 
	'selectionChanged'=>'selectRow', // JALANKAN FUNGSI INI "selectRow"
	'filter'=>$model,	//form filter/search
	'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		//'id:html'=>array('name'=>'id', 'type'=>'raw', 'value'=>'CHtml::checkBox("id",$data->id,array("id"=>"id_".$data->id))'),
		array(
			'class'=>'CButtonColumn',
			//'class'=>'CCheckBoxColumn',
		),
	),
)); ?>

<?php 
echo Chtml::dropDownList('dataType', 'json', array('html'=>'html', 'json'=>'json', 'xml'=>'xml', 'jsonp'=>'jsonp', 'text'=>'text', 'script'=>'script'), 
array(
	'id'=>'dataType',
	'onchange'=>"fetch()",
	//'class'=>'change_view',   //call registered class (optional)
));
?>
Data Type 
<br>
<!------------------------- Target Form Update Ajax Load------------------------->
<span class="labe">Data respon from CJSON :</span><div id="get_data_json" class="ket"></div>

<div id="reqData">klik salah satu row datanya bisa di update disini..</div>

<!-------------------------------------------- Render Partial form Update Ajax----------------------------------------------------------------->
<?php echo $this->renderPartial('gridView2/_form_ajax', array('model'=>$model));  ?>


<!----------------------------------------------------------------- VIEW CODE ----------------------------------------------------------------->
<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>1));  ?> <!---Code view-->
# load datanya dari sini saat pilih satu row data by id and send BACK by JSON
	public function actionajax_getUser() {
		$item_id =(int)$_GET['id'];

		$model =TblUserMysql::model()->findByPk($item_id);     
												
		$res =array(
			//'c_date'=>Yii::app()->lc->toLocal($model->c_date, 'date', 'small'),
			'username'=>$model->username,
			'password'=>$model->password,
			'email'=>$model->email,
			'first_name'=>$model->first_name,
			'role'=>$model->role,
		);
		echo CJSON::encode($res);
	}	
	
#	Scripts Call Ajax
Yii::app()->clientScript->registerScript('selectRow', "
function selectRow(target_id) {
		var id =$.fn.yiiGridView.getSelection(target_id);		alert(id);
																
		$('#id').val(id);		//kasih value berupa 'id' yg di load
		$('#save_btn').attr('disabled', (id > 0 ? false : true));   //klo #save_btn id > 0 maka 'enable'

		$.getJSON( 
			'/HTDOCS/yiiProject/yiitest/index.php/ajax/ajax_getUser?language=id&id=' +id ,
			function(data) {
				$('#username').val(data.username);
				$('#TblUserMysql_password').val(data.password);
				$('#email').val(data.email);
				$('#first_name').val(data.first_name);
				$('#role').val(data.role);
				
				var items = [];
		
				 $.each(data, function(key, val) {
					items.push(key + '=' + val + '<br>' ); 
				});			
				$('#get_data_json').html( items);
				
				// $('<ul/>', {
					// 'class': 'my-new-list',
					// html: items.join('')
				// }).appendTo('body');
			});
	}
	/* ---------------------Save Button -------------------*/
	function formSaved(data, textStatus, XMLHttpRequest) {
		$.fn.yiiGridView.update('user-grid');
	}
	
	function cekID() {		//alert('test');
		alert($(this).attr('name'));
	}

");
	<?php $this->endWidget(); ?>
</div>
