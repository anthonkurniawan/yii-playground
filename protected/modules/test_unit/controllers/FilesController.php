<?php
/**
 * CCodeGenerator class file.
/**
 * CCodeGenerator is the base class for code generator classes.
 *
 * CCodeGenerator is a controller that predefines several actions for code generation purpose.
 * Derived classes mainly need to configure the {@link codeModel} property
 * override the {@link getSuccessMessage} method. The former specifies which
 * code model (extending {@link CCodeModel}) that this generator should use,
 * while the latter should return a success message to be displayed when
 * code files are successfully generated.
 *
 * @property string $pageTitle The page title.
 * @property string $viewPath The view path of the generator.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system.gii
 */
class FilesController extends Controller
{
	/**
	 * @var string the layout to be used by the generator. Defaults to 'generator'.
	 */
	//public $layout='generator';
	/**
	 * @var array a list of available code templates (name=>path)
	 */
	public $templates=array();
	/**
	 * @var string the code model class. This can be either a class name (if it can be autoloaded)
	 * or a path alias referring to the class file.
	 * Child classes must configure this property with a concrete value.
	 */
	public $codeModel;

	private $_viewPath;

	/**
	 * @return string the page title
	 */
	// public function getPageTitle()
	// {
		// return 'Gii - '.ucfirst($this->id).' Generator';
	// }

	/**
	 * The code generation action.
	 * This is the action that displays the code generation interface.
	 * Child classes mainly need to provide the 'index' view for collecting user parameters
	 * for code generation.
	 */
	// public function actionIndex()
	// {
		// $model=$this->prepare();																		
		// if($model->files!=array() && isset($_POST['generate'], $_POST['answers']))
		// {
			// $model->answers=$_POST['answers'];
			// $model->status=$model->save() ? CCodeModel::STATUS_SUCCESS : CCodeModel::STATUS_ERROR;
		// }
																			// //echo "ambil model-->"; dump($model);
																			// echo "status--->".$model->status;
		// $this->render('index',array(
			// 'model'=>$model,
		// ));
	// }

	// public function actionIndex()
	// {
		// //$model=$this->prepare();		
		// $modelClass=Yii::import( 'test_unit.crudCode');	 
		// $model=new $modelClass;							
		// $model->loadStickyAttributes();	dump($model);
		
		// //$this->render('index');
		// $this->render('index',array('model'=>$model, ));
	// }
	
	public function actionIndex()
	{
		echo Yii::app()->getBasePath();
		$target = 'D:\WEB\yiiProject\yiiTest\protected\modules\test_unit/test.php';
		$template = 'D:\web\FRAMEWORKS\YII\framework\gii\generators\controller\templates\default';
		//$this->files[]=new CCodeFile(
		$file = new CCodeFile(
			//$this->controllerFile,
			$target,
			//$this->render($templatePath.'/controller.php')
			$this->renderCont($target)
		);															echo "this ->files[]"; dump( $file );
		$this->render('index');
	}
	
	public function renderCont($templateFile,$_params_=null)
	{									echo "ambil var templateFile : ".$templateFile; dump($templateFile); echo"<br>";
		if(!is_file($templateFile))
			throw new CException("The template file '$templateFile' does not exist.");

		if(is_array($_params_))
			extract($_params_,EXTR_PREFIX_SAME,'params');
		else
			$params=$_params_;
			
		ob_start();			//Turn on output buffering
		ob_implicit_flush(false);	//Turn implicit flush on/off
		require($templateFile);
		return ob_get_clean();	//Get current buffer contents and delete current output buffer
									//echo ob_get_clean();
		//return ob_get_contents();						
		 // $html_buffer = ob_get_contents();   dump($html_buffer );
		 // ob_end_clean();
	}
	
	/* Prepares the code model. */
	protected function prepare()
	{
		if($this->codeModel===null)
			throw new CException(get_class($this).'.codeModel property must be specified.');
			
		$modelClass=Yii::import($this->codeModel,true);			//cth : impot gii.generators.crud.CrudCode 
		$model=new $modelClass;
		$model->loadStickyAttributes();					#index crud awal								//dump($model);
		
		if(isset($_POST[$modelClass]))		#index crud after set model class
		{
			$model->attributes=$_POST[$modelClass];								//dump($model);
			$model->status=CCodeModel::STATUS_PREVIEW;				
			if($model->validate())
			{
				$model->saveStickyAttributes();										//dump($model);
				$model->prepare();		//function "prepare on CrudCode.php"
			}
		}											//echo $this->codeModel;
													//dump($model);    //XXXXXXXXXXXXXXXXX
		return $model;
	}
	
	/**
	 * The code preview action.
	 * This action shows up the specified generated code.
	 * @throws CHttpException if unable to find code generated.
	 */
	public function actionCode()
	{													
		$model=$this->prepare();			
		if(isset($_GET['id']) && isset($model->files[$_GET['id']]))
		{																								echo "<br><br>test view file (lihat di '\gii\views\common')";
			$this->renderPartial('/common/code', array(
				'file'=>$model->files[$_GET['id']],
			));
		}
		else
			throw new CHttpException(404,'Unable to find the code you requested.');
	}

	/**
	 * The code diff action.
	 * This action shows up the difference between the newly generated code and the corresponding existing code.
	 * @throws CHttpException if unable to find code generated.
	 */
	public function actionDiff()
	{
		Yii::import('gii.components.TextDiff');

		$model=$this->prepare();
		if(isset($_GET['id']) && isset($model->files[$_GET['id']]))
		{
			$file=$model->files[$_GET['id']];
			if(!in_array($file->type,array('php', 'txt','js','css')))
				$diff=false;
			elseif($file->operation===CCodeFile::OP_OVERWRITE)
				$diff=TextDiff::compare(file_get_contents($file->path), $file->content);
			else
				$diff='';

			$this->renderPartial('/common/diff',array(
				'file'=>$file,
				'diff'=>$diff,
			));
		}
		else
			throw new CHttpException(404,'Unable to find the code you requested.');
	}

	
	/**
	 * Returns the view path of the generator.
	 * The "views" directory under the directory containing the generator class file will be returned.
	 * @return string the view path of the generator
	 */
	// public function getViewPath()
	// {
		// if($this->_viewPath===null)
		// {
			// $class=new ReflectionClass(get_class($this));
			// $this->_viewPath=dirname($class->getFileName()).DIRECTORY_SEPARATOR.'views';
		// }
		// return $this->_viewPath;
	// }

	/**
	 * @param string $value the view path of the generator.
	 */
	// public function setViewPath($value)
	// {
		// $this->_viewPath=$value;
	// }
}