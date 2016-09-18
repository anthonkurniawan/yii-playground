<?php $this->layout='column1';?> 

<style>pre { tab-size:2}</style>

<div class="view2">
Test error :
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
try {
    throw new Exception("Some error message");
	 throw new CException(Yii::t('yiisolr', 'YSolrConnection::updateOne() - Input document must be an array.'));
} catch(Exception $e) {
    echo $e->getMessage();
	$this->data['Success'] = false;
	$this->data['ReturnMessage'] = $e->getMessage();
	$this->data['ReturnCode'] = $e->getCode(); 
}
*/ ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>


I can specify custom errorHandler for each module in init() method and that working fine:
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
Yii::app()->setComponents(array(
	'user'=>array(
		'allowAutoLogin'=>false,
		'stateKeyPrefix'=>'admin_',
		'loginUrl'=>Yii::app()->createUrl('/admin/index/login'),
	),
	'errorHandler'=>array(
		'errorAction'=>'/admin/index/error',
	),              
)); 
				
# Also in beforeControllerAction() of each module:
Yii::app()->setComponents(array(
	'user'=>Yii::app()->getModule('admin')->getComponents(true),
));			
*/ ?>		
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<hr>
I deal with that. Solution is set 'errorAction' in init() method of controller which extends controllers haved custom error action. Solved. 

My solution:
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
class ApiController extends Controller {
    public function init() {        
        parent::init();
        Yii::app()->errorHandler->errorAction='api/error';
		# OR -- Yii::app()->errorHandler->errorAction= $this->actionError();
    }
    public function actionError(){
        echo json_encode(array(
            'Status'=>500,
            'Message'=>'Unknown error'
        ));
		
		# OR
		 if($error=Yii::app()->errorHandler->error) {
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
                $this->render('/admin/error', $error);
        }
    }
*/ ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>

My solution (just in case):
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
class ErrorHandler extends CErrorHandler{
	protected function render($view,$data){
		$controller=Yii::app()->controller;
		if(method_exists($controller, 'actionError'))
			$controller->run('error');
		else
			parent::render($view, $data);
        }
}

# config:
	'components'=>array(
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
			'class'=>'ErrorHandler',
		),

# So, you need specify actionError() to handle error in custom controller.
class JsonApiController extends CController{
...
	public function actionError(){
		if($error=Yii::app()->errorHandler->error){
			$error=array(
				'code'=>$error['code'],
				'message'=>$error['message'],
			);
			echo CJSON::encode($error);
		}
	}
}
*/ ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>

Example:
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
class ApiController extends CController
{
  public function init()
  {
    parent::init();

    Yii::app()->attachEventHandler('onError',array($this,'handleError'));
    Yii::app()->attachEventHandler('onException',array($this,'handleError'));
  }

  public function handleError(CEvent $event)
  {        
    if ($event instanceof CExceptionEvent)
    {
      // handle exception
      // ...
    }
    elseif($event instanceof CErrorEvent)
    {
      // handle error
      // ...
    }

    $event->handled = TRUE;
  }

  // ...
}
*/ ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

	

