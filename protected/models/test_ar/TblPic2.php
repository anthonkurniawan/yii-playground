<?php

/**
 * This is the model class for table "tbl_pic".
 *
 * The followings are the available columns in table 'tbl_pic':
 * @property string $pic_id
 * @property string $filename_ori
 * @property string $title
 */
class TblPic2 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblPic the static model class
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
		return 'tbl_pic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pic_id, filename_ori', 'length', 'max'=>50),
			array('title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pic_id, filename_ori, title', 'safe', 'on'=>'search'),
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
			'TblDatas2' => array(self::BELONGS_TO, 'TblData2', 'propic_id', ),	 //syntax: 
			'PicsComments2' => array(self::HAS_ONE, 'TblPicComment2', 'pic_id', ), 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pic_id' => 'Pic',
			'filename_ori' => 'Filename Ori',
			'title' => 'Title',
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

		$criteria->compare('pic_id',$this->pic_id,true);
		$criteria->compare('filename_ori',$this->filename_ori,true);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
	}
}