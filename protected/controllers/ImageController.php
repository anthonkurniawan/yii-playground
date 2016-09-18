<?php
class ImageController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	# ADD FOR yii-image-attachment
	public function actions()
	{
		return array(
			#----------------------------------------------------------------- FILE UPLOAD /EDIT
			'EajaxUpload'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/FILE'),
			'CMultiFileUpload'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/FILE'),
			'yiiImage'=>array('class'=>'CViewAction',  'basePath'=>'/widget/FILE'),
			'elfinder'=>array('class'=>'CViewAction',  'basePath'=>'/widget/FILE'),
			
			'saveImageAttachment' => 'ext-coll.UPLOAD_GALLERY.yii-image-attachment.ImageAttachmentAction',
            'elFinderConnector' => array(
                'class' => 'ext-coll.UPLOAD_GALLERY.yii-elfinder.ElFinderConnectorAction',
				# SEE ON "yii-elfinder.php.connector.php"
                'settings' => array(
                    'root' => Yii::getPathOfAlias('webroot') . '/upload/',
                    'URL' => Yii::app()->baseUrl . '/upload/',
                    'rootAlias' => 'Home',
                    'mimeDetect' => 'none',
					'tmbDir' =>'_elfinder_thumb',
                )
            ),
			
			# FOR WYSIWYG "tinyMce"
            'tinyMceCompressor' => array(
                'class' => 'TinyMceCompressorAction',
                'settings' => array(
                    'compress' => true,
                    'disk_cache' => true,
                )
            ),
            'tinyMceSpellchecker' => array(
                'class' => 'TinyMceSpellcheckerAction',
            ),
		);
	}
	
		// Example #1 Forcing a download using readfile()

// $file = 'monkey.gif';

// if (file_exists($file)) {
    // header('Content-Description: File Transfer');
    // header('Content-Type: application/octet-stream');
    // header('Content-Disposition: attachment; filename='.basename($file));
    // header('Expires: 0');
    // header('Cache-Control: must-revalidate');
    // header('Pragma: public');
    // header('Content-Length: ' . filesize($file));
    // ob_clean();
    // flush();
    // readfile($file);
    // exit;
