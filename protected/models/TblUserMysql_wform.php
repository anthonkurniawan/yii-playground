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
//print_r(Tag::model()->tableSchema);
class TblUserMysql_wform extends WActiveRecord   //CActiveRecord  --default
{
	/* * Returns the static model of the specified AR class. * @return TblUserMysql the static model class*/
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	 
	/** @return string the associated database table name */
	public function tableName()
	{
		return 'tbl_user_mysql';
		//return '{{tbl_user_mysql}}'; //klo pake PREFIX
	}
	
	public $propic_id; 
	public $ket;
	public $create_time; 

	public $pic_id;
	public $filename_ori;
	public $title;  

	public $comment;
	public $from_id; 
	public $tgl; 
	
	public $event; 
	public $stamp; 
	
	/* * @return array validation rules for model attributes. */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that // will receive user inputs.
		return array(
			array('username, password, email, first_name, role, active', 'required'), //bisa di tambahkan attribute table yg lain utk jadi satu validasi/terpisah
			array('role, active', 'numerical', 'integerOnly'=>true),
			array('username, password, email, first_name', 'length', 'max'=>50),

			#Please remove those attributes that should not be searched. buatcolumn filter cth:CgridView
			#Harus di set untuk bisa fungsi search eg:CgridView
			array('id, username, password, email, first_name, role, active, propic_id, create_time, ket, create_time, filename_ori, title, 
				comment, from_id, tgl, event, stamp ', 'safe', 'on'=>'search, search_join'),
			//array('password_repeat', 'required', 'on'=>'register'),
			//array('password', 'compare', 'compareAttribute'=>'password_repeat', 'on'=>'register'),
		);
	}

