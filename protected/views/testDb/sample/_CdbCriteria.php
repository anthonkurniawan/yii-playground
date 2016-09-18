<style>
#content { font-size: 70%; }
.php-hl-main {font-size:90% }
pre{ margin: 0px; padding: 0px }
</style>

<a href="http://localhost/yiidoc/CDbCriteria.html" target="_blank"> CDbCriteria</a> | 
<?php echo CHtml::link('Criteria samplel',array('testDb/criteria_sample', 'view'=>'criteria_sample'),array('target'=>'_blank')); ?> <br><br>

CDbCriteria represents a query criteria, such as conditions, ordering by, limit/offset.
It can be used in AR query methods such as <code>CActiveRecord::find</code> and <code>CActiveRecord::findAll</code>
    <li>new CDbCriteria - -<i>Turunan dari CDbCriteria extends CComponent</i>
	
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$criteria=new CDbCriteria(); 

$criteria->alias('t') #string
$criteria->condition() #string
$criteria->distinct() #boolean
$criteria->group() #string
$criteria->having()	 #string
$criteria->index()	 #string
$criteria->join()	 #string
$criteria->limlt()	#integer
$criteria->offset()	#integer
$criteria->order()	 #string
$criteria->paramCount() #integer
$criteria->params()	#array
$criteria->scopes()	#mixed  ( see Documentation )
$criteria->select()	#mixed
$criteria->together()	#boolean
$criteria->with()	#mixed

$criteria->addInCondition('id',array(1,2,3,4,5,6));
$criteria->compare('status',Post::STATUS_ACTIVE); 

$find = TblUserMysql::model()->find($criteria);
$findAll = TblUserMysql::model()->findAll($criteria);
<?php $this->endWidget(); ?>

<b class="badge">SELECT with ( custom ) new CDbCriteria</b> <span class="txtKet">( advance custom query)</span>

				<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
				
                <?php //CODE -----------
				$criteria = new CDbCriteria;
				//$criteria->select='username';
				$criteria->condition='id=:id AND role=:role'; //** operator =,<,>
				$criteria->params=array(':id'=>1, ':role'=>'administrator');
				$criteria->order = 't.id DESC'; //set order UNTUK MULTIPLE DATA ROW
				$criteria->limit = 5;

				$res_criteria = TblUserMysql::model()->find($criteria);
				?>
				
				<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
				<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
				
				<div>  
					<code>$res_criteria->username</code> :<b><?php echo $res_criteria->username; //dump($res_criteria); ?></b><br />
                    <code>foreach($res_criteria as $key=>$value)</code> :<b><?php foreach($res_criteria as $key=>$value) {echo $key.":".$value.",&nbsp;";} ?></b>
				</div>
				
<div class="view2">
<b> sample Lihat model Creteria <code>getDbCriteria</code></b> 
sample : 
<div class="tpanel right"> <!--- load model ------->
	<div class="toggle btn"><?php echo Yii::t('ui','<code>TblUserMysql::model()->getDbCriteria()</code>'); ?></div>
	<div class="scroll2"><?php dump( TblUserMysql::model()->getDbCriteria()); ?></div>
</div>
</div>