<?php //if(isset($_GET['layout'])) $this->layout='column1_custom'; ?> <!---- SET LAYOUT for fancy box ( default null/ set di controller) ---->

<?php
//------------ add the CJuiDialog widget -----------------
if (!empty($_GET["asDialog"])) {
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
        'id'=>'dlg-address-view-'. $model->id,
        'options'=>array(
            'title'=>'View Address #'. $model->id,
            'autoOpen'=>true,
            'modal'=>false,
            'width'=>550,
            'height'=>470,
        ),
	));
 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		array(               // related city displayed as a link
            'label'=>'ket',
            //'type'=>'raw', //!! GA PERLU DI SET JG GPP KAYANYA !!
            'value'=>TblData::model()->FindByPk($model->id)->ket,
        ),
	),
	//public $itemTemplate="<tr class=\"{class}\"><th>{label}</th><td>{value}</td></tr>\n";
	'itemTemplate'=>'<tr class={class}> <th width="700px">{label}&nbsp:</th> <td>{value}</td></tr>',
)); ?>
<?php echo tblPic::model()->picLink($model->id,'medium'); ?>

<?php
}
else
{
?>
<h1>View Data user (Custom with TbldData) :<?php echo $model->id; ?></h1>
<!------------ CONTENT---------->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		//'ket', //tambah kolom (ket)
		//'TblData::model()->FindByPk($data->id)->ket', 
		array(               // related city displayed as a link
            'label'=>'ket',
            //'type'=>'raw', //!! GA PERLU DI SET JG GPP KAYANYA !!
            'value'=>TblData::model()->FindByPk($model->id)->ket,
        ),
		
	),
	//public $itemTemplate="<tr class=\"{class}\"><th>{label}</th><td>{value}</td></tr>\n";
	'itemTemplate'=>'<tr class={class}> <th width="700px">{label}&nbsp:</th> <td>{value}</td></tr>',
)); ?>
<?php echo tblPic::model()->picLink($model->id,'medium'); ?>

<?php  }
  //----------------------- close the CJuiDialog widget ------------ 
  if (!empty($_GET["asDialog"])) $this->endWidget();
?>