	/** * @return array relational rules. */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			/**Relational Query Options 
			#select,  #condition, #params, #on, #order, #group, #having, #index,
			
			#with :a list of child related objects that should be loaded together with this object
			#together: whether the table associated with this relationship should be forced to join together with the primary table and other tables. This option is only meaningful for HAS_MANY and MANY_MANY relations.
			#joinType: type of join for this relationship. It defaults to LEFT OUTER JOIN.
			#alias: the alias for the table associated with this relationship. It defaults to null, meaning the table alias is the same as the relation name.
			#join: the extra JOIN clause. It defaults to empty. 
			#scopes: scopes to apply. In case of a single scope can be used like 'scopes'=>'scopeName', in case of multiple scopes can be used like 'scopes'=>array('scopeName1','scopeName2').
			*/
			'TblDatas' => array(self::HAS_ONE, 'TblData', 'id', ),  //syntax: array(self::HAS_MANY, 'model name', 'key'),
			//'TblDatas' => array(self::HAS_ONE, 'TblData', 'id', 'together'=>'TblPics'),
			'TblPics'=>array(self::HAS_ONE,'TblPic',array('propic_id'=>'pic_id'),'through'=>'TblDatas'),
			'PicsComment'=>array(self::HAS_ONE,'TblPicComment',array('propic_id'=>'pic_id'),'through'=>'TblDatas'),
			'Logs' => array(self::HAS_ONE, 'Logs', 'id_user', ), 
			'LogsCount'=>array(self::STAT, 'Logs', 'id_user'), //hitung jumlah logs
		);
	}

	public function scopes()
    {
        return array(
            'actively'=>array(
                'condition'=>'active=1',
            ),
			'rolely'=>array(
                'condition'=>'role=1',
            ),
            // 'recently'=>array(
                // 'order'=>'createTime DESC',
                // 'limit'=>5,
            // ),
        );
    }
	//CONTOH PENGGANTI METODE SCOPE DGN FUNGSI DRPADA METODE DI ATAS
	public function rolely($role=1)
	{
		$this->getDbCriteria()->mergeWith(array(
			//'order'=>'createTime DESC',
			'condition'=>'role='.$role,
		));
		return $this;
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
			'active'=>'Active',
			
			'ket' => 'Keterangan',   //---------->ga harus di set/ tapi bisa di overide
			//'propic_id'=>'prof pic id',
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
		$criteria->compare('active',$this->active);

		//$criteria->with = array('relation');   //kaga ngepek
		//$criteria->compare('ket',$this->ket,true);
		//------------ ATAU
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'pagination'=>array(
				'pageSize'=>7,
			),
		));
	}
	
	//** ------------------------------------------------- ADD NEW FUNCTIN FOR JOIN TABLE ----------------------
	public function search_join()
	{
		$criteria=new CDbCriteria;
		
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.username',$this->username,true);
		$criteria->compare('t.password',$this->password,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.first_name',$this->first_name,true);
		$criteria->compare('t.role',$this->role);
		$criteria->compare('t.active',$this->active,true);
	
		#HARUS DI SET UTK BISA ENABLE FIEDTEXT FILTER**//
		$criteria->compare( 'TblDatas.propic_id', $this->propic_id, true );	
		$criteria->compare( 'propic_id', $this->propic_id, true );	
		
		$criteria->compare( 'ket', $this->ket, true );
		$criteria->compare( 'create_time', $this->create_time, true );	
		#TblPic
		$criteria->compare('pic_id',$this->pic_id,true);
		$criteria->compare('filename_ori',$this->filename_ori,true);
		$criteria->compare('title',$this->title,true);
		#Logs
		$criteria->compare('event',$this->event,true);
		$criteria->compare('stamp',$this->stamp,true);
	
		$criteria->with = array('TblDatas', 'TblPics');   //without this you wont be able to search the second table's data 
		//$criteria->with = array('TblPics');	//atau bisa dengan set ini aja/hasilnya sama
		//$criteria->together = 'TblDatas';  //ga harus di set??
			
		#BISA JUGA DEFINE JOIN DI SINI DENGAN CUSTOM (utk ganti "WITH")	
		//$criteria->select = 'tu.email, t.username';
		// $criteria->mergeWith(array(		//***HARUS DI SET UTK BISA ENABLE FIEDTEXT FILTER**//
			// 'join'=>'LEFT JOIN tbl_data t2 ON t2.id = t.id',
			// //'condition'=>'ug.group_id = 0 OR ug.group_id IS NULL',
		// ));
		
		$sort = new CSort();
		$sort->defaultOrder = 't.id ASC';
		$sort->attributes = array(
			'id'=>'id',
			'username'=>'username',
			'password'=>'password',
			'email'=>'email',
			'first_name'=>'first_name',
			'ket'=>'TblDatas.ket',
			'create_time'=>'TblDatas.create_time',
			'propic_id'=>'TblDatas.propic_id',
			'filename_ori'=>'TblPics.filename_ori',
			'title'=>'TblPics.title',
			//'event'=>'Logs.evet',  harus di sanding dengan "with"
			
			// 'TblData'=>array(	//buat dua kondisi cth: start time(asc) & end time (desc)
			/*'subscription start' => array(
                            'asc'=>'subscription.subscriptionstart',
                            'desc'=>'subscription.subscriptionstart DESC',
                        ), */
		);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'sort'=>$sort,
			'pagination'=>array(
				//'pageSize'=>5,
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
		));
	}
	
	/**
	 * Suggests a list of existing values matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of names to be returned
	 * @return array list of matching usernames
	 */
	// public function suggestUsername($keyword, $limit=20)
	// {
		// $criteria=array(
			// 'condition'=>'username LIKE :keyword',
			// 'order'=>'username',
			// 'limit'=>$limit,
			// 'params'=>array(
				// ':keyword'=>"$keyword%"
			// )
		// );
		// $models=$this->findAll($criteria);
		// $suggest=array();
		// foreach($models as $model) {
				// $suggest[] = array(
					// 'value'=>$model->username,
					// 'label'=>$model->username,
				// );
		// }
		// return $suggest;
	// }
	
	
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
		//self::$_items[$type]=array();			dump(self::$_items);
		$models=self::model()->findAll(array(
			//'condition'=>'type=:type',
			'params'=>array(':type'=>$type),
			'order'=>'username',
		));
		
		//$name='name_'.Yii::app()->language;
		$name='username';
		foreach($models as $model)		//dump($model->{$name} );
																	//dump(self::$_items[$type] );
			self::$_items[$type][$model->email]=$model->{$name};		//dump(self::$_items[$type] [$model->email] );
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
	
	//private $key;
	public function test($data)
	{ 
		//'TblData::model()->FindByPk($data->id)->pic', 
		//return print_r($data->PicsComment);
		
		//foreach($data->PicsComment as $key=>$value) return print_r($value->comment);
		foreach($data->PicsComment as $key=>$value)  {$key = $key;} 
		return $key;
		//return print_r($t);
		
	}


}