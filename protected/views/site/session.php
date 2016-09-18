<?php $this->pageTitle='Session Object'; ?>
	
<span class="badge badge-inverse">Session Object</span>


	<?php
	$user_info = "<br>Yii::app()->id :<code>".  Yii::app()->id ."</code>".
		"<br>Yii::app()->user->id :<code>".   Yii::app()->user->id ."</code>".
		"<br>Yii::app()->user->getIsInitialized() :<code>". Yii::app()->user->getIsInitialized()."</code>".
		"<br>Yii::app()->user->isGuest :<code>".  Yii::app()->user->isGuest ."</code>".
		"<br>Yii::app()->user->loginUrl[0] :<code>".  Yii::app()->user->loginUrl[0] ."</code>".
		"<br>Yii::app()->user->getState('role'): <code>".  Yii::app()->user->getState('role')."</code>".
		"<br>Yii::app()->user->name :<code>". Yii::app()->user->name."</code>".
		"<br>Yii::app()->user-->getStateKeyPrefix() --><code>". Yii::app()->user->getStateKeyPrefix() ."</code>".
		"<br>Yii::app()->user->getStateKeyPrefix() --><code>". Yii::app()->user->getStateKeyPrefix()."</code>".
		"<br>Yii::app()->request->userHostAddress --><code>". Yii::app()->request->userHostAddress."</code>";

	$user_ses = "session->IsInitialized <code>". Yii::app()->session->IsInitialized ."</code>".
		 "<br>session->sessionName <code> :". Yii::app()->session->sessionName."</code>".
		 "<br>session->sessionID <code> :". Yii::app()->session->sessionID ."</code>".
		 "<br>session->timeout <code> :". Yii::app()->session->timeout ."</code>"." (Returns the number of items in the session)".
		 "<br>session->count <code> :". Yii::app()->session->count ."</code> (Returns the number of items in the session.)".
		// "<br>session->connectionID<code> :". Yii::app()->session->connectionID."</code>".
		 "<br>session->isStarted<code> :". Yii::app()->session->isStarted."</code>".
		 "<br>session->gCProbability<code> :". Yii::app()->session->gCProbability."</code>".
		 "<br>session->savePath <code> :". Yii::app()->session->savePath."</code>".
		 //"<br>session->sessionTableName <code> :". Yii::app()->session->sessionTableName."</code>".
		 "<br>session->useCustomStorage <code> :". Yii::app()->session->useCustomStorage."</code>".
		 "<br>session->useTransparentSessionID <code> :". Yii::app()->session->useTransparentSessionID."</code>";
	?>

	<?php
	$this->widget('zii.widgets.jui.CJuiTabs', array(
		//'headerTemplate'=>'{url}',
		'tabs'=>array(
			//'Ajax JQuery'=>$this->renderPartial('_ajax_jq',null,true),
			'User Info'=>array('content'=>$user_info, 'id'=>'tab1'),
			'User Session'=>array('content'=>$user_ses, 'id'=>'tab2'),
			'Read Session'=>array('content'=>Yii::app()->session->readSession( Yii::app()->session->sessionID), 'id'=>'tab3'),
		// panel 3 contains the content rendered by a partial view
		// 'AjaxTab'=>array('ajax'=>$ajaxUrl),
		),
		// additional javascript options for the tabs plugin
		'options'=>array(
			'collapsible'=>true,
			'selected'=>0,
		),
		'htmlOptions'=>array(
			'style'=>'width:750px; overflow:auto; font-size: 10px'
		),
	));
	?>
	
	<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','View CDbHttpSession Class)'); ?></div>
		<div class="scroll"><?php dump(Yii::app()->session); ?></div>
	</div>
	
<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','$_SERVER[] info)'); ?></div>
	<div class="scroll" style="width: auto"> <pre><?php dump($_SERVER); ?></pre> </div>
</div>