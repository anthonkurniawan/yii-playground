<?php
class AjaxController extends AdminController
{
	public function actionIndex()	
	{																//dump(Yii::app()->getClientScript());
																	//dump(Yii::app()->getClientScript()->getCoreScriptUrl());
		if (Yii::app()->request->isAjaxRequest) {		
			Yii::app()->clientScript->registerCoreScript('jquery.ui');
			cs()->registerScriptFile(Yii::app()->baseUrl . '/js/common.js');
			//cs()->registerCoreScript('sntaxHL');  # tanpa ini sudah load
			//$this->avoid_reload_sntaxHL();		# RELOAD for sntaxHighlighter ( kalo sudah di load di view bisa, tapi klo dari awal load  via ajax ga perlu - tapi reload treus)
			cs()->registerScript('sntax', 	"js: SyntaxHighlighter.highlight();");
			cs()->registerScript('tooltip', 	"js: $('.tooltip').tooltip();");

			$this->renderPartial($_GET["view"], null, false, true);		//ajax request harus set "false", "true"
		}
		else
		$this->render('index');
	}
	//#test request1
	public function actionReq1() {
		echo date('H:i:s'); echo __FILE__;
		Yii::app()->end();
	}
	

	public function actionReq3() {
		echo CHtml::encode(print_r($_POST, true));
	}
	
	//----------------------------------------------------- Admin_ajax ---------------------------------------------------------//
	public function actionAdmin_ajax()
	{
		$model=new TblUserMysql('search');
		$model->unsetAttributes();  // clear any default values
		
		//ECHO "GET USER :";PRINT_R($_GET['TblUserMysql']);
		if(isset($_GET['TblUserMysql']))			
			$model->attributes=$_GET['TblUserMysql']; 

		$this->render('gridView/admin_ajax',array('model'=>$model,));
	}
	
