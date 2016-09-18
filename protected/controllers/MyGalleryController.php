<?php
class MyGalleryController extends GalleryController  # EXTEND for using "gallery-manager"
{
	public $breadcrumbs=array();
	public $menu=array();
	
	public function filters()
	{
		return array(
			'accessControl + galleryManager', // perform access control for CRUD operations
		);
	}
	
	public function accessRules() {
        return array(
            array('allow',
                'actions'=>array('galleryManager'),
                'users'=>array('@'),
            ),
			//** DENY ALL USERS
			array('deny',  // deny all users
				'users'=>array('*'),
			),
        );
    }
	
	public function actions(){
        return array(
			'jSupersized'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GALLERY'),
			'Magnific-Popup'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GALLERY'),
			'galleria'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GALLERY'),
		);
	}
	
	#------------------------------------------------- GALLERY  MANAGER EXT
	public function actionGalleryManager()
	{
		$model = TblUserMysql::model()->findByPk(Yii::app()->user->id);		//dump($model); die();
																				
		if(isset($_POST['TblUserMysql']))	{
			$model->save();
		}
		$this->render('/WIDGET/GALLERY/gallery_manager',array('model'=>$model,));
	}
	
	
	#COPY DUPLICATE FROM "ImageController"
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