// }

	//TESTING UPLOAD FILE
	public function actionBasic_upload()
	{
		$model=new Image_sample;
											
		if(isset($_POST['Image_sample']))
        {							
			$model->validate();
            $model->attributes=$_POST['Image_sample'];
            $model->name=CUploadedFile::getInstance($model,'name');
			$model->name->saveAs(Yii::app()->basePath . '/../upload/' . $model->name);
			
			Yii::app()->user->setFlash('success', 'File Uploaded');
         /*   if($model->save())  //JIKA SAVE KE DB
            {
                //$model->image->saveAs('path/to/localFile');
				$model->image->saveAs(Yii::app()->basePath . '/../images/' . $model->image);
                // redirect to success page
            }	*/
        }
		
        $this->render('/widget/FILE/basic_upload', array('model'=>$model));
    }
			
    // AJAX UPLOAD USING JQUERY-FORM
    public function actionAjax_upload()
	{
		$model=new Image_sample;
											
		if(isset($_POST['Image_sample']))
        {							
			$model->validate();
            $model->attributes=$_POST['Image_sample'];
            $model->name=CUploadedFile::getInstance($model,'name');
			$model->name->saveAs(Yii::app()->basePath . '/../upload/' . $model->name);
            echo Yii::app()->homeUrl . 'upload/' . $model->name;
        }
		else
            $this->render('/widget/FILE/ajax_upload', array('model'=>$model));
    }
    
	# DEMO YII-IMAGE ---------------------------------------------------------------------------
	public function actionEditImage()
	{			//dump(Yii::app()->params->uploadDir);	//echo $width; die();		
			$filename = $_POST['filename'];
			$re_width = isset($_POST['re_width']) ? $_POST['re_width'] : false;
			$re_height = isset($_POST['re_height']) ? $_POST['re_height'] : false;
			$rotate = $_POST['rotate'];
			$quality = $_POST['quality'];
			$sharp = $_POST['sharp'];
			$flip = ($_POST['flip']!='') ? (int) $_POST['flip'] : false;
			$grayscl = isset($_POST['grayscl']) ? $_POST['grayscl'] : false;
			$emboss = isset($_POST['emboss']) ? $_POST['emboss'] : false;
			$negate = isset($_POST['negate']) ? $_POST['negate'] : false;
			$edit_history = explode("," , $_POST['edit_his']);		//dump($edit_history);  die();
			$saveAs = $_POST['saveAs'];
			
		if($re_width || $re_height || $rotate || $quality || $sharp || $grayscl || $emboss || $negate || $flip || $saveAs !=""){
			$upload_dir = Yii::app()->params->uploadDir;	# 'upload/'
			$file = realpath(__DIR__.'/../../'.$upload_dir.'_temp/'.$filename);  //echo $file; dump(pathinfo($file, PATHINFO_FILENAME));  
			$fileExt =  ($saveAs !="") ? $saveAs : pathinfo($file, PATHINFO_EXTENSION);
			$newName = explode("_", pathinfo($file, PATHINFO_FILENAME))[0]."_{$_POST['occur']}.{$fileExt}"; 	//dump($newName); //die();
			$saveAs = $upload_dir."_temp/{$newName}";

			$image = Yii::app()->image->load($file);		//dump($image); die();
		
			// $image->resize(400, 100)->rotate(-45)->quality(75)->sharpen(20);
			if($re_width && $re_height) $image->resize($re_width, $re_height);	# resize($width, $height, $master = NULL)
			if($rotate) $image->rotate($rotate);	# rotate($degrees)
			if($quality) $image->quality($quality);	# quality($amount)  1-100
			if($sharp) $image->sharpen($sharp);	# sharpen($amount = 20) | 1-100
			if($grayscl) $image->grayscale($grayscl);
			if($emboss) $image->emboss($emboss);	# emboss($radius = 1) | 0..1
			if($negate) $image->negate($negate); 	# negate()
			if($flip) $image->flip($flip); # flip($direction)  - horizontal : 5, vertical : 6
			// if($crop) $image->crop();	#  crop($width, $height, $top = 'center', $left = 'center')
			// if($colorize) $image->colorize();   # colorize($r, $g, $b, $a)
			// if($centerPrv) $image->centeredpreview(100, 100);  # centeredpreview($width, $height)
			// if($cfit) $image->cfit($width, $height);	# cfit($width, $height)
			// // $image->watermark($path, $x = null, $y = null);	# watermark($path, $x = null, $y = null)
		
			//$image->render();   # render($keep_actions = FALSE) | keep or discard image process actions
			if($image->save($saveAs)){	#  save($new_image = false, $chmod = 0644, $keep_actions = false)
				$edit_history[] = $newName;	
				echo CJSON::encode( array('success'=>bu($saveAs), 'edit_history'=>$edit_history) );
			}
		}
		else echo CJSON::encode( array('error'=>'Tidak ada option edit yg di masukan..') );
	}

	public function actionSaveImage(){									//echo $_POST['filename'];
		$upload_dir = Yii::app()->params->uploadDir;
		$source =	realpath(__DIR__.'/../../'.$upload_dir.'_temp/'.$_POST['filename']);
		$fileinfo = pathinfo($source);					//print_r($fileinfo);
		$newfile = explode("_", $fileinfo['filename'])[0].".".$fileinfo['extension']; 	//echo $newfile;
		$dest = realpath(__DIR__.'/../../'.$upload_dir) ."/".$newfile ;		//echo "<hr>".$dest;
		
		if(file_exists($source)){
			$file_status = (file_exists($dest)) ? "<b class='txtAtt'>Overwrite file</b> : {$dest}" : "Save to : {$dest}";
			if(copy($source, $dest)){
				echo CJSON::encode( array(
					'success'=>$file_status,
					'image_link'=>bu($upload_dir.$newfile)) 
				);
				// UNLINK OL FILE ON TEMP ??
			}
		}
		else
			echo "ga ada";
	}

	# USE FOR EAjaxUpload demo
	public function actionUpload_eAjaxUpload()
	{
        Yii::import("ext-coll.UPLOAD_GALLERY.EAjaxUpload.qqFileUploader");
 
        $folder='upload/';// folder for uploaded files
        $allowedExtensions = array("jpg","png","gif");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);		
        $result = $uploader->handleUpload($folder);				//dump( $result );
		
		$fileSize=filesize($folder.$result["filename"]);	//GETTING FILE SIZE
        $fileName=$result["filename"];	//GETTING FILE NAME
		
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);					//dump( $return );
																																													
       echo $return;// it's array
	   //echo $fileSize;
	}
	
	# FOR EDITING IMAGE WITH "yii-image"
	public function actionLoadImage()
	{		//dump( $_FILES['test_upload']);  DIE(); //dump( CUploadedFile::getInstance()	); die();
		if(isset($_FILES['test_upload']))					
		{																
			$this->actionRemoveImage(Yii::app()->params->uploadDir.'/_temp/');	# remove old file
			
			$filename = $_FILES['test_upload']['name'];
			if( move_uploaded_file($_FILES['test_upload']['tmp_name'], Yii::app()->params->uploadDir. '/_temp/'.$filename) )	
				//echo CHtml::image( bu("upload/_temp/{$filename}"));
				echo bu(Yii::app()->params->uploadDir."/_temp/{$filename}");
			else
				echo "terjadi salah paham..";
		}
	}
	
	/** Uploads files submitted via CMultiFileUpload widget* Deletes all old files before uploading new files	 */
	public function actionCMultiFileUpload_Upload()
	{		//dump( CUploadedFile::getInstance()	); die();
		if(isset($_FILES['test_upload']))					
		{																//dump($_FILES['test_upload']);
			//upload new files
			foreach($_FILES['test_upload']['name'] as $key=>$filename)
				move_uploaded_file($_FILES['test_upload']['tmp_name'][$key],'upload/'.$filename);	#php function - Moves an uploaded file to a new location
				//move_uploaded_file($_FILES['test_upload']['tmp_name'][$key],Yii::app()->params['uploadDir'].$filename);	//cth : use set param
		}
		// $this->redirect(array('widget/CMultiFileUpload', 'view'=>'CMultiFileUpload'));
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	#USED ON CMultiFileUpload demo
	public function actionRemoveImage($dir='upload/', $file=null ){	
		if($file)
			unlink($file);
		else{
			foreach($this->findFiles($dir) as $filename)
				unlink($filename);	// delete old files (REPLACE OLD FILESS!!)
				//unlink(Yii::app()->params['uploadDir'].$filename);	//cth : use set param
		}
		
		if( ! Yii::app()->request->isAjaxRequest ) 
			$this->redirect(array('CMultiFileUpload', 'view'=>'CMultiFileUpload'));
	}
	
	public function findFiles($dir)
	{	
		$files = scandir($dir);		//dump($files);	die();
		$res = array();
		
		foreach( $files as $file ) {	
				if( file_exists( $dir . $file) && $file != '.' && $file != '..' && !is_dir( $dir . $file) ) {
					$ext = preg_replace('/^.*\./', '', $file);
					$res[] = $dir.$file;
				}
			}
		//return array_diff(scandir('upload/'), array('.', '..'));
		return $res;
	}
	
}
