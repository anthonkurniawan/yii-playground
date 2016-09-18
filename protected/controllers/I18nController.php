<?php
class I18nController extends AdminController
{
	public $layout='//layouts/column1';
	
	public function actions(){
	
	}
	
	public function actionIndex() {
		$this->initLanguage();  # IF USE LangSelector
		
		$this->render('index');
	}
	
	public function actionLangSelect() 
	{																
		$language =$_GET['language'];
		$this->setLanguage($language);			
		//$this->redirect(Yii::app()->request->urlReferrer);
		$this->redirect('index');
	}
	
	# LANGUAGE SELECT
	protected function initLanguage() {	
		if( isset($_GET['language'] ))				# IF USE XLangMenu
			Yii::app()->setLanguage($_GET['language']);
		else
			Yii::app()->setLanguage($this->getSelectedLanguage());		# IF USE LangSelector
	}
	
	protected function getSelectedLanguage() {
		if (isset(Yii::app()->session['sel_lang'])) {
			return Yii::app()->session['sel_lang'];
		}
		else {
			return Yii::app()->getLanguage();
		}
	}
	
	protected function setLanguage($language) {
		$language =strtolower($language);
		Yii::app()->setLanguage($language);
		Yii::app()->session['sel_lang']=$language;
	}
	
}
	
