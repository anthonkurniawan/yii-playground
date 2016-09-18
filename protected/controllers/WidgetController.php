<?php
class widgetController extends AdminController
//class widgetController extends tambahDB
{
	public $layout='//layouts/column1';
	
	public function actions(){
        return array(
			'suggestUsername'=>array(
				'class'=>'ext.XSuggestAction',
				'modelName'=>'TblUserMysql',
				'methodName'=>'suggestUsername',	//call method at model
				'limit'=>30
			),
			// Add ImageAttachmentAction in controller somewhere in your application. Also on this step you can add some security checks for this action.

			'toggle'=>'ext.jtogglecolumn.ToggleAction',
			'switch'=>'ext.jtogglecolumn.SwitchAction', // only if you need it
			
			'myPortlet'=>array('class'=>'CViewAction',  'basePath'=>''),
			'myBox'=>array('class'=>'CViewAction',  'basePath'=>''),
			'my_bgColor'=>array('class'=>'CViewAction',  'basePath'=>''),
			# ------------------------------------------------------------------ MyTemplate
			'mainMenu'=>array('class'=>'CViewAction',  'basePath'=>'MENU'),
			'sideMenu_all'=>array('class'=>'CViewAction',  'basePath'=>'MENU'),
			
			#--------------------------------------------------------------- http request
			'yii_curl'=>array('class'=>'CViewAction',  'basePath'=>'HTTP_REQUEST'),
			'EHttpClient'=>array('class'=>'CViewAction',  'basePath'=>'HTTP_REQUEST'),
			#--------------------------------------------------------------- message
			'ToastMsg'=>array('class'=>'CViewAction',  'basePath'=>'MESSAGE'),
			'HzlToastr'=>array('class'=>'CViewAction',  'basePath'=>'MESSAGE'),
			#----------------------------------------------------------------- Tooltip
			//'tooltip'=>array('class'=>'CViewAction',  'basePath'=>'tooltip'),
			'tooltip_js'=>array('class'=>'CViewAction',  'basePath'=>'tooltip'),
			'tooltip_jquery'=>array('class'=>'CViewAction',   'basePath'=>'tooltip'),
			'tooltip_jhon'=>array('class'=>'CViewAction',  'basePath'=>'tooltip'),
			'ttooltip'=>array('class'=>'CViewAction',   'basePath'=>'tooltip'),
			#------------------------------------------------------- HightLighter script code
			'printCodes'=>array('class'=>'CViewAction',  'basePath'=>''),
			#----------------------------------------------------------------- Browser-
			'browserInfo'=>array('class'=>'CViewAction',  'basePath'=>'BROWSER_INFO'),
			
			#-----------------------------------------------------------------  WYSIWYG Editor
			'Jqueryte'=>array('class'=>'CViewAction',  'basePath'=>'WYSIWYG'),
			'kindeditor'=>array('class'=>'CViewAction',  'basePath'=>'WYSIWYG'),	
			'Xheditor'=>array('class'=>'CViewAction',  'basePath'=>'WYSIWYG'),
			'TinyMce'=>array('class'=>'CViewAction',  'basePath'=>'WYSIWYG'),

			#------------------------------------------------------------------- Cjui YII
			'CJuiAutoComplete'=>array(				//ini utk direct link ke "page/about"
				'class'=>'CViewAction',  'basePath'=>'cjui', //default 'basePath'=>'pages', jika tak di set maka akan gunakan view dari nama 'controller' widget
			),
			#----------------------------------------------------------------- CjuiDialog 
			'cjui'=>array('class'=>'CViewAction',  'basePath'=>'cjui'),
			'cjuiDialog'=>array('class'=>'CViewAction',  'basePath'=>'cjuiDialog'),
			'cjuiDialog_form'=>array('class'=>'CViewAction',  'basePath'=>'cjuiDialog'),
			'cjuiDialog_custom'=>array('class'=>'CViewAction',  'basePath'=>'cjuiDialog'),
			'CjuiDialog_highcharts'=>array('class'=>'CViewAction',  'basePath'=>'cjuiDialog'),
			'gridJoinDialog'=>array('class'=>'CViewAction',  'basePath'=>'/Widget_CgridView'),
			'cjuiTabs'=>array('class'=>'CViewAction',  'basePath'=>'cjui'),
			'cjuiAccordion'=>array('class'=>'CViewAction',  'basePath'=>'cjui'),
			'CJuiSlider'=>array('class'=>'CViewAction',  'basePath'=>'cjui'),
			'cjuidatepicker'=>array('class'=>'CViewAction',  'basePath'=>'cjui'),
			'cjuibutton'=>array('class'=>'CViewAction',  'basePath'=>'cjui'),
			'CJuiDraggable'=>array('class'=>'CViewAction',  'basePath'=>'cjui'),
			#------------------------------------------------------------------ TREE VIEW
			'CFileBrowser'=>array('class'=>'CViewAction',  'basePath'=>''),
			'treeMenu'=>array( 'class'=>'application.controllers.CTreeView_actions.treeMenuAction'),
			//'treeArray'=>array( 'class'=>'application.controllers.CTreeView_actions.treeArrayAction'),
			'treeDataDb'=>array( 'class'=>'application.controllers.CTreeView_actions.treeDataDbAction'),
			
			# ----------------------------------------------------------------- DATABASE
			'dumpDb'=>array('class'=>'CViewAction',  'basePath'=>'database'),
			'ejsonbehavior'=>array('class'=>'CViewAction',  'basePath'=>'database'),
			'metadata'=>array('class'=>'CViewAction',   'basePath'=>'database'),
			
			#------------------------------------------------------------------- INTERFACE
			'clonnableFields'=>array('class'=>'CViewAction',  'basePath'=>'INTERFACE'),
			'TbTypeAhead'=>array('class'=>'CViewAction',  'basePath'=>'INTERFACE'),
			'TagHandler'=>array('class'=>'CViewAction',  'basePath'=>'INTERFACE'),
			'eselect2'=>array('class'=>'CViewAction',  'basePath'=>'INTERFACE'),
			'selectize'=>array('class'=>'CViewAction',  'basePath'=>'INTERFACE'),
			'JEditable'=>array('class'=>'CViewAction',  'basePath'=>'INTERFACE'),
			'jqueryte'=>array('class'=>'CViewAction',  'basePath'=>'INTERFACE'),
			'xMultiSelect'=>array('class'=>'CViewAction',  'basePath'=>'INTERFACE'),

			'cflex'=>array('class'=>'CViewAction',  'basePath'=>'CFLEX'),
			'CClipWidget'=>array('class'=>'CViewAction',  'basePath'=>''),
			'CTabView'=>array('class'=>'CViewAction',  'basePath'=>'CTabView'),
			
			'fancy'=>array('class'=>'CViewAction',  'basePath'=>''),
			'rss'=>array('class'=>'CViewAction',  'basePath'=>'RSS'),
			'StickyPage'=>array('class'=>'CViewAction',  'basePath'=>''),
			'jpopup'=>array('class'=>'CViewAction',  'basePath'=>''),
			'fontSizer'=>array('class'=>'CViewAction',  'basePath'=>''),
			'eJTimeLine'=>array('class'=>'CViewAction',  'basePath'=>''),
			'Yiippod'=>array('class'=>'CViewAction', 'basePath'=>''),	
			'npager'=>array('class'=>'CViewAction',  'basePath'=>''),	
			'Xportlet'=>array('class'=>'CViewAction',  'basePath'=>'Xportlets'),	
			'userCounter'=>array('class'=>'CViewAction',  'basePath'=>''),	
			'eHtmlDateSelect'=>array('class'=>'CViewAction',  'basePath'=>''),	
			'XLangMenu'=>array('class'=>'CViewAction',  'basePath'=>'I18N'),
        );
    }
	
	public function actionTest(){ dump(Yii::app()->getModule('notifications')); }
	
	#------------------ DEFAULT
	public function actionIndex() {
		$this->render('index');
	}
	
	# ----------------------RENDER fILE
	public function actionCphp_renderFile() {
		# SNTAX : renderFile($context, $sourceFile, $data, $return)
		$context = $renderer = Yii::app()->getComponent('viewRenderer');			//dump($context);
		//$renderer->renderFile($context, 'D:\WEB\yiiProject\yiiTest\protected\views\widget\FILE_RENDER_TEST\CPhpViewRenderer.php', array('viewData'=>'test'), false);  # langsung render
		$render = $renderer->renderFile($context, 'D:\WEB\yiiProject\yiiTest\protected\views\widget\FILE_RENDER_TEST\CPhpViewRenderer.php', array('viewData'=>'value1'), true); # get content file
		echo $render;
		dump($render);
		//dump(Yii::CViewRenderer);
		//dump(Yii::app()->getViewRenderer());
	}
	
	public function actionYii_renderFile() {
		# SNTAX : renderFile(string $viewFile path, array $data=NULL, boolean $return=false)
		//$this->renderFile('D:\WEB\yiiProject\yiiTest\protected\views\widget\FILE_RENDER_TEST\CPhpViewRenderer.php', array('viewData'=>'test'), false);
		//$render = $this->renderFile('D:\WEB\yiiProject\yiiTest\protected\views\widget\FILE_RENDER_TEST\CPhpViewRenderer.php', array('viewData'=>'test'), true);
		//dump($render);
		// echo $this->renderInternal('D:\WEB\yiiProject\yiiTest\protected\views\widget\FILE_RENDER_TEST\CPhpViewRenderer.php', array('viewData'=>'test'), false);  # php file
		$render = $this->renderFile('D:\WEB\yiiProject\yiiTest\protected\views\widget\FILE_RENDER_TEST\test.txt', array('viewData'=>'value1'), false);  # text file
		echo CFileHelper::getExtension('D:\WEB\yiiProject\yiiTest\protected\views\widget\FILE_RENDER_TEST\test.txt');
		//echo $render->getExtension();
	}
	
	# SAMPLE Custom handling error
	public function actionTestError(){
		throw new CException(Yii::t('yii','ada error CONTOH  pada {controller}  "{view}". A {widget} .', array('{controller}'=>get_class($this))));
	}
	
	#----------------------------------- Console
	public function actionTConsole() 
	{
		// Put TConsoleRunner.php on extensions or components directory
		// Create your console.php file or use that included in this extensions and put it on root directory of your application or same location with index.php.
		// Create your console command and put it on protected/commands directory
		// Trigger the console command from your web application like this:
		$console=new TConsoleRunner('console.php');
		$console->run('parsing filetoparse.xls');
		$console->run('sendnotifemail tyohan@myemail.com');
	}
	
	#------------------------------------------- Tooltip
	public function actionTooltip() 
	{
		Yii::app()->clientScript->registerCoreScript('jquery.ui'); 
		$cs = Yii::app()->getClientScript();
		$path = $cs->getCoreScriptUrl().'/jui/css/base/';
		// $cs->registerCssFile( $path.'jquery.ui.tooltip.css'); 
		$cs->registerCssFile( $path.'jquery-ui.css'); 

		$this->render('tooltip/index');
	}
	

	#------------------------------------ Widget Tree CFileBrowser
	public function actionFileBrowser()
	{																		
		//$dir='xampp/';		
		if(isset($_POST['dir'])) $dir=urldecode($_POST['dir']);						
												
		if( file_exists( $dir) ) {			//echo $dir;
			$files = scandir( $dir);
			natcasesort($files);
			if( count($files) > 2 ) { /* The 2 accounts for . and .. */
				echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
				// All dirs
				foreach( $files as $file ) {
					if( file_exists( $dir . $file) && $file != '.' && $file != '..' && is_dir( $dir . $file) ) {
						echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . htmlentities($dir . $file) . "/\">" . htmlentities($file) . "</a></li>";
					}
				}
				// All files
				foreach( $files as $file ) {
					if( file_exists( $dir . $file) && $file != '.' && $file != '..' && !is_dir( $dir . $file) ) {
						$ext = preg_replace('/^.*\./', '', $file);
						echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . htmlentities($dir . $file) . "\">" . htmlentities($file) . "</a></li>";
					}
				}
				echo "</ul>";	
			}
		}
	}

	
	#--------------------------------------- WIDGET CJUIDialog Highcharts
	public function actionCjuiDialog_ajax() {		
		cs()->scriptMap=array( 'jquery.js'=>false );
		
		$this->renderPartial( 'cjuiDialog/_highcharts',null, false, true);
		
		// echo CJSON::encode( 
			// array(
				// 'status' => 'failure',
				// //'content' => $this->renderPartial( 'partial_file/_form', array( 'model' =>$model,  'model2' =>$model2,  'model3' =>$model3), true),
				// 'content' => $this->render( 'cjuiDialog/_highcharts'),
		// ));
	}

	// public function loadModel_products($id)
	// {
		// $model=Products::model()->findByPk($id);
		// if($model===null)
			// throw new CHttpException(404,'The requested page does not exist.');
		// return $model;
	// }
	public function actionCreate()
	{
		$model=new Products;
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
																				print_r($_POST);
		if(isset($_POST['Products']))
		{	
			$model->attributes=$_POST['Products'];
			$model->price = str_replace(".","",$_POST[Products][price]);		
			if($model->save())
				$this->redirect(array('view','id'=>$model->proID));
		}
		$this->render('products/create',array('model'=>$model,));
	}
	
	#------------------------------------------------------ TABLE GRID EXTENSIONS ----------------------------------------------------
	public function actionGroupgridview()
    {   
		$model=new TblUserMysql('search_join');  //**search_join scenario yg di definisikan di "model" pada "rules()"
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['TblUserMysql']))			
			$model->attributes=$_GET['TblUserMysql']; 
			
        $this->render('Groupgridview', array('model'=>$model));
    } 
	
	public function actionJtogglecolumn() 
	{
		$model=new TblUserMysql('search');
		$model->unsetAttributes();  // clear any default values
		
		//ECHO "GET USER :";PRINT_R($_GET['TblUserMysql']);
		if(isset($_GET['TblUserMysql']))			
			$model->attributes=$_GET['TblUserMysql']; 

		$this->render('Jtogglecolumn',array('model'=>$model, ));
	}

	
	public function actionEdataTables()
	{
		# USING FN "loadData($id, $condition)"
		$dataProvider = Products::model()->loadData(null, null);
		
		$widget=$this->createWidget('ext.EDataTables.EDataTables', array(
			'id'            => 'Products',
			'dataProvider'  => $dataProvider,
			// 'ajaxUrl'       => Yii::app()->getBaseUrl().'/products/index',
			'ajaxUrl'       => $this->createUrl('widget/EdataTables'),
			//'columns'       => array('proID'),
		));
		
		if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
			$this->render('EDataTables', array('widget' => $widget,));
			return;
		} 
		else {
			echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
			Yii::app()->end();
		}
	}
	
	#---------------------------------------------- DATABASEB EXT -------------------------------------------------
	public function actionDumpDb_gen($mode='file'){
		Yii::import('ext.DB.dumpDB.dumpDB');
		$dumper = new dumpDB();	//dump($dumper);
		if($mode=='file')
			$dumper->getDump();		# To download the generated sql file:
		else
			dump( $dumper->getDump(false) );  # To show the generated sql:
	}
	
	public function actionSDump_gen(){
		Yii::import('ext.DB.SDbDump.SDatabaseDumper');
		$dumper = new SDatabaseDumper;
		// Get path to backup file
		//$file = Yii::getPathOfAlias('webroot.protected.backups').DIRECTORY_SEPARATOR.'sDB_Dump_'.date('Y-m-d_H_i_s').'.sql';	
		$file = Yii::app()->basePath .'/../_backupDB'.DIRECTORY_SEPARATOR.'sDB_Dump_'.date('Y-m-d_H_i_s').'.sql';		//dump($file); die();

		// Gzip dump
		if(function_exists('gzencode')){
          if(file_put_contents($file.'.gz', gzencode($dumper->getDump())))
			echo "file save on {$file}";
		}
      else{
          if(file_put_contents($file, $dumper->getDump()))
			echo "file save on {$file}";
		}
	}
	
}
?>