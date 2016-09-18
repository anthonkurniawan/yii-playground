
<div class="ket">
<b class="txtHead">Sample Using LOCK TABLES</b><br />
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$connection=Yii::app()->db;   // assuming you have configured a "db" connection
$command=$connection->createCommand('LOCK TABLE TABLENAME;');
$command->execute(); 

#Or make/extend CActiveRecord
class Post extends CActiveRecord {
    public function beforeSave() {
        Yii::app()->db->createCommand('LOCK TABLE '.$this->getTableName().' WRITE;')->execute(); 
        return parent::beforeSave();
    }
    public function afterSave() {
        Yii::app()->db->createCommand('UNLOCK TABLES;')->execute(); 
        parent::beforeSave();
    }
<?php $this->endWidget(); ?>
</div>

<div class="ket">
<ul>
<li><b class="txtHead">Create table only if it doesn't exist</b><br />
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
if(!$this->dbConnection->schema->getTable('tablename'))
    $this->createTable('tablename', $columns);
<?php $this->endWidget(); ?>
</ul>
</div>

<div class="ket">
<b class="txtHead">4 ways to save $a and $b </b><br />
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
#I would personally go with transaction.
if ($a->validate()) {
  $transaction = Yii::app()->db->beginTransaction();
  $success = $a->save(false);
  $b->fk_a = $a->id_a;
  $success = $success ? $b->save(false) : $success;
  if (!success)
    $transaction->commit();
  else
    $transaction->rollBack();
}

#Alternately if you can't use transactions you can save $a save $b and if $b fails delete $a (I don't like it though 'cause it abuses one id if #you're using AUTO_INCREMENT
#As a third option and best if you can't use transactions I would go with scenarios

if ($a->validate()) {
  $b->scenario = 'errors_check';
  if ($b->validate()) {
    $a->save(false);
    $b->fk_a = $a->id_a;
    $b->save(false);
  }
}
<?php $this->endWidget(); ?>
Of course errors_check scenario should be valid on all rules except your foreign key rule.

Last but not least you can always create a FormModel. Of course in your case it will duplicate lots of code (bad) but for more complex rules sets with more AR classes used on a form, FormModels are quite cool (FormModels are Models that don't have a physical table in the database ;)

</div>

<div class="ket">
<b class="txtHead">Delete doesn't use scopes!</b><br />
<b class="txtHead2">Just a word of caution: deleteAll and other delete functions do not use applied scopes.
This is by design, but can cause problems. http://code.google.com/p/yii/issues/detail?id=649<br />
An easy way around this is to add the following function to your base active record class:</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>
/**
     * Deletes rows with the specified condition, after applying existing scopes
     * See {@link find()} for detailed explanation about $condition and $params.
     * @param mixed $condition query condition or criteria.
     * @param array $params parameters to be bound to an SQL statement.
     * @return integer the number of rows deleted
     */
    public function deleteAllWithScopes($condition='',$params=array())
    {
        Yii::trace(get_class($this).'.deleteAllWithScopes()',
                'system.db.ar.CustomCActiveRecord');
        $builder=$this->getCommandBuilder();
        $criteria=$builder->createCriteria($condition,$params);
 
        $this->applyScopes($criteria);
 
        $command=$builder->createDeleteCommand($this->getTableSchema(),$criteria);
        return $command->execute();
    }
<?php $this->endWidget(); ?>
</div>

<div class="ket">
<b class="txtHead">Unique record validation example</b><br />
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>
//in model
public function rules() {
      return array(
        array('name, description', 'required'),
        array('name', 'length', 'max'=>20),
        array('description', 'length', 'max'=>45),
        array('name, description', 'safe', 'on'=>'search'),
 
        array('name', 'unique', 'on'=>'insert', 'message'=>'This value already exists!')
      );
   }
   
//in controller
				 // $model->save() automatically invokes the $model->validate() method
         // which fires the rules() function defined in the EmailGroup class.
         if ($model->save())
            $this->redirect(array('view', 'id'=>$model->name));
<?php $this->endWidget(); ?>  
</div>
