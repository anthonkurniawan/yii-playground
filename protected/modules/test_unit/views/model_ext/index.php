<style> .container{ width:1200px }</style>

<div class="left" style="width:570px;">
<?php 
// $this->widget('zii.widgets.CListView', array(
	// 'dataProvider'=>$dataProvider1,
	// 'itemView'=>'_view',
	// 'template'=>"{items}\n{pager}",
// )); 
?>
</div>

<div class="left" style="margin-left:5px; width:570px">
<?php 
// $this->widget('zii.widgets.CListView', array(
	// 'dataProvider'=>$dataProvider2,
	// 'itemView'=>'_view',
	// 'template'=>"{items}\n{pager}",
// )); 
?>
</div>
<div class="clear"></div>

<div class="left" style="margin-right:5px; width:400px">
	<?php dump($dataProvider1); ?>
</div>

<div class="left">
	<?php dump($dataProvider2); ?>
</div>

<div class="clear"></div>