<?php
class Logs extends MYCActiveRecord
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'logs';
	}

	public $date_first;
    public $date_last;
	
	public function rules()
	{
		return array(
			array('id_user, stamp, event', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('event', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('index, id_user, stamp, event, date_first,date_last', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'TblUserMysqls' => array(self::BELONGS_TO, 'TblUserMysql', 'id', ),	
		);
	}

	public function attributeLabels()
	{
		return array(
			'index' => 'Index',
			'id_user' => 'Id User',
			'stamp' => 'Stamp',
			'event' => 'Event',
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

		$criteria->compare('index',$this->index);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('stamp',$this->stamp,true);
		$criteria->compare('event',$this->event,true);

		// return new CActiveDataProvider($this, array(
			// 'criteria'=>$criteria,		
			// 'pagination'=>array(
				// 'pageSize'=>5,
			// ),
		// ));
		
		//untuk search/filter between "date_first" & "date_last"
		if((isset($this->date_first) && trim($this->date_first) != "") && (isset($this->date_last) && trim($this->date_last) != ""))
            $criteria->addBetweenCondition('stamp', ''.$this->date_first.'', ''.$this->date_last.'');
            return new CActiveDataProvider(get_class($this), array(
                'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>5,
				),
            ));

		/*if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->condition = "date >= '$this->from_date'";  // date is database date column field
        }elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->condition = "date <= '$this->to_date'";
        }elseif(!empty($this->to_date) && !empty($this->from_date))
        {
            $criteria->condition = "date  >= '$this->from_date' and date <= '$this->to_date'";
        }*/
	}
	
	# USE on GRIDJOIN
	public function getLog_count($id){
		$dbCommand = Yii::app()->db->createCommand("SELECT COUNT(id_user) FROM `logs` WHERE id_user=$id");
		return $dbCommand->queryScalar(); 
	}
}
