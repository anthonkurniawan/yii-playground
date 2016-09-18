<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $catID
 * @property string $catName
 * @property string $desc
 */
class Category extends MYCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getDbConnection()
	{
		return Yii::app()->db3;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catName', 'required'),
			array('catName', 'length', 'max'=>50),
			array('desc', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('catID, catName, desc', 'safe', 'on'=>'search'),
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
			//'Products' => array(self::HAS_MANY, 'Products', 'catID', ),  //syntax: array(self::HAS_MANY, 'model name', 'key'),
			//'Products' => array(self::BELONGS_TO, 'Products', 'catID', ),	 //syntax: array(self::BELONGS_TO, 'model name', 'key'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'catID' => 'Category ID',
			'catName' => 'Category Name',
			'desc' => 'Description',
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

		$criteria->compare('catID',$this->catID);
		$criteria->compare('catName',$this->catName,true);
		$criteria->compare('desc',$this->desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'pagination'=>array(
				'pageSize'=>3,
			),
		));
	}
	//--------------------------------------------- ADD NEW FUNCTION -----------------------------------------//
	public function getDistinct($id,$name)   	// bisa di panggil dengan ($model->options) atau ($model->getOptions())
	{
		/*	$distinct=$model->findAll(array(
			'select'=>'t.role',
			'distinct'=>true,
		));	*/
		return CHtml::listData($this->findAll(),$id,$name);
	}
	
	public function suggestCategory($keyword, $limit=20)
	{
		$criteria=array(
			'condition'=>'catName LIKE :keyword',
			'order'=>'catName',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>"$keyword%"
			)
		);
		$models=$this->findAll($criteria);
		$suggest=array();
		foreach($models as $model) {
				$suggest[] = array(
					'value'=>$model->catName,
					'label'=>$model->catName,
				);
		}
		return $suggest;
	}
}