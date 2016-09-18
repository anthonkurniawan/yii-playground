
<?php echo Yii::t('i18n', 'Select your language'); ?>:
							<?php //dump($this->controller->getId()); ?>
<?php foreach($available_lang as $locale=>$label): ?>		
	<a href="<?php echo Yii::app()->createUrl("{$this->controller->getId()}/langSelect", array('language'=>$locale), '&amp;'); ?>">
	<?php echo CHtml::image( bu("images/flag/{$locale}.gif")); ?>
	<?php echo Yii::t('i18n', $label); ?></a>&nbsp;
<?php endforeach; ?>
