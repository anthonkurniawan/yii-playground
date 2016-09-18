<?php
class Widget_CgridViewController extends AdminController
{
	public $layout='//layouts/column1';

	/**@return array action filters */
	// public function filters()
	// {
		// return array(
			// 'accessControl', // perform access control for CRUD operations
		// );
	// }
	
	public function actionIndex()
	{	
		$this->render('/Widget_CgridView/index');
	}

	protected function performAjaxValidation($model) {												
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model); 
			Yii::app()->end();
		}
	}
	
	#================================================ CONTOH GRID TABLE
	public function actionGridDefault() { 
		//$model=new TblUserMysql;   //BEDA NYA KLO INI GA BISA DI FILTER/SEARCH
		$model=new TblUserMysql('search_join');			//PRINT_R($model);

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserMysql']))
			$model->attributes=$_GET['TblUserMysql']; 
			
		$this->render('/Widget_CgridView/GridDefault',array( 'model'=>$model));
	}
	
	public function actionGrid_dynamic_style() {
		$model=new TblUserMysql('search_join');			

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserMysql']))
			{ $model->attributes=$_GET['TblUserMysql']; }
		
		 //$cs = Yii::app()->getClientScript();  
		//$cs->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css');
		//$cs->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css', CClientScript::POS_HEAD); 
		
		$url=Yii::app()->baseUrl;
		if(isset($_GET['grid_style'])) {  //print_r($_GET);
			switch($_GET['grid_style'] )     
			{								
				case 1: $grid_style=CHtml::cssFile($url.'/css/mygrid_custom/mygrid_light.css'); break;	
				case 2: $grid_style=CHtml::cssFile($url.'/css/mygrid_custom/mygrid_skyblue.css'); break;	 
				case 3: $grid_style=CHtml::cssFile($url."/css/mygrid_custom/gridview_dhtml.css"); break;	
				case 4: $grid_style=CHtml::cssFile($url."/css/mygrid_custom/gridview_custom.css"); break;	
				case 6: $grid_style=CHtml::cssFile($url."/css/mygrid_custom/mygrid_skyblue2.css"); break;	
				default: $grid_style=null; break;
			}
		} 
		else { $grid_style=null; }
		
		if(isset($_GET['pager_style'])) {  //print_r($_GET);
			switch($_GET['pager_style'] )     
			{								
				case 1: $pager_style=null; break;	
				case 2: $pager_style=CHtml::cssFile($url.'/css/mygrid_custom/mypager_skyblue.css'); break;	
				case 3: $pager_style=CHtml::cssFile($url.'/css/mygrid_custom/mypager_skyblue_smoth_border.css'); break;	 
				default: $pager_style=null; break;
			}
		} 
		else { $pager_style=null; }
		
		
		// if( Yii::app()->request->isAjaxRequest ) {  
			// //echo CHtml::cssFile($url.'/css/mygrid_custom/mygrid_skyblue.css');
			 // //Yii::app()->getClientScript()->scriptMap=array('jquery.js'=>false, 'styles.css'=>false); 
			 // //Yii::app()->clientScript->registerCssFile($url."/css/mygrid_custom/gridview_custom.css"); 
			 
			 // // cs()->registerCssFile(
			// // Yii::app()->getAssetManager()->publish(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css') );
		// // Yii::app()->getClientScript()->scriptMap=array('styles.css'=>false); 
		
			 // $this->render('Grid_dynamic_style',array('model'=>$model, 'grid_style'=>$grid_style ), false, true);
			// //$this->renderPartial('Grid_dynamic_style',array('model'=>$model, 'grid_style'=>$grid_style ) , false, true);
		// }
		// else {  
			// $this->render('Grid_dynamic_style',array('model'=>$model, 'grid_style'=>$grid_style ), false, true);
		// }  
							 //Yii::app()->getClientScript()->scriptMap=array('styles.css'=>false); 
								
		$this->render('/Widget_CgridView/Grid_dynamic_style',array('model'=>$model, 'grid_style'=>$grid_style, 'pager_style'=>$pager_style ),false,true );
	}
	
	public function actionGrid_dynamic_style2() {
		$model=new TblUserMysql('search_join');			//PRINT_R($model);

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserMysql']))
			$model->attributes=$_GET['TblUserMysql']; 
		
		 //$cs = Yii::app()->getClientScript();  
		//$cs->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css');
		//$cs->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css', CClientScript::POS_HEAD); 
		// $cs->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mypager_skyblue.css');
		
		$url=Yii::app()->baseUrl;
		//Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mypager_skyblue.css',CClientScript::POS_END); 
		
		if(isset($_GET['grid_style'])) {  //print_r($_GET);
			switch($_GET['grid_style'] )     
			{								
				case 1: $grid_style=Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_light.css'; break;	
				case 2: $grid_style=CHtml::cssFile($url.'/css/mygrid_custom/mygrid_skyblue.css'); break;	 
				case 3: $grid_style=CHtml::cssFile($url."/css/mygrid_custom/gridview_dhtml.css"); break;	
				case 4: $grid_style=CHtml::cssFile($url."/css/mygrid_custom/gridview_custom.css"); break;	
				default: $grid_style=null; break;
			}
			echo $grid_style=Yii::app()->request->baseUrl.'/css/mygrid_custom/mygrid_light.css';
			//echo CHtml::cssFile($url."/css/mygrid_custom/gridview_custom.css");  
		
		} 
		else { $grid_style=null; }
		
		if(isset($_GET['pager_style'])) {  //print_r($_GET);
			switch($_GET['pager_style'] )     
			{								
				case 1: $pager_style=CHtml::cssFile($url.'/css/mygrid_custom/mypager_skyblue.css'); break;	
				case 2: $pager_style=CHtml::cssFile($url.'/css/mygrid_custom/mypager_skyblue_smoth_border.css'); break;	 
				default: $pager_style=null; break;
			}
		} 
		else { $pager_style=null; }
		
		//cs()->registerCssFile($url."/css/mygrid_custom/gridview_custom.css");
		
		$this->render('/Widget_CgridView/Grid_dynamic_style2',array('model'=>$model, 'grid_style'=>$grid_style, 'pager_style'=>$pager_style ), false, true );
	}
	
	public function actionGridResize() { 
		$model=new TblUserMysql('search_join');			//PRINT_R($model);

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserMysql']))
			$model->attributes=$_GET['TblUserMysql']; 
		$this->render('/Widget_CgridView/GridResize',array( 'model'=>$model));
	}
	
	public function actionGridJoin() {
		// page size drop down changed
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}

		$model=new TblUserMysql('search_join');			//PRINT_R($model);
	
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserMysql']))
			$model->attributes=$_GET['TblUserMysql']; 
			
		//Yii::app()->getClientScript()->scriptMap=array('styles.css'=>false);  //DISABLE DEFAULT CSS
		
		$this->render('/Widget_CgridView/GridJoin',array( 'model'=>$model));
	}
	
	public function actionUpdateJoin($id)
	{
		$model=TblUserMysql::model()->loadModel($id);				
		$model2=TblData::model()->loadModel($id);								//dump($model2->propic_id);
		isset($model2->propic_id) ? $model3=TblPic::model()->loadModel($model2->propic_id) : $model3 = new TblPic; //dump($model3->pic_id);

		$this->performAjaxValidation($model);      

		if( isset( $_POST['TblUserMysql'] ) ) {				//dump($_POST);
			$model->attributes=$_POST['TblUserMysql'];
			$model2->attributes=$_POST['TblData'];
			
			//$model2->update_time=	date("Y-m-d");	
			$model3->filename_ori=CUploadedFile::getInstance($model3,'filename_ori');   //**TARO SBELUM SAVE
																					    //echo"<br><b>model3->attributes->filename_ori :</b>". $model3->attributes['filename_ori']; 
			if($model3->filename_ori!=null) {  
				$model2->propic_id='propic'.$model->id;	#KASIH VALUE (propic_id) 						
				$filename = $model3->filename_ori;	#RUBAH NAMA-FILE SESUAI ID for SAVE AS TO FOLDER UPLOAD	
				$model3->pic_id=$model2->propic_id;																		
			}																	
																			
			#cek validasi di sini / alternatif dari $model->save(true) -->default																	
			$valid = $model->validate()&&$model2->validate()&&$model3->validate();				//echo "testValid".$valid;
			
			#save data
			if($valid)  {
				$model->save(false);
				$model2->save(false);
		
				if($model3->filename_ori!=null) {  
					$model3->filename_ori->saveAs(Yii::app()->basePath . '/../upload/'.$filename );		
					$model3->save(false);
					Yii::app()->user->setFlash('upload', 'File Uploaded'); 
				}
				Yii::app()->user->setFlash('update', 'Update Success');
				//$this->refresh();
				//$this->redirect(array('Widget_CgridView/GridJoin'));
			}
			
			if( $model->save() ) {
				if( Yii::app()->request->isAjaxRequest ) { 
					// Stop jQuery from re-initialization
					//Yii::app()->clientScript->scriptMap['jquery.js'] = false;
 
					echo CJSON::encode( array(
						'title' => 'Update User '.$model->username,
						'status' => 'success',
						'content' => '<span>Update User '.$model->username.' successfully created</span>',
					)); 
					exit;
				}
				// else
					// $this->redirect(array('Widget_CgridView/GridJoin'));
			}
		}

		if( Yii::app()->request->isAjaxRequest ) {  
			// Stop jQuery from re-initialization							
			//Yii::app()->clientScript->scriptMap['jquery.js'] = false;
			echo CJSON::encode( array(
				'title' => 'Update User '.$model->username,
				'status' => 'failure',
				'content' => $this->renderPartial( '/Widget_CgridView/partial_file/_formDialog', array( 'model' =>$model,  'model2' =>$model2, 'model3' =>$model3), true),
			));
			exit;
		}
		else
			$this->render('/Widget_CgridView/partial_file/update',array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3 ));
	}
	
	public function actionCreate() 
	{								
		$model = new TblUserMysql;
		$model2 = new TblData;
		$model3 = new TblPic;
												//echo $this->getOwner()->getTableSchema()->getColumn($attribute)->dbType;
		//$model->unsetAttributes();  // clear any default values
		
		$this->performAjaxValidation($model);
		
		if( isset( $_POST['TblUserMysql'] ) ) {						//dump($_FILES);  dump($_POST);  //dump($_SERVER);
			$model->attributes = $_POST['TblUserMysql'];
			$model2->attributes = $_POST['TblData'];				//dump($model2->attributes);
			
			$model->id = $model->getTopID('id');			#echo "testtt-->".$model->id ;
			$model2->id = $model->id;
			// $model2->create_time= date("Y-m-d");														
			$model3->filename_ori=CUploadedFile::getInstance($model3,'filename_ori');  // dump($model3->filename_ori);   //**TARO SBELUM SAVE
																					    //echo"<br><b>model3->attributes->filename_ori :</b>". $model3->attributes['filename_ori']."</br>"; 
																				
			if($model3->filename_ori!=null) {  
				$model2->propic_id='propic'.$model->id;	#KASIH VALUE (propic_id) 						
				$filename = $model3->filename_ori;    //$model2->propic_id.'.png';	#RUBAH NAMA-FILE SESUAI ID for SAVE AS TO FOLDER UPLOAD	
				$model3->pic_id=$model2->propic_id;																
			}																	
																				//echo "test date".date("Y-m-d");
			#cek validasi di sini / alternatif dari $model->save(true) -->default																	
			$valid = $model->validate()&&$model2->validate()&&$model3->validate();				//echo "testValid".$valid;
												//$valid=0;
			#save data
			if($valid)  {					
				 if($model->password) $model->password = md5($_POST['TblUserMysql']['password']);
				$model->save(false);	//save(boolean $runValidation=true, array $attributes=NULL)
				$model2->save(false);
		
				if($model3->filename_ori!=null) {  					
					$model3->filename_ori->saveAs(Yii::app()->basePath . '/../upload/'.$filename);		
					$model3->save(false);		
					Yii::app()->user->setFlash('upload', 'File Uploaded'); 		
				}
				Yii::app()->user->setFlash('update', 'Update Success');
				//$this->refresh();
				#$this->redirect(array('Widget_CgridView/GridJoin'));
			}
			
			if( $model->save() ) {
				if( Yii::app()->request->isAjaxRequest ) { 
					// Stop jQuery from re-initialization
					Yii::app()->clientScript->scriptMap['jquery.js'] = false;
					Yii::app()->clientScript->scriptMap['jquery-ui.min.js'] = false;

					echo CJSON::encode( array(
						'status' => 'success',
						'content' => '<span>New User successfully created</span>',
					));
					exit;
				}
				// $this->redirect( array( 'partial_file/view', 'id' => $model->id ) );
			}
		}
 
		if( Yii::app()->request->isAjaxRequest ) {  
			// Stop jQuery from re-initialization							
			#Yii::app()->clientScript->scriptMap['jquery.js'] = false;
							
			echo CJSON::encode( array(
				'title' => 'Create new User',
				'status' => 'failure',
				'content' => $this->renderPartial( '/Widget_CgridView/partial_file/_form', array( 'model' =>$model,  'model2' =>$model2, 'model3' =>$model3), true),
			));
			//exit;
		}
		else
			//$this->render( 'partial_file/create', array('model'=>$model,  'model2'=>$model2, 'model3'=>$model3 ),false );
			$this->render( '/Widget_CgridView/partial_file/_form', array('model'=>$model,  'model2'=>$model2, 'model3'=>$model3 ),false );
	}
	
	
	public function actionUpdate($id){
		$model=TblUserMysql::model()->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);     
																				
		if(isset($_POST['TblUserMysql']))	{									//dump($_POST);
			$model->attributes=$_POST['TblUserMysql'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('/Widget_CgridView/partial_file/update',array('model'=>$model,));
		
		// if (Yii::app()->request->isAjaxRequest) 
		// {																		//echo"ajax request";
			// $this->renderPartial('partial_file/view', array(
                // 'model'=>$this->loadModel($id), false,true));
           
		   // //js-code to open the dialog    
			// if (!empty($_GET['asDialog'])) 
				// echo CHtml::script('
					// //$("#dialog").dialogContent.empty();
					// $("#dialog").dialog({"title":"View User" } );
					// $("#dialog").dialog("open")'
				// );
			// Yii::app()->end();
		// }
	}
	
	#GridView with  "Eupdatedialog" -------------------------------------------------
	public function actions()
	{
		return array(
			'view_eupdateDialog'=>array('class'=>'application.controllers.EupdateGrid_actions.ViewAction', 'ajaxView'=>'partial_file/view' ),
			'update_eupdateDialog'=>array('class'=>'application.controllers.EupdateGrid_actions.UpdateAction', 'modelName'=>'TblUserMysql', 'ajaxView'=>'/userMysql/_form', 'callback'=>'logSave' ),
			//'delete_eupdateDialog' =>array('class'=>'application.controllers.EupdateGrid_actions.DeleteAction', 'ajaxView'=>'partial_file/delete'  ),
			'create_eupdateDialog' =>array('class'=>'application.controllers.EupdateGrid_actions.CreateAction', 'modelName'=>'TblUserMysql', 'ajaxView'=>'/userMysql/_form', 'view'=>'/userMysql/_form'  ),
		);
	}
	public function setFlash( $key, $value, $defaultValue = null )
	{
		Yii::app()->user->setFlash( $key, $value, $defaultValue );
	}
	
	public function logSave(){
		//print_r($_POST); print_r($_GET); 
		$logs=new Logs;
		$logs->id_user = Yii::app()->user->id; 
		$logs->stamp = date('Y-m-d');	//new CDbExpression('NOW()');//	time();  //date('Y-m-d h:m:s'); 
		$logs->event = 'Update user:'. $_GET["id"]; 	//print_r($logs->attributes);
		$logs->save();
	}
	
	public function actionGridEupdatedialog()
	{
		$model=new TblUserMysql('search_join');			//PRINT_R($model);
	
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserMysql']))
			$model->attributes=$_GET['TblUserMysql']; 

		$this->render('/Widget_CgridView/Eupdatedialog',array( 'model'=>$model));
	}

	/**-- Deletes a particular model. berdasarkan '$id' param.  redirected to the 'admin' page --**/
	public function actionDelete($id)	
	{	// we only allow deletion via POST request
		if(Yii::app()->request->isPostRequest){		
			//$this->loadModel($id)->delete();	#default sample
			TblUserMysql::model()->loadModel($id)->delete();  #delete on "tbl_user_mysql"
			
			$picID=TblData::model()->loadModel($id);		#cek pada "tbl_data" apa ada pic user
			if($picID->propic_id!=null) { 
				TblPic::model()->loadModel($picID->propic_id)->delete(); #delete on "tbl_pic"
			}
			$picID->delete();	#delete on "tbl_data"
			//TblData::model()->delModel(21);  // TESTING DEL PAKE CLASS MODEL
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	#============================================================================
	#fFANCY BOX VIEW --------------------
	public function actionPicView(){ 
		//echo $_GET['id2'];  print_r($_GET);
		$this->render('/Widget_CgridView/partial_file/picView',array('file'=>$_GET['file'],));
	}
	
	public function actionView($id)
	{	
		if (Yii::app()->request->isAjaxRequest) 
		{																		//echo"ajax request";
			$this->renderPartial('/Widget_CgridView/partial_file/view', array( 'model'=> TblUserMysql::model()->loadModel($id, true), false,true));
       
		   
		   //js-code to open the dialog    
			if (!empty($_GET['asDialog'])) 
				echo CHtml::script('
					//$("#dialog").dialogContent.empty();
					$("#dialog").dialog({"title":"View User" } );
					$("#dialog").dialog("open")'
				);
			Yii::app()->end();
		}
		else
			$this->render('/Widget_CgridView/partial_file/view', array( 'model'=>TblUserMysql::model()->loadModel($id), ));
	}
	
	//public function actionViewAll($id)
	public function actionViewSelected()
	{														
		if (Yii::app()->request->isAjaxRequest) 
		{									//print_r($_GET["id"]);	echo"VIEW FROM RENDER PARTIAL<br>";
			#CONTOH PAKE RENDER PARTIAL PAGE
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;  
			foreach( $_GET["id"] as $id) {
				$model=TblUserMysql::model()->findByPk($id);					
				//$this->renderPartial('partial_file/view', array( 'model'=>$model) );
				$this->renderPartial('partial_file/view', array( 'model'=>TblUserMysql::model()->loadModel($id) ));
           }
		  exit;
		}
		// else
			// $this->render('partial_file/view', array( 'model'=>$this->loadModel($id), ));
	}
	
	#CONTOH PAKE DIALOG
	public function actionViewSelected_D()
	{					
		if (Yii::app()->request->isAjaxRequest) 
		{									//print_r($_GET["id"]);	echo"VIEW FROM DIALOG<br>";		
			Yii::app()->clientScript->scriptMap['jquery.js'] = false;  
			
			// $idx="id='' ";
			// foreach($_GET["id"] as $id) {   $idx .=" OR id=$id"; } 	# SAMPLE USING "OR" kondisi
		   $arr = implode(",", $_GET["id"]);  # USING "IN" cond

			# LOAD DATA VIA MYCActiveRecord FN 
			$dataProvider = TblUserMysql::model()->loadData(null, 'id in ('.$arr.')');
			
		   echo CJSON::encode( array(
				'status' => 'failure',
				//'content' => $this->renderPartial( 'partial_file/view', array('dataProvider'=>$dataProvider ), true, true ),
				'content' => $this->renderPartial( '/userMysql/index', array('dataProvider'=>$dataProvider ), true, true ),
			));
			exit;
		}
		// else
			// $this->render('partial_file/view', array( 'model'=>$this->loadModel($id), ));
	}
	
	#fFUNCTION GET VALUE --------------------
	protected function encode_user($data,$row){
		return "<ul><li>".CHtml::encode($data->id) ."</li><li>" . CHtml::encode($data->username)."</li></ul>";
	}
	
	#HITUNG LOGS USER JIKA ADA
	protected function LogsDialog($data,$row){  	
		$result = Logs::model()->getLog_count($data->id);  # Fn on MYCActiverecord
			
		return CHtml::ajaxLink(
			$result.' logs'.$data->id,          // the link body (it will NOT be HTML-encoded.)
			array('widget_CgridView/LogsData2'),  // If empty, it is assumed to be the current URL.
			array(
				'data'=>array("id"=>$data->id,"asDialog"=>1),
				// 'dataType'=>'json',
				'update'=>'#dialog div.dialogContent', 
				//'beforeSend' => 'function() {  $("#maindiv").addClass("loading"); }',
				//'complete' => 'function() { $("#maindiv").removeClass("loading"); }', 
			),
			array(
				'style'=>'cursor: pointer; text-decoration: none;',
				'title'=>$result.' logs',   
				//'class'=>'tooltip_ajax',
				'onclick'=> '{ $("#dialog").dialog("open"); } ', 
					//'js:function(){ $("dialog").dialog("open"); }'
			)
		);
	}
	
	#Logs With Tooltip
	protected function LogsTooltip($data,$row) {  	
		$result = Logs::model()->getLog_count($data->id);  # Fn on MYCActiverecord
		
		return CHtml::link($result.' logs',
			//array('/widget_CgridView/LogsData2/'.$data->id),  // If empty, it is assumed to be the current URL.
			$this->createUrl("widget_CgridView/LogsData2", array("id"=>$data->id)),
			array(
				'style'=>'cursor: pointer; text-decoration: none;',
				'title'=>$result.' logs',   
				'class'=>'tooltip_ajax',
				//'onclick'=> '{ $("#dialog").dialog("open"); } ', 
					//'js:function(){ $("dialog").dialog("open"); }'
			)
		);	
	}
	
	# EXTENDED FOR "CDataColumn" Gridjoin ( data cell using evaluateExpression  )
	protected function LogsData($data,$row){  
		# USING FN "loadData($id, $condition)"
		$dataProvider = Logs::model()->loadData($data->id, 'id_user='.$data->id);
		return $dataProvider !='' ? $this->renderPartial('/Widget_CgridView/partial_file/DataLogs',array('dataProvider'=>$dataProvider),true) : "empty" ;
	}
	
	
	public function ActionLogsData2($id){  ; //print_r($_REQUEST);
		$dataProvider = Logs::model()->loadData($id, 'id_user='.$id);		

		if (Yii::app()->request->isAjaxRequest) 													
            $this->renderPartial('/Widget_CgridView/partial_file/DataLogs',array('dataProvider'=>$dataProvider));
		else
			return $dataProvider !='' ? $this->renderPartial('/Widget_CgridView/partial_file/DataLogs',array('dataProvider'=>$dataProvider),true) : "empty" ;
	}
	
}
