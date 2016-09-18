<?php $this->layout='column2';?>			
MASIH ADA KURANG (SETELAH DATA DI UPDATE GA BISA AUTO REFRESH GRID)<BR>
<?php
$this->pageTitle="CGridView ajax load";
$this->breadcrumbs=array('Users'=>array('index'),'Manage', );

$this->menu=array(
	array('label'=>'GridView With Ajax(CJSON)',  'url'=>array('admin_ajax2')),
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
		//data:'TblUserMysql[id]=1'
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('test_load', "
function selectRow(target_id) {   
	var id =$.fn.yiiGridView.getSelection(target_id);	   alert(id);
		
	jQuery.ajax({
		url:'/yii/yiitest/index.php/ajax/update?language=id&id=' +id,
		'success':function(html){ jQuery('#reqData').html(html) },
	}); 
}

function formSaved(data, textStatus, XMLHttpRequest) {		alert('test');
		//$.fn.yiiGridView.update('user-grid');
	}
");
?>

<h1>GridView With Ajax Load</h1>
(submit to "action update" and back to current/refresh the page )<br>
<ul>
<li> bisa dgn pake <code>$ajax()</code> </li>
<li> bisa dgn pake <code>new XMLHttpRequest();</code> </li>
</ul>
<span class="label">NOTE : jangan pake fungsi JS dgn define sperti biasa, pakailah dgn <code>Yii::app()->clientScript->registerScript(...)</code> </span>
<br />

<!----------------------------- search-form --------------------->
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('gridView/_search',array( 'model'=>$model, )); ?>
</div>


<!----------------------------- TABLE LIST ----------------------------->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'selectionChanged'=>'selectRow',   //** ON CHANGE SELECT ROW TABLE
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
	'afterAjaxUpdate'=>'function(){			alert("test");
		//$style;  //register di atas
	}',
)); ?>

<div id="reqData">klik salah satu row datanya bisa di update disini..</div>

<?php //echo $this->renderPartial('gridView/update', array('model'=>$model)); ?>

<!------------------------------------------ USING XMLHttpRequest() ---------------------------------------------------->
<!--
<script type="text/javascript">
function selectRow(target_id) {   //alert('test');
	var id =$.fn.yiiGridView.getSelection(target_id);	   alert(id);
	//test
	xmlhttp=new XMLHttpRequest();  
	xmlhttp.onreadystatechange=function() {
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
    		document.getElementById("reqData").innerHTML=xmlhttp.responseText;   //respon to server (other:responseXml)
			//document.getElementById("div_header").innerHTML=xmlhttp.getAllResponseHeaders();
    	}
 	}
	//xmlhttp.open("GET","http://localhost/TESTING/DATABASE_FUNC/mysql_con.php",true); //*pake url jg bisa
	//xmlhttp.open("GET","../../DATABASE_FUNC/mysql_con.php",true); //Asynchronous=true
	xmlhttp.open("GET",'<?php #echo $this->createUrl('update'); ?>&id='+ id,true);
	xmlhttp.send();
		
	}
</script>-->
<?php echo $this->createUrl('update'); ?>

<!----------------------------------------------------------------- VIEW CODE ----------------------------------------------------------------->
<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	#The Grid-------------------------------------------------------------------------------------------------------
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'user-grid',
		'dataProvider'=>$model->search(),
		'selectionChanged'=>'selectRow',   //** ON CHANGE SELECT ROW TABLE
		'filter'=>$model,	//form filter/search
		'columns'=>array( ...)
		..............................
	));
	
	#Register Script ---------------------------------------------------------------------------------------------
	Yii::app()->clientScript->registerScript('selectRow', "
		function selectRow(target_id) {   
			var id =$.fn.yiiGridView.getSelection(target_id);	   alert(id);
		
			jQuery.ajax({
				url:'/HTDOCS/yiiProject/yiitest/index.php/ajax/update?language=id&id=' +id,
				'success':function(html){ jQuery('#reqData').html(html) },
			}); 
		}
	");
	
	# IF USING XMLHttpRequest()-------------------------------------------------------------------------------
	<script type="text/javascript">
	function selectRow(target_id) {   //alert('test');
		var id =$.fn.yiiGridView.getSelection(target_id);	   alert(id);

		xmlhttp=new XMLHttpRequest();  
		xmlhttp.onreadystatechange=function() {
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("reqData").innerHTML=xmlhttp.responseText;   //respon to server (other:responseXml)
				//document.getElementById("div_header").innerHTML=xmlhttp.getAllResponseHeaders();
			}
		}
		//xmlhttp.open("GET","http://localhost/TESTING/DATABASE_FUNC/mysql_con.php",true); //*pake url jg bisa
		//xmlhttp.open("GET","../../DATABASE_FUNC/mysql_con.php",true); //Asynchronous=true
		xmlhttp.open("GET",'<?php #echo $this->createUrl('update'); ?>&id='+ id,true);
		xmlhttp.send();
	}
	</script>
	<?php $this->endWidget(); ?>
	
</div>
