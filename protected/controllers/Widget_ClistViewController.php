<?php
class Widget_ClistViewController extends Controller
{
	public $layout='//layouts/column1';

	public function actionIndex() { 
		//$model=new TblUserMysql('search');		// dont have metode 'getData()
		$model=new CActiveDataProvider('TblUserMysql');  // DEFAULT TEMPLATE!!    //print_r($dataProvider);
		//$model= TblUserMysql ::model()->search();  //BISA JG DGN CARA INI
		
		$this->render('index',array('model'=>$model));
	}
	
	public function actionDynamic_view() { 
		// $model=new CActiveDataProvider('TblUserMysql');  // DEFAULT TEMPLATE!!    //print_r($dataProvider);
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		
		$model=new CActiveDataProvider('TblUserMysql', array(
			//'criteria'=>$criteria,		
			//'sort'=>$sort,
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
		));
		
		#AJAX
		if( Yii::app()->request->isAjaxRequest ) { 	
			$pager_style=null;
			
			if(isset($_GET['pager_style'])) {  //print_r($_GET);
			switch($_GET['pager_style'] )     
			{								//Yii::app()->getClientScript()->scriptMap=array('pager.css'=>false); 
				case 1: $pager_style=null; break;	
				case 2: $pager_style= bu('./css/mylist_custom/mypager_skyblue.css'); break;	
				case 3: $pager_style=CHtml::cssFile( bu('./css/mygrid_custom/mypager_skyblue_smoth_border.css') ); break;	 
				case 4: $pager_style=CHtml::cssFile( bu('./css/mylist_custom/custom.css') ); break;	
				default: $pager_style=null; break;
			}
			} 	
			//$pager_style = Yii::app()->request->baseUrl.'/css/mygrid_custom/mypager_skyblue_smoth_border.css';
			//$pager_style = '/css/mygrid_custom/mypager_skyblue_smoth_border.css';
			//cs()->registerCssFile( bu('/css/mygrid_custom/mypager_skyblue_smoth_border.css'));
			
			$this->renderPartial('dynamic_view/index',array('model'=>$model, "pager_style"=>$pager_style, 'view'=>isset($_GET['view']) ? $_GET['view'] : 'dynamic_view/_view' ), false, true );
			
		}
		else 
			$this->render('dynamic_view/index',array('model'=>$model, "pager_style"=>null, 'view'=>'dynamic_view/_view'));  
	}

	
}