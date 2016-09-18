<?php
Yii::import('zii.widgets.CPortlet');

class myCPortlet extends CPortlet
{
	public $title='Title..';
	public $decorationCssClass = 'Mydecoration-portlet';
	public $titleCssClass = 'Mytitle-portlet';
	public $contentCssClass = 'Mycontent-portlet';
	public $css='style.css';
	// public function init()
	// {

	// }
	
	// public function run()
    // {
		// $this->renderContent();
	// }
	
	protected function renderContent()
	{	//echo "test";
		//echo $content;
		//$this->render('recentComments');
		//dump($this);
		//$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR .'style.css';
		$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR .'assets'.DIRECTORY_SEPARATOR.$this->css;			//dump($dir);	
		//$cssFile=CHtml::asset(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR. $this->css);			dump($cssFile);	die();
		
		$baseUrl =Yii::app()->getAssetManager()->publish($dir);  //ini yang bener
		Yii::app()->clientScript->registerCssFile( $baseUrl, 'screen' ); //media optional, jika ga diset maka semua media
		
	}
}

#NOTE:
//PADA DASAR NYA INI MENGGUNAKAN "CPORTLET" WIDGET YII DAN HANYA MENAMBAHKAN "CSS STYLE" AJA