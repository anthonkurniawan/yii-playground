
<?php
$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR .'myPortlet.css';
// Yii::app()->clientScript->registerCssFile( $dir.'myPortlet.css');  // ga bisa coz dalam include di dlm folder "protected"
//Yii::app()->clientScript->registerCssFile( Yii::app()->request->baseUrl.'/css/myPortlet.css');  //bisa tapi jadi campur aduk

$baseUrl =Yii::app()->getAssetManager()->publish($dir);  //ini yang bener
Yii::app()->clientScript->registerCssFile( $baseUrl, 'screen' ); //media optional, jika ga diset maka semua media


class myPortlet extends CWidget
{
	public $title;
	public $cssClass='myPortlet';
	public $headerCssClass='myPortlet-header';
	public $contentCssClass='myPortlet-content';
	public $visible=true;
	public $htmlOptions ="";
	public $content="";
	
	public function init()
	{
		if(!$this->visible)
			return;
			echo "<div class=\"{$this->cssClass}\" style=\"{$this->htmlOptions}\">\n";
			if($this->title!==null)
				echo "<div class=\"{$this->headerCssClass}\">{$this->title}</div>\n";
			echo "<div class=\"{$this->contentCssClass}\">\n";
	}

	public function run()
	{

		if(!$this->visible)
			return;
		$this->renderContent();
		echo "</div><!-- {$this->contentCssClass} -->\n";
		echo "</div><!-- {$this->cssClass} -->";
	}

	protected function renderContent()
	{
		echo $this->content;
	}
}