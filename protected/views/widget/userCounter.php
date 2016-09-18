 <!--------------------------------------------------- USER COUNTER EXT -------------------------------------------------->
 <div class="view2" style="width:auto">
 <div style="width:200px; float:left">
	<span class="badge"> UserCounter</span><br>
	<?php 
	// Execute the counter before you use the getter-funtions!
	Yii::app()->counter->refresh(); // refreh data lookup to db 
	?>
	online: <?php echo Yii::app()->counter->getOnline(); ?><br />
	today: <?php echo Yii::app()->counter->getToday(); ?><br />
	yesterday: <?php echo Yii::app()->counter->getYesterday(); ?><br />
	total: <?php echo Yii::app()->counter->getTotal(); ?><br />
	maximum: <?php echo Yii::app()->counter->getMaximal(); ?><br />
	date for maximum: <?php echo date('d.m.Y', Yii::app()->counter->getMaximalTime()); ?>
</div>

 <div style="width:auto; float:left">
	<span class="badge"> UserCounter *with icon</span><br>
	<code>echo Yii::app()->counter->getOnline(true,'style name','digit image extension'); </code><br>
	online: <?php echo Yii::app()->counter->getOnline(true,'fdb',''); ?> <br />
	today: <?php echo Yii::app()->counter->getToday(true, 'links'); ?><br />
	yesterday: <?php echo Yii::app()->counter->getYesterday(true, 'marsil'); ?><br />
	total: <?php echo Yii::app()->counter->getTotal(true, 'sbgs'); ?><br />
	maximum: <?php echo Yii::app()->counter->getMaximal(true, 'web1'); ?><br />
	date for maximum: <?php echo date('d.m.Y', Yii::app()->counter->getMaximalTime()); ?>
</div>
</div>