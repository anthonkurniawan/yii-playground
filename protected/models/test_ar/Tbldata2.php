<?php

/**
 * This is the model class for table "tbl_data".
 *
 * The followings are the available columns in table 'tbl_data':
 * @property integer $id
 * @property string $propic_id
 * @property string $create_time
 * @property string $ket
 */
class Tbldata2 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tbldata the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, create_time, ket', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('propic_id', 'length', 'max'=>50),
			array('ket', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, propic_id, create_time, ket', 'safe', 'on'=>'search'),
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
			'UserMysqls2' => array(self::BELONGS_TO, 'UserMysql2', 'id', ),
			'TblPics2' => array(self::HAS_ONE, 'TblPic2', 'pic_id', ),  //syntax
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'propic_id' => 'Propic',
			'create_time' => 'Create Time',
			'ket' => 'Ket',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('propic_id',$this->propic_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('ket',$this->ket,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
	}
}