<script>
var i = document.gete
</script>
<?php

//class Products_gtc extends CActiveRecord
class Products_gtc extends CAdvancedArbehavior
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'warehouse.products';
	}

	public function rules()
	{
		return array(
			array('catID, supID, item, price, type, modelID, itemDesc, weight, createDate, modifiedDate', 'required'),
			array('catID, supID', 'numerical', 'integerOnly'=>true),
			array('item', 'length', 'max'=>255),
			array('price', 'length', 'max'=>19),
			array('type, modelID', 'length', 'max'=>30),
			array('itemDesc', 'length', 'max'=>100),
			array('weight', 'length', 'max'=>20),
			array('proID, catID, supID, item, price, type, modelID, itemDesc, weight, createDate, modifiedDate', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function behaviors()
	{
		return array('CAdvancedArBehavior',
				array('class' => 'ext.CAdvancedArBehavior')
				);
	}

	public function attributeLabels()
	{
		return array(
			'proID' => Yii::t('app', 'Pro'),
			'catID' => Yii::t('app', 'Cat'),
			'supID' => Yii::t('app', 'Sup'),
			'item' => Yii::t('app', 'Item'),
			'price' => Yii::t('app', 'Price'),
			'type' => Yii::t('app', 'Type'),
			'modelID' => Yii::t('app', 'Model'),
			'itemDesc' => Yii::t('app', 'Item Desc'),
			'weight' => Yii::t('app', 'Weight'),
			'createDate' => Yii::t('app', 'Create Date'),
			'modifiedDate' => Yii::t('app', 'Modified Date'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('proID',$this->proID);

		$criteria->compare('catID',$this->catID);

		$criteria->compare('supID',$this->supID);

		$criteria->compare('item',$this->item,true);

		$criteria->compare('price',$this->price,true);

		$criteria->compare('type',$this->type,true);

		$criteria->compare('modelID',$this->modelID,true);

		$criteria->compare('itemDesc',$this->itemDesc,true);

		$criteria->compare('weight',$this->weight,true);

		$criteria->compare('createDate',$this->createDate,true);

		$criteria->compare('modifiedDate',$this->modifiedDate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
