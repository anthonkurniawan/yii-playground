
<?php echo CHtml::link('CDbTransaction', array('http://localhost/yiidoc/CDbTransaction.html'), array('target'=>'_blank', 'class'=>'right')); ?><br>

<b class="badge">Sample Basic Transaction</b> <br />

<?php Yii::app()->sc->setStart(__LINE__);  ?> <!--
$transaction=$connection->beginTransaction();
try
{
   $connection->createCommand($sql1)->execute();
   $connection->createCommand($sql2)->execute();
   //.... other SQL executions
   $transaction->commit();
}
catch(Exception $e)
{
   $transaction->rollback();
}
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

<b class="badge">Sample Transaction (on Asset)</b> <br />

<?php Yii::app()->sc->setStart(__LINE__);  ?> <!--
$transaction = Yii::app()->db->beginTransaction();
try
{
	if( $model->save() ) {
		foreach($_POST["CustorderDetail"] as $i) 
		{
			$orderDetailModel = new CustorderDetail;

			$orderDetailModel->attributes = $i;
			$orderDetailModel->noID = CustorderDetail::model()->getnoID(); 		
			$orderDetailModel->orderID = $model->orderID;

			$orderDetailModel->save(); 
		}
	}
	$transaction->commit();
}
catch(Exception $e)
{	
	$transaction->rollback();
}
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>		

<?php Yii::app()->sc->setStart(__LINE__);  ?> <!--
$transaction = Yii::app()->db->beginTransaction();
try
{
	foreach($orderDetailModel as $key=>$modelItem) 
	{				
		$orderDetailModel[$key]->attributes = $_POST['CustorderDetail'][$key];	//dump($orderDetailModel[$key]);
		if( ! $orderDetailModel[$key]->save() )
			throw new CException('Transaction failed: ');
	}	
	if($model->save())
		$transaction->commit();
}
catch(Exception $e)
{
	$transaction->rollback();
	Yii::app()->user->setFlash('msg', "{$e->getMessage()}");
	//$this->refresh();
} 
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>		
			

<?php Yii::app()->sc->setStart(__LINE__);  ?> <!--
$transaction = Yii::app()->db->beginTransaction();
$a = $model->save();

foreach( $_POST['CustorderDetail'] as $key=>$modelItem) 
{
	$orderDetailModel[$key] = new CustorderDetail;

	$orderDetailModel[$key]->attributes = $modelItem;
	$orderDetailModel[$key]->noID = CustorderDetail::model()->getnoID(); 		
	$orderDetailModel[$key]->orderID = $model->orderID;
	$b = $orderDetailModel[$key]->save(); 		//dump($orderDetailModel); 	
}

if ($a&&$b) {
	$transaction->commit();
	Yii::app()->user->setFlash('msg', "New Order Create Successfully");
}
else
	$transaction->rollBack();
	-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

