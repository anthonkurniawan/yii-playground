<?php

/**
 * This is the model class for table "tbl_pic_comment".
 *
 * The followings are the available columns in table 'tbl_pic_comment':
 * @property string $pic_id
 * @property string $comment
 * @property integer $from_id
 * @property string $tgl
 */
class TblPicComment2 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblPicComment2 the static model class
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
		return 'tbl_pic_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pic_id, comment, from_id, tgl', 'required'),
			array('from_id', 'numerical', 'integerOnly'=>true),
			array('pic_id', 'length', 'max'=>20),
			array('comment', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pic_id, comment, from_id, tgl', 'safe', 'on'=>'search'),
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
			'TblPics2' => array(self::BELONGS_TO, 'TblPic2', 'pic_id', ),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pic_id' => 'Pic',
			'comment' => 'Comment',
			'from_id' => 'From',
			'tgl' => 'Tgl',
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
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('from_id',$this->from_id);
		$criteria->compare('tgl',$this->tgl,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
	}
}