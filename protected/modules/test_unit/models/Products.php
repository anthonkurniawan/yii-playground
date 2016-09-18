<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $proID
 * @property integer $catID
 * @property integer $supID
 * @property string $item
 * @property string $price
 * @property string $type
 * @property string $modelID
 * @property string $itemDesc
 * @property string $weight
 * @property string $createDate
 * @property string $modifiedDate
 */
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->db3;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catID, supID, item, price, type, modelID, itemDesc, weight, createDate, modifiedDate', 'required'),
			array('catID, supID', 'numerical', 'integerOnly'=>true),
			array('item', 'length', 'max'=>255),
			array('price', 'length', 'max'=>19),
			array('type, modelID', 'length', 'max'=>30),
			array('itemDesc', 'length', 'max'=>100),
			array('weight', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('proID, catID, supID, item, price, type, modelID, itemDesc, weight, createDate, modifiedDate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'proID' => 'Pro',
			'catID' => 'Cat',
			'supID' => 'Sup',
			'item' => 'Item',
			'price' => 'Price',
			'type' => 'Type',
			'modelID' => 'Model',
			'itemDesc' => 'Item Desc',
			'weight' => 'Weight',
			'createDate' => 'Create Date',
			'modifiedDate' => 'Modified Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
	}
}