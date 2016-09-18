<?php
class scriptHandlerController extends AdminController
//class widgetController extends tambahDB
{
	public $layout='//layouts/column1';
	
	// public function actions(){
        // return array( );
    // }
	
	public function actionIndex() {
		if (Yii::app()->request->isAjaxRequest) {
			 cs()->registerScriptFile(Yii::app()->baseUrl . '/js/common.js');
			 $this->renderPartial($_GET["view"], null, false, true);		//ajax request harus set "false", "true"
		}
		else
		$this->render('index');
	}

	public function actionRegisterCoreScript() {
		#register core script
		Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
		
		#register css file on folder assets
		$cs = Yii::app()->getClientScript();
		$path = $cs->getCoreScriptUrl().'/jui/css/base/';
		// $cs->registerCssFile( $path.'jquery.ui.tooltip.css'); 
		$cs->registerCssFile( $path.'jquery-ui.css'); 

		#register client script
		Yii::app()->clientScript->registerScript('tooltip', "
			$('.tooltip').tooltip();
		");

		//renderPartial(string $view, array $data=NULL, boolean $return=false, boolean $processOutput=false)
		$this->renderPartial('RegisterCoreScript', null, false, true);
	}

	public function actionClientScript_method() {
		// $this->render('ClientScript_method');
		$this->renderPartial('ClientScript_method');
	}
	
}
?>