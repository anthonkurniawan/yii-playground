<?php

class DefaultController extends Controller
{
	public $layout='//layouts/column1';
	
	public function getPageTitle()
	{
		if($this->action->id==='index')
			return 'Unit-Testing a Web-based code generator for Yii';
		else
			return 'Unit-Testing  - '.ucfirst($this->action->id).' Generator';
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
}