<?php
//print_r(Tag::model()->tableSchema);
class TblUserMysql extends MYCActiveRecord   //CActiveRecord  --default
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
	
	const STATUS_ACTIVE = 1;
	 
	# for register user
	const PASSWORD_MIN = 1;
    const PASSWORD_MAX = 50;
    const USERNAME_MIN = 3;
    const USERNAME_MAX = 45;
    const EMAIL_MAX = 125;
    const EMAIL_MIN = 3;
	
	public $propic_id; 
	public $ket;
	public $create_time;
	public $update_time;

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
			array('username, password, email, role, active', 'required'), //bisa di tambahkan attribute table yg lain utk jadi satu validasi/terpisah
			//array('role, active', 'numerical', 'integerOnly'=>true),
			array('username, password, email, first_name', 'length', 'max'=>50),

			#Please remove those attributes that should not be searched. buatcolumn filter cth:CgridView
			#Harus di set untuk bisa fungsi search eg:CgridView
			array('id, username, password, email, first_name, last_name,  role, active, propic_id, create_time, ket, update_time, filename_ori, title, 
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
			'deactively'=>array(
                'condition'=>'active=0',
            ),
			'member'=>array(
                'condition'=>'role=0',
            ),
			'admin'=>array(
                'condition'=>'role=1',
            ),
            // 'recently'=>array(
                // 'order'=>'createTime DESC',
                // 'limit'=>5,
            // ),
        );
		//sample : $user_active = tblUserMysql::model()->actively()->findAll();
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
			'last_name' => 'Last Name',
			'role' => 'Role',
			'active'=>'Active',
			
			'ket' => 'Keterangan',   //---------->ga harus di set/ tapi bisa di overide
			//'propic_id'=>'prof pic id',
		);
	}

	# GA BISA COZ PADA "Tbl_User_Mysql" tidak ada column yg bersangkutan 
	// public function behaviors(){
		// return array(
			// 'CTimestampBehavior' => array(
				// 'class' => 'zii.behaviors.CTimestampBehavior',
				// 'createAttribute' => 'TblDatas.create_time',
				// 'updateAttribute' => 'TblDatas.update_time',
			// )
		// );
	// }

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
		$criteria->compare('last_name',$this->last_name,true);
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
		$criteria->compare('t.last_name',$this->last_name,true);
		$criteria->compare('t.role',$this->role);
		$criteria->compare('t.active',$this->active,true);
	
		#HARUS DI SET UTK BISA ENABLE FIEDTEXT FILTER**//
		$criteria->compare( 'TblDatas.propic_id', $this->propic_id, true );	
		$criteria->compare( 'propic_id', $this->propic_id, true );	
		
		$criteria->compare( 'TblDatas.ket', $this->ket, true );
		$criteria->compare( 'TblDatas.create_time', $this->create_time, true );	
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
			'last_name'=>'last_name',
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
	

	private static $_items=array();
	/**
	 * Returns the items for the specified type.
	 * @return array item names indexed by item code. The items are order by their position values.
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
	
	private static function loadItems($type)
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
	
	public function getFullName() {
		return $this->username;
	}

	public function getSuggest($q) {
		$c = new CDbCriteria();
		$c->addSearchCondition('username', $q, true, 'OR');
		$c->addSearchCondition('email', $q, true, 'OR');
		return $this->findAll($c);
	}

	/** ------------------------------------------------------ NOT IMPLEMETD (from drumatic yii-ember)
	 * Makes sure usernames are lowercase
	 * (emails by standard can have uppercase letters)
	 * @return parent::beforeValidate
	 */
	public function beforeValidate()
	{
		 if ($this->isNewRecord) {
            $this->create_time = new CDbExpression('NOW()');
            $this->activation_key = $this->generate_activation_key();
        }

        $this->update_time = new CDbExpression('NOW()');
        $this->login_ip = getUserIP();
		
		if (!empty($this->username))
			$this->username = strtolower($this->username);
			
		return parent::beforeValidate();
	}

	/* Generates a new validation key (additional security for cookie) */
    public function regenerateValidationKey()
    {
        $this->saveAttributes(array(
            'validation_key' => md5(mt_rand() . mt_rand() . mt_rand()),
        ));
    }

    /* Generates a validation key for new registration or reset token for password reset.*/
    public function  generate_activation_key()
    {
        return sha1(md5(microtime(true)) . $this->email . $this->password);
    }
	
	/**
	 * Behaviors - Returns a list of behaviors that this model should behave as. The return value should be an array of behavior configurations
	 indexed by behavior names. Each behavior configuration can be either a string specifying the behavior class or an array
	 * @return array
	 */
	// public function behaviors()
	// {
		// Yii::import('application.behaviors.password.*');
		// return array(
			// // Password behavior strategy
			// "APasswordBehavior" => array(
				// "class" => "APasswordBehavior",
				// "defaultStrategyName" => "bcrypt",
				// "strategies" => array(
					// "bcrypt" => array(
						// //"class" => "ABcryptPasswordStrategy",use this for PHP versions >= 5.3
                        // "class" => "AHashPasswordStrategy",//for demo purposes
						// "workFactor" => 14,
						// "minLength" => 8
					// ),
					// "legacy" => array(
						// "class" => "ALegacyMd5PasswordStrategy",
						// 'minLength' => 8
					// )
				// ),
			// )
		// );
	// }
	#----------------------- ENCODE PASSWORD
	public function crypt_pass($password)
	{		
		return crypt($password,$this->password)===$this->password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hash_pass($password)
	{
		return crypt($password, $this->generateSalt());
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 *
	 * The {@link http://php.net/manual/en/function.crypt.php PHP `crypt()` built-in function}
	 * requires, for the Blowfish hash algorithm, a salt string in a specific format:
	 *  - "$2a$"
	 *  - a two digit cost parameter
	 *  - "$"
	 *  - 22 characters from the alphabet "./0-9A-Za-z".
	 *
	 * @param int cost parameter for Blowfish hash algorithm
	 * @return string the salt
	 */
	protected function generateSalt($cost=10)
	{
		if(!is_numeric($cost)||$cost<4||$cost>31){
			throw new CException(Yii::t('Cost parameter must be between 4 and 31.'));
		}
		// Get some pseudo-random data from mt_rand().
		$rand='';
		for($i=0;$i<8;++$i)
			$rand.=pack('S',mt_rand(0,0xffff));
		// Add the microtime for a little more entropy.
		$rand.=microtime();
		// Mix the bits cryptographically.
		$rand=sha1($rand,true);
		// Form the prefix that specifies hash algorithm type and cost parameter.
		$salt='$2a$'.str_pad((int)$cost,2,'0',STR_PAD_RIGHT).'$';
		// Append the random salt string in the required base64 format.
		$salt.=strtr(substr(base64_encode($rand),0,22),array('+'=>'.'));
		return $salt;
	}

		/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	protected function generateSalt2()
	{
		return uniqid('',true);		// PHP fn
	}
	
	// protected function beforeSave()
	// {
			
	// }
	
	public function behaviors()
	{
		return array(
			'EJsonBehavior'=>array(
				'class'=>'application.extensions.DB.EJsonBehavior'
			),
			
			'galleryBehavior' => array(
                'class' => 'GalleryBehavior',
                'idAttribute' => 'gallery_id',
                'versions' => array(
                    'small' => array(
                        'centeredpreview' => array(220, 170),
                    ),
                    'medium' => array(
                        'cresize' => array(800, null),
                    )
                ),
                'name' => true,
                'description' => true,
            ),
			# Yii-Image-Attachment : no used table khusus - hanya mendeteksi pada PK model yg di attach. 
			# jika tidak ada PK , maka model tsbt harus di save lebih dulu.( CREATE model )
			# Summary : jadi widget ini akan aktif pada saat UPDATE model.
			// 'coverBehavior' => array(
				// 'class' => 'ext-coll.UPLOAD_GALLERY.yii-image-attachment.ImageAttachmentBehavior',	# need yii-image ext
				// // size for image preview in widget
				// 'previewHeight' => 200,
				// 'previewWidth' => 300,
				// // extension for image saving, can be also tiff, png or gif
				// 'extension' => 'jpg',
				// // folder to store images
				// 'directory' => Yii::getPathOfAlias('webroot').'/upload/yii-image-attach-upload/preview',
				// // url for images folder
				// 'url' => Yii::app()->request->baseUrl . '/upload/yii-image-attach-upload/preview',
				// // image versions
				// 'versions' => array(
					// 'small' => array(
						// 'resize' => array(200, null),
					// ),
					// 'medium' => array(
						// 'resize' => array(800, null),
					// )
				// )
			// ),
		
			// 'coverBehavior' => array(
                // 'class' => 'yii-ext.UPLOAD_GALLERY.yii-image-attachment.ImageAttachmentBehavior',
                // 'previewHeight' => 164,
                // 'previewWidth' => 164,
                // 'extension' => 'png',
                // 'directory' => Yii::getPathOfAlias('webroot') . '/images/post-cover/',
                // 'url' => Yii::app()->request->baseUrl . '/images/post-cover/',
                // 'versions' => array(
                    // 'small' => array(
                        // 'fit' => array(164, 164),
                    // )
                // )
            // ),
			
			// 'galleria' => array(
				// 'class' => 'ext-coll.UPLOAD_GALLERY.galleria.GalleriaBehavior',
				// 'image' => 'file_name', //required, will be image name of src
				// 'imagePrefix' => 'id',//optional, not required
				// 'description' => 'description',//optional, not required
				// 'title' => 'name',//optional, not required
			// ),
		);
	}
}