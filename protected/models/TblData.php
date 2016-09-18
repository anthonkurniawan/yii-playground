<?php

/**
 * This is the model class for table "tbl_data".
 *
 * The followings are the available columns in table 'tbl_data':
 * @property integer $id
 * @property string $email
 * @property string $ket
 */
class TblData extends MYCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TblData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**@return string the associated database table name  */
	public function tableName()
	{
		return 'tbl_data';
	}

	/** @return array validation rules for model attributes. */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			//array('email', 'length', 'max'=>25),
			array('ket', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, propic_id, ket', 'safe', 'on'=>'search'),
		);
	}
	
	#LOM DI COBA LAGI. (test pada create di widget_CgridView lom berhasil coz dia lookup ke behavior pada model "TblUserMysql" bukan "TblData")
	// public function behaviors(){
		// return array(
			// 'CTimestampBehavior' => array(
				// 'class' => 'zii.behaviors.CTimestampBehavior',
				// 'createAttribute' => 'create_time',
				// 'updateAttribute' => 'update_time',
			// )
		// );
	// }
	
	// INI TESTING DELETE VIA MODEL
	public function delModel($id)	{
		$model=$this->findByPk($id);
		if($model!=null) 
			$model->delete();
	}
	
	/*** @return array relational rules. */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			// other relations
			//array('TblUserMysql',self::BELONGS_TO, 'TblUserMysql', 'id'),
			'TblPics' => array(self::HAS_ONE, 'TblPic', 'pic_id', ),  //syntax: array(self::HAS_MANY, 'model name', 'key'),
			'TblUserMysqls' => array(self::BELONGS_TO, 'TblUserMysql', 'id', ),	 //syntax: array(self::BELONGS_TO, 'model name', 'key'),
			
			//'movies' => 'movies' -> array(self::MANY_MANY, 'Movie', 
            //    'viewer_watched_movie(movie_id, movie_id)'),
		);
	}

	/** @return array customized attribute labels (name=>label) */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'ket' => 'Keterangan',
		);
	}

	/** Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions. */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('propic_id',$this->propic_id,true);
		$criteria->compare('ket',$this->ket,true);
		
		//$criteria->compare('relation.id',$this->id, true);
		//$criteria->with = array('relation');   //kaga ngepek
		
		// $dataprovider = new CActiveDataProvider(get_class($this));
		// return $dataprovider->setCriteria($criteria);  //SAMA AJE KALO PAKE YG DI BAWAH

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
	}
	
	//** ADD GET ket
	public function userKet($id)
	{ 		//echo $id;
		//$id=$id->id;
		//$ket= TblData::model()->FindByPk($id)->ket==''?"- kosong -":TblData::model()->FindByPk($id)->ket;
		$ket= TblData::model()->FindByPk($id)->ket;
		return $id;
	}
	
}