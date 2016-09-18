<?php

/**
 * This is the model class for table "tbl_user_mysql".
 *
 * The followings are the available columns in table 'tbl_user_mysql':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property integer $role
 * @property string $ket
 */
class testXls extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return testXls the static model class
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
		return 'tbl_user_mysql';
	}

	/* * @return array validation rules for model attributes. */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, first_name, role', 'required'),
			array('role', 'numerical', 'integerOnly'=>true),
			array('username, password, email, first_name', 'length', 'max'=>50),
			//array('ket', 'length', 'max'=>100),  !! pindah ke TblData 
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, first_name, role, ket', 'safe', 'on'=>'search'),
		);
	}

	/** * @return array relational rules. */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			// other relations
			//array('TblData',  self::HAS_MANY, 'TblData', 'id'),  //#test1
			
			//'movies' => 'movies' -> array(self::MANY_MANY, 'Movie',  //#test2
            //    'viewer_watched_movie(movie_id, movie_id)'),
				
			//'TblData' => 'TblData'=>array(self::MANY_MANY, 'TblData','id',),  //#test2

			'TblData' => array(self::HAS_MANY, 'TblData', 'id', ),  //syntax: array(self::HAS_MANY, 'model name', 'key'),
		);
	}

	/** @return array customized attribute labels (name=>label) **/
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'first_name' => 'First Name',
			'role' => 'Role',
			//'ket' => 'Keterangan',
		);
	}

	/** Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions. */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('role',$this->role);
		//$criteria->compare('ket',$this->ket,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//** ------------------------------------------------- ADD NEW FUNCTIN FOR JOIN TABLE ----------------------
	public function search_join()
	{
		$criteria=new CDbCriteria;
		$criteria->together = true; //without this you wont be able to search the second table's data
		$criteria->with = array('TblData');
		
		//$criteria->select = 'tu.email, t.username';
		$criteria->mergeWith(array(
			'join'=>'LEFT JOIN tbl_data tu ON tu.id = t.id',
			//'condition'=>'ug.group_id = 0 OR ug.group_id IS NULL',
		));
		
		$criteria->compare('t.id',$this->id);
		//$criteria->compare('TblData.id',$this->id);
		//$criteria->compare('TblData.ket',$this->ket);
		
		//$criteria->compare('t.id',$this->id);
		$criteria->compare('t.username',$this->username,true);
		$criteria->compare('t.password',$this->password,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.first_name',$this->first_name,true);
		$criteria->compare('t.role',$this->role);
		//$criteria->compare('ket',$this->ket,true);
	
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Suggests a list of existing values matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of names to be returned
	 * @return array list of matching usernames
	 */
	public function suggestUsername($keyword, $limit=20)
	{
		$criteria=array(
			'condition'=>'username LIKE :keyword',
			'order'=>'username',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>"$keyword%"
			)
		);
		$models=$this->findAll($criteria);
		$suggest=array();
		foreach($models as $model) {
				$suggest[] = array(
					'value'=>$model->username,
					'label'=>$model->username,
				);
		}
		return $suggest;
	}
	
	/*** @return array for dropdown (attr1 => attr2)   contoh: Listdata dropdown role**/
	public function getOptions()   // bisa di panggil dengan ($model->options) atau ($model->getOptions())
	{
		//return CHtml::listData($this->findAll(),'id','name');
		return CHtml::listData($this->findAll(),'id','role');
	}
	
	//public function distinct() 
	public function getDistinct($param)   	// bisa di panggil dengan ($model->options) atau ($model->getOptions())
	{
		/*	$distinct=$model->findAll(array(
			'select'=>'t.role',
			'distinct'=>true,
		));	*/
		return CHtml::listData($this->findAll(),$param,$param);
	}
	
	//** CARIP TOP ID **/
	/*public function getTop()
	{
			$top=$model->find(array(
			'select'=>'t.id',
			'order'=>'',
		));	
	}*/
	
	private static $_items=array();
	private static function loadItems($type)
	//public static function loadItems($type)
	{
		self::$_items[$type]=array();
		$models=self::model()->findAll(array(
			'condition'=>'type=:type',
			'params'=>array(':type'=>$type),
			'order'=>'position',
		));
		$name='name_'.Yii::app()->language;
		foreach($models as $model)
			self::$_items[$type][$model->code]=$model->{$name};
	}
	
	/**
	 * Returns the items for the specified type.
	 * @param string item type (e.g. 'PostStatus').
	 * @return array item names indexed by item code. The items are order by their position values.
	 * An empty array is returned if the item type does not exist.
	 */
	public static function items($type)
	{
		if(!isset(self::$_items[$type]))
			self::loadItems($type);
		return self::$_items[$type];
	}

	/**
	 * Returns the item name for the specified type and code.
	 * @param string the item type (e.g. 'PostStatus').
	 * @param integer the item code (corresponding to the 'code' column value)
	 * @return string the item name for the specified the code. False is returned if the item type or code does not exist.
	 */
	public static function item($type,$code)
	{
		if(!isset(self::$_items[$type]))
			self::loadItems($type);
		return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : null;
	}
	
	//-------------------------------------------------------------------------------------------------------------------
	

}