<?php
class model_extController extends CController
{
    //. EXT : http://www.yiiframework.com/extension/models
	public $layout='/layouts/main';
	
    public function actionList()
    {																		
        $model = new MySearchModel();
       $model->addScope(MySearchModel::SCOPE_WITH_COMMENTS);
		//$model->addScope(Post::STATUS_PUBLISHED);
        if (isset($_POST['MySearchModel'])) {
            $model->attributes = $_POST['MySearchModel'];
        }
        // $dataProvider1 = array(
            // 'dataProvider1' => $model->search(),
        // );
		 $dataProvider1 =  $model->search();
		//dump($dataProvider1);
		

		#----------------------- SAMPPLE1
		$criteria=new CDbCriteria(array(
			'condition'=>'status='.Post::STATUS_PUBLISHED,
			'order'=>'update_time DESC',
			'with'=>'commentCount',
		));
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);

		$dataProvider2=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));		
		//$dataProvider2 = array('$dataProvider'=>$dataProvider2);
		//dump($dataProvide2r);
		
		$this->render('index',array( 'dataProvider1'=>$dataProvider1, 'dataProvider2'=>$dataProvider2));
		
        //$this->render('list', $viewData);
		//$this->render('index', $viewData);
    }
 

    /**
     * LOM DI TERUSIN
     */
    public function actionLogin()
    {
        $model = new LoginForm;    
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->submit()) {
                $this->redirect(Yii::app()->user->homeUrl);
            }
        }
        $this->render('login', array('model' => $model));
    }
 
	/*
	6. DAOModel base class used for submitting data into database under transaction or selecting data. 
		Model implements handling data access code for each access scenario.
	*/
}
?>