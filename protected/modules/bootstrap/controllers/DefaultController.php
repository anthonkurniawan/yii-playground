<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		//echo"<pre>";print_r(Yii::AdminModule()  ); echo"</pre>";
		$this->render('modal');
	}

}