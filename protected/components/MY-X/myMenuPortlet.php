<?php
Yii::import('zii.widgets.CPortlet');

class myMenuPortlet extends CPortlet
{
	public $title='Title..';
	public $decorationCssClass = 'Mydecoration-portlet';
	public $titleCssClass = 'Mytitle-portlet';
	public $contentCssClass = 'Mycontent-portlet';
	public $css='style.css';
	public $menu=array();
	
	// public function init()
	// {

	// }
	
	// public function run()
    // {
		// $this->renderContent();
	// }
	public function getFile() {
		$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR .'assets'.DIRECTORY_SEPARATOR;

			$cssFile =Yii::app()->getAssetManager()->publish( $dir.$this->css );
			
		return $cssFile;
	}
	
	public function registerClientScripts()
    {																	
		$cssFile = $this->getFile();		//dump( $cssFile );
		Yii::app()->clientScript->registerCssFile( $cssFile, 'screen' ); //media optional, jika ga diset maka semua media
	}
	
	protected function renderContent()
	{	//echo "test";
		//echo $content;
		//$this->render('recentComments');
		//dump($this);
		
		$this->registerClientScripts();
		
		//echo '<div id="sidebar" style="padding:0; border:1px solid #89d; margin-top:.5em;">';
		//echo '<div style="float:left; width:150px; margin:10px 0px 0px 20px; border-left: 1px solid #eee;">';
		#echo '<div style="float:left; width:150px; margin:10px 0px 0px 20px;">';
		
		 $this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'Myoperations'),
			));
		#echo '</div>';
	}
}
