<!--
jadi cara kerja utk register css/js file:
-ga bisa langsug ke folder "module" karena include di dalama folder "protected"
-kcuali dengan register file dimana file terletak di luar folder "protected"
-maka biar rapi, file tyg akan di register di publish terlebih dahalu, 
-baru stelah itu di register karena otomatis sudah ada dalam folder "asset"
-->

<?php	
$file = dirname(__FILE__) . DIRECTORY_SEPARATOR .'myPortlet_x.css';
//$file = getcwd(). '/css/ext_form/ext-form-basic.css';  #kalo di folder roor "css"

$baseUrl =Yii::app()->getAssetManager()->publish($file);  //ini yang bener
Yii::app()->clientScript->registerCssFile( $baseUrl, 'screen' ); //media optional, jika ga diset maka semua media

class myPortlet_x extends CWidget
{
	public $title;
	public $cssClass='portlet';
	public $headerCssClass='header';
	public $contentCssClass='content';
	public $visible=true;
	public $content="";
	public $width="100%";
	public $height="auto";
	public $background="#FFF";
	
	public function init()
	{
		$file = getcwd(). '/css/ext_form/img/tool-sprites.gif';	//echo $file;
		
		if($fp = fopen($file,"rb", 0)) {
			$picture = fread($fp,filesize($file));
			fclose($fp);
			$base64 = chunk_split(base64_encode($picture));			#echo $base64;
		}

		if(!$this->visible)
			return;
			// echo "<div class=\"{$this->cssClass}\">\n";
			// if($this->title!==null)
				// echo "<div class=\"{$this->headerCssClass}\">{$this->title}</div>\n";
			// echo "<div class=\"{$this->contentCssClass}\">\n";
			
			echo '<div class="btn_close"></div>
			<div class="x-panel-default-framed2" style="width:'.$this->width. '; height:' .$this->height. '; background:'. $this->width. ' ">  <!--width:700px; height: 150px; -->
			<!--- TOOLBAR HEADER --->
			<div style="-moz-user-select: -moz-none; width:100%; left: -1px; top: -1px;" class="x-docked2 x-panel-header-default-framed2 x-panel-header-horizontal2">
				<div style="width: 100%; height: 17px;" class="x-box-inner2" role="presentation">
					<div class="x-panel-header-text2 x-panel-header-text-default-framed2">'. $this->title. '</div>
					<div class="x-tool2 x-box-item2" style="left:100%; margin: 1px 0px 0px -30px; ">
						<!--<img src="data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="x-tool-collapse-top" role="presentation"/>-->
						<!--<img src="data:image/gif;base64,'. $base64 .' " style="background-position: -150px -25px;"  class="x-tool-collapse-top" />-->
						<div class="btn_close"></div>
					</div>
				</div>
			</div><!--- toolbar content --->
   
			<!----- CONTENT ------>
			<div class="x-panel-body2 x-panel-body-default-framed2" style="padding: 5px 5px 0px; width:auto; left: 0px; top:20px; background:#FFF">
				<div id="reqData" style="float:left; width:300px">'. $this->content .'</div>
			</div>';
		//</div><!--- frame box -->';
	}

	public function run()
	{

		if(!$this->visible)
			return;
		$this->renderContent();
		// echo "</div><!-- {$this->contentCssClass} -->\n";
		echo "</div><!-- {$this->cssClass} -->";
	}

	protected function renderContent()
	{
		echo $this->content;
	}
}