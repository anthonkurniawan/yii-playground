<?php

class TestFormController extends  AdminController
{	
	public $layout='//layouts/column1';
	
	/** @return array action filters */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the <li type="a">act page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}
	
	/***--Performs the AJAX validation.	@param the model to be validated--***/
	protected function performAjaxValidation($model) {												
		if(isset($_POST['ajax']) && $_POST['ajax']==='TestForm')
		{
			echo CActiveForm::validate($model); 
			Yii::app()->end();
		}
	}
	
	public function actionIndex(){
		$model=new TestForm;		

		//BUAT AJAX REQUEST
		if (Yii::app()->request->isAjaxRequest) {		
			cs()->registerScriptFile(Yii::app()->baseUrl . '/js/common.js');
			//cs()->registerScriptFile(Yii::app()->baseUrl . '/js/base.js');
			
			cs()->registerScript('sntax', 	"js: SyntaxHighlighter.highlight();");
			
			 //renderPartial(string $view, array $data=NULL, boolean $return=false, boolean $processOutput=false)
			 $this->renderPartial($_GET["view"], array('model'=>$model), false, true);		//ajax request harus set "false", "true"
		}
		else
			$this->render('index',array('model'=>$model));
	}
	
	protected function beforeRender($view)
	{	
		echo "run before render..";
		//$this->widget('application.extensions.syntaxhighlighter.SyntaxHighlighter', array());
		return true;
	}
	
	public function actionAjax_test() {
		echo date('H:i:s'); echo __FILE__;
		Yii::app()->end();
	}

	public function actionScript_handle(){
		$cs = Yii::app()->getClientScript();  
		$cs->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_light.css');
	
		$this->renderPartial('script_handle'); // coz render via ajax ( ga termasuk header)
	}
	
	public function actionInputbatch(){																		
		//** ambil item data yang akan dipopulasi dalam mode batch
		$model= TblUserMysql ::model()->findAll(array('index'=>'id'));
		
		if(isset($_POST['TblUserMysql']))
		{						
			$valid=true;
			foreach($model as $i=>$x)
			{
				if(isset($_POST['TblUserMysql'][$i]))
						echo"<br>post TblUserMysql i-->"; print_r($_POST['TblUserMysql'][$i]);
						
					$x->attributes=$_POST['TblUserMysql'][$i];		
					//$valid=$user->validate() && $valid;			echo $valid;
					$x->save();	//** UPDATE TO TABLE
			}
		}
		
		if (Yii::app()->request->isAjaxRequest) 
			$this->renderPartial('inputBatch',array('datas'=>$model));	
		else
			$this->render('inputBatch',array('datas'=>$model));	
		
	}
	

}
