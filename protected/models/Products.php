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
 */

class Products extends MYCActiveRecord
{
	public function behaviors() {
		return array(
			'EJsonBehavior'=>array(
				'class'=>'application.extensions.DB.EJsonBehavior'
			),
		);
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @return Products the static model class
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
		return 'products';
	}
    
	public $category_name;  // add category.catName
	public $category_desc;  // add category.desc
	public $suppliers_company;  // add suppliers.company
	public $suppliers_alamat;  // add suppliers.alamat
	public $suppliers_contact;  // add suppliers.contact
	public $suppliers_tlp;  // add suppliers.tlp
	public $stockID;		// add Stock.fields
	public $unitInStock;
	public $unitOnOrder;
	public $safetyStock;
	public $modifiedDate;

	/** @return array validation rules for model attributes. */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catID, supID, item, price', 'required'),
			array('catID, supID', 'numerical', 'integerOnly'=>true),
			array('item', 'length', 'max'=>255),
			array('price', 'length', 'max'=>19),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('proID, catID, supID, item, price, category_name, suppliers_company', 'safe', 'on'=>'search'),  // MODIF : ADD-->'category_name'
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
				 'Category'=>array( self::BELONGS_TO, 'Category', 'catID' ),
				 //'Suppliers'=>array( self::BELONGS_TO, 'Suppliers', 'supID' ),
				 //'Stock'=>array( self::BELONGS_TO, 'Stock', 'proID' ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'proID' => 'Product ID',
			'catID' => 'Category ID',
			'supID' => 'Supplier ID',
			'item' => 'Item',
			'price' => 'Price',			
			'stockID'=>'Stock ID',
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
		
		//$criteria->with = array( 'Suppliers' );
		//$criteria->with = array( 'Category' );
		$criteria->compare( 'sup.company', $this->suppliers_company, true );
		$criteria->compare( 'cat.catName', $this->category_name, true );
		$criteria->compare( 'stk.stockID', $this->stockID, true );
		$criteria->compare( 'stk.unitInStock', $this->unitInStock, true );
		$criteria->compare( 'stk.unitOnOrder', $this->unitOnOrder, true );
		$criteria->compare( 'stk.safetyStock', $this->safetyStock, true );
		$criteria->compare( 'stk.modifiedDate', $this->modifiedDate, true );
	
		$criteria->mergeWith(array(
			'join'=>'LEFT JOIN category cat ON cat.catID = t.catID', 
			//'condition'=>'ug.group_id = 0 OR ug.group_id IS NULL',
		));
		$criteria->mergeWith(array(
			'join'=>'LEFT JOIN suppliers sup ON sup.supID = t.supID', 
		));
		$criteria->mergeWith(array(
			'join'=>'LEFT JOIN stock stk ON stk.proID = t.proID', 
		));
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,		
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
	
		//return new CActiveDataProvider( 'Products', array(
/*		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'category_name'=>array(
						'asc'=>'Category.catName',
						'desc'=>'Category.catName DESC',
					),
					'*',
				),
			),
		));     */
	}
	
	//----------------------------------------------------- ADD NEW CODE -------------------------------------//
	// public function suggestProducts($keyword, $limit=20)
	// //public function suggest($keyword, $limit=20)
	// {
		// $criteria=array(
			// 'condition'=>'item LIKE :keyword',
			// 'order'=>'item',
			// 'limit'=>$limit,
			// 'params'=>array(
				// ':keyword'=>"$keyword%"
			// )
		// );
		// $models=$this->findAll($criteria);
		// $suggest=array();
		// foreach($models as $model) {
				// $suggest[] = array(
					// 'value'=>$model->item,
					// 'label'=>$model->item,
				// );
		// }
		// return $suggest;
	// }
	
	public function getProdName($id)  {
		 $prodName = Products::model()->FindByPk($id)->item; //echo $custName;
		 return $prodName;
	}
	
}