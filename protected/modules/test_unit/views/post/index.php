<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

	<!---------------------------------------------------------------- CHECK SESSION VAR --------------------------------------------------------------------------->
	<div class="view2">
	Version YII : <?php echo Yii::getVersion(); ?><br />
	<div class="tpanel"  style="background:whitesmoke; display:block">
	<span class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Cache var'); ?></span>
		<div class="scroll"><?php dump(Yii::app()->cache ); ?></div>
	</div>

	<div class="tpanel"  style="background:whitesmoke; display:block">
	<span class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Variables'); ?></span>
		<div class="scroll">
		<?php
			echo "session->IsInitialized :". Yii::app()->session->IsInitialized ;
			echo "<br>session->sessionID :". Yii::app()->session->sessionID ;
			echo"<br>Yii::app()->id :".  Yii::app()->id ;
			echo"<br>Yii::app()->user->isGuest :".  Yii::app()->user->isGuest ;
			//echo"<br>Yii::app()->user->getState('role'):".  Yii::app()->user->getState('role');
			echo "<br>Yii::app()->user->returnUrl :". Yii::app()->user->returnUrl;
			if(!empty(Yii::app()->theme->name)) echo "<br>Yii::app()->theme :". Yii::app()->theme->name;
		
			//dump(Yii::app()->theme );		dump( !empty(Yii::app()->theme->name )  );	
			echo"<br>Yii::app()->user->id --><code>".Yii::app()->user->id ."</code>";echo" = user->getId() --><code>".Yii::app()->user->getId()."</code>";

			//echo"<br>Yii::app()->user->isAdmin() --><code>".Yii::app()->user->isAdmin("admin")."</code>";
			echo"<br>Yii::app()->user->name :<code>". Yii::app()->user->name."</code>";
			echo" = user->getName() --><code>".Yii::app()->user->getName()."</code>";
			//echo"<br>Similar with = Yii::app()->user->hasProperty('first_name') --><code>". Yii::app()->user->hasProperty('first_name') ."</code>";
			//echo"<br>Yii::app()->user->first_name --><code>".Yii::app()->user->first_name."</code>";	
			//echo"<br>Yii::app()->user->first_name --><code>".Yii::app()->user->lastLoginTime."</code>";
			//echo"<br>Yii::app()->user->hasProperty(email) --><code>". Yii::app()->user->hasProperty(email)."</code>";

			echo"<br>Yii::app()->user->getState('theme') --><code>".Yii::app()->user->getState('theme')."</code>";
			//echo"<br>Yii::app()->user-->getStateKeyPrefix() --><code>". Yii::app()->user->getStateKeyPrefix() ."</code>";
			//echo"<br>Yii::app()->user->getStateKeyPrefix() --><code>". Yii::app()->user->getStateKeyPrefix()."</code>";
			//echo"<br>Yii::app()->request->userHostAddress --><code>". Yii::app()->request->userHostAddress."</code>";
			echo"<br>Yii::app()->getRequest()->getUrl() --><code>".Yii::app()->getRequest()->getUrl() ."</code>";
		?>
		<br><?php dump( array(Yii::app()->getRequest()->getUrl()) ); ?>
		<br><?php dump( array('site/index') ); ?>
		</div>
		<?php dump(Yii::app()->session); ?><br>
	</div>
	</div>
	<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
	
<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
)); 
?>