	//#GridView With Ajax (load update.php)
	public function actionUpdate($id)
	{																					
		$model=$this->loadModel($id);
		// $this->performAjaxValidation($model);

		 if(isset($_GET['ajax'])) {           //if(Yii::app()->request->isAjaxRequest)
			$model->attributes=$_POST['TblUserMysql'];
			//$model->save();
			
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
				else
					$this->redirect(array('Widget_CgridView/GridJoin'));
			}

		 }
		else
			$this->renderPartial('gridView/update',array('model'=>$model,), false, true);
	}
	
	//----------------------------------------------------- Admin_ajax2 ---------------------------------------------------------//
	//#GridView With Ajax2 (load data from this controller/ no refresh..)
	public function actionAdmin_ajax2()
	{										
		$model=new TblUserMysql('search');				//echo $this->loadModel(1);		
		$model->unsetAttributes();  // clear any default values
		
		$model_create=new TblUserMysql;		
		$this->performAjaxValidation($model_create); //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

		$this->render('gridView2/admin_ajax2',array(
			'model'=>$model, 'model_create'=>$model_create,
		));
	}
	
	// ----------------------------------------------------------- LOGIN FROM AJAX
	public function actionAjax_login() {	
		 header('Access-Control-Allow-Origin: *');	# for cross domain
		//print_r($_SERVER['CONTENT_TYPE']);

		if($_SERVER['CONTENT_TYPE'] =='application/json;charset=UTF-8'){		
			# php://input is a read-only stream that allows you to read raw data from the request body. In the case of POST requests, it is preferable to use php://input instead of $HTTP_RAW_POST_DATA as it does not depend on special php.ini directives. Moreover, for those cases where $HTTP_RAW_POST_DATA is not populated by default, it is a potentially less memory intensive alternative to activating always_populate_raw_post_data. php://input is not available with enctype="multipart/form-data".
			$request_body = file_get_contents('php://input');		//echo $request_body;
			$data = CJSON::decode($request_body);						//print_r($data);		
			$username = isset($data['username']) ? $data['username'] : false;
			$password = isset($data['password']) ? $data['password'] : false;		//echo $username . $password;
		}
		# application/x-www-form-urlencoded; charset=UTF-8
		else{
			$username = isset($_POST['username']) ? $_POST['username'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
		}
		
		if($username && $password)
		{
			$model=new LoginForm;   //class dari yiiTest/protected/models/LoginForm.php
		
			//print_r($model->attributes);
			$model->username = $username;	//'admin';
			$model->password = $password;
		
			if($model->validate() && $model->login())  {
				//dump($model);//dump($data->attributes); 
				$user =TblUserMysql::model()->findByPk(Yii::app()->user->id );
				$data = array(
					'status'=>'true',
					'data'=>$user->attributes
				);
			} 
			else { 
				//dump($model); dump($model->errors);	
				$data = array( 'status'=>'false', 'data'=>$model->errors );
			}
		}
		else{
			$data = array( 'status'=>'false','data'=>'Username and Password cant not empty');
		}
		
		echo  json_encode( $data);
	}
	
	// HTTP REQUEST
	// public function actionGetUser() {
		// //echo CHtml::encode(print_r($_POST, true));
		// $model=TblUserMysql::model()->findByPk(1);
		// if($model===null)
			// throw new CHttpException(404,'The requested page does not exist.');
		// //return $model;
		// $res =array(
			// //'c_date'=>Yii::app()->lc->toLocal($model->c_date, 'date', 'small'),
			// 'username'=>$model->username,
			// 'password'=>$model->password,
			// 'email'=>$model->email,
			// 'first_name'=>$model->first_name,
			// 'role'=>$model->role,
		// );
		// echo CJSON::encode($res);
	// }
		
	//load datanya dari sini saat pilih satu row data by id and send BACK by JSON
	public function actionAjax_getUser() {	
		//header('Content-Type: application/x-www-form-urlencoded; charset=UTF-8');	# for cross domain
		
		 if(isset($_SERVER['HTTP_ORIGIN'])){ 					//echo "HTTP_ORIGIN-->". $_SERVER['HTTP_ORIGIN'];
			header('Access-Control-Allow-Origin: *');	# for cross domain, IF WIITH "withCredentials" dont using wildcard "*"
			//header('Access-Control-Allow-Origin: http://localhost');	# ONLY RESTRICT TO "localhost"
			// respond to preflights
			if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
				// return only the headers and not the content
				// only allow CORS if we're doing a GET - i.e. no saving for now.
				if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET') {
					header('Access-Control-Allow-Headers: X_REST_CORS, X-Requested-With');	# USING "preflight" cth bisa: X_REST_CORS atau X-Requested-With
				}
				exit;
			}
		}
		# ALLOW CROSS DOMAIN
		
		// $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
		// if ($ajax) {// handle specific Ajax differently...
			// ECHO "_SERVER['HTTP_X_REQUESTED_WITH'] --> ".$_SERVER['HTTP_X_REQUESTED_WITH'];
		// }

		// echo "<pre>". print_r($_SERVER)."</pre>";
																			//$data = file_get_contents("php://input");			Access-Control-Allow-Credentials: true, for using crendential
																			//$postData = json_decode($data);  echo"<h1>".$postData."</h1>";
		# METHOD REQUEST					
		if(isset($_POST['id'])){
			$select = $_POST['id'];
			$Dtype = $_POST['tipe'];
		}
		else if(isset($_GET['id'])){
			$select = $_GET['id'];
			$Dtype = $_GET['tipe'];
		}
		else {
			$select = 'all';
			$Dtype = 'html';
		}
			
		# QUERY	
		if($select=='all'){	# ALL
			$all = Yii::app()->db->createCommand('SELECT * FROM tbl_user_mysql');
			$data = $all->queryAll();
			//echo CJSON::encode($data);  //print_r($all);
			$this->convert_data($Dtype, $data);
		}
		else {
			$select = (int)$select;
			$model =TblUserMysql::model()->findByPk($select);         //echo $model->username."<br>";
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			
			$data[] =array(
				//'c_date'=>Yii::app()->lc->toLocal($model->c_date, 'date', 'small'),
				'id'=>$model->id,
				'username'=>$model->username,
				'password'=>$model->password,
				'email'=>$model->email,
				'first_name'=>$model->first_name,
				'role'=>$model->role,
			);		
			$this->convert_data($Dtype, $data);
		}
	}
	
	public function convert_data($type='text', $data){	
		if($type=='text'){	
			//echo htmlspecialchars("<a href='test'>Test</a>");
			$str = "<pre>". print_r($data, true). "</pre>";		//var_dump($str);
			echo htmlspecialchars($str);  
			//echo CJavaScript::encode($data);
			//echo json_encode($data);
			//echo "<br>". CHtml::decode( $data );
			// echo CJavaScript::encode($data);
			// echo CJSON::encode($data);
			// echo implode("-", $data);
			// echo serialize($data);
			//CHtml::encode( "<a href='test'>Test</a>" );
			// json_decode(file_get_contents('php://input'));
		}
		elseif($type=='html'){
			echo "<pre>"; print_r($data); echo"</pre>";
		}
		elseif($type=='json'){
			echo CJSON::encode($data);
		}
		elseif($type=='xml'){  //print_r($data);
			$xmlDoc = new DOMDocument();
			$root = $xmlDoc->appendChild($xmlDoc->createElement("userlist"));
			$i = 0;
			foreach ($data as $user) {
				$xmlNode = $root->appendChild($xmlDoc->createElement("user"));
				
				$xmlNode->appendChild($xmlDoc->createElement("id", $user['id']));
				$xmlNode->appendChild($xmlDoc->createElement("username", $user['username']));
				$xmlNode->appendChild($xmlDoc->createElement("password", $user['password']));
				$xmlNode->appendChild($xmlDoc->createElement("email", $user['email']));
				$xmlNode->appendChild($xmlDoc->createElement("role", $user['role']));
				//$xmlNode->appendChild($xmlDoc->createElement("role", isset($user['role'])));
			}
			header("Content-Type: text/xml");
			$xmlDoc->formatOutput = true;
			echo $xmlDoc->saveXml();
			# for view encode html
			# echo htmlentities($xmlDoc->saveXml());
		}	
		elseif($type=='jsonp'){
			/* If a callback has been supplied then prepare to parse the callback
			** function call back to browser along with JSON. */
			$jsonp = false;
			if ( isset( $_GET[ 'callback' ] ) ) {
				$_GET[ 'callback' ] = strip_tags( $_GET[ 'callback' ] );	//hilangkan any "html tags" jika ada
				$jsonp = true;

				$pre  = $_GET[ 'callback' ] . '(';
				$post = ');';
			} 

			/* Encode JSON, and if jsonp is true, then ouput with the callback
			** function; if not - just output JSON. */
			$json = json_encode( $data );
			print( ( $jsonp ) ? $pre . $json . $post : $json );
		}
		
	}
	
	# view XML doc
	public function actionXml_view()
	{
		$output = $myXMLString; // I don't know where you are getting your XML from, but this is it
		$output = htmlentities($output); // convert HTML/XML tags like < to their HTML codes ($lt;))
		$this->render('view',array(
			'xmlString'=>htmlentities($output), // send it to the view for rendering
		));
	}
	
	//# UPDATE RECORD
	public function actionUserinputSave() {		
		//if(isset($_POST['TblUserMysql'])) {			
			//$model->attributes=$_POST['TblUserMysql']; 
			
			$model=$this->loadModel($_POST['id']);			
									
			$model->id = $_POST['id'];
			$model->username = $_POST['TblUserMysql']['username'];
			$model->password = $_POST['TblUserMysql']['password'];
			$model->first_name = $_POST['TblUserMysql']['first_name'];
			$model->role = $_POST['TblUserMysql']['role'];
			$model->email = $_POST['TblUserMysql']['email'];

			$model->save();
			//}
	}
	
	public function loadModel($id)
	{
		$model=TblUserMysql::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	/***--Performs the AJAX validation.	@param CModel the model to be validated--***/
	protected function performAjaxValidation($model)
	{													
		if(isset($_POST['ajax']) && $_POST['ajax']==='TblUserMysql-form')
		{
			echo CActiveForm::validate($model); 
			Yii::app()->end();
		}
	}
	
	
}
?>