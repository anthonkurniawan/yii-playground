<?php

/**
 * This is the model class for table "tbl_pic".
 *
 * The followings are the available columns in table 'tbl_pic':
 * @property string $pic_id
 * @property string $filename_ori
 * @property string $title
 */
class TblPic extends MYCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
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
			//array('pic_id', 'required'),
			array('pic_id, filename_ori', 'length', 'max'=>50),
			array('title', 'length', 'max'=>100),
			array('filename_ori', 'file',
				'allowEmpty'=>'true',
                'types'=>'jpg, gif, png',
                'maxSize'=>1024 * 1024 * 50, // 50MB
                'tooLarge'=>'The file was larger than 50MB. Please upload a smaller file.',
            ),
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
		'TblPicComment' => array(self::HAS_MANY, 'TblPicComment', 'pic_id', ),  //syntax: array(self::HAS_MANY, 'model name', 'key'),
		'TblDatas' => array(self::BELONGS_TO, 'TblData', 'propic_id', ),	 //syntax: array(self::BELONGS_TO, 'model name', 'key'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pic_id' => 'Pic ID',
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
		));
	}
	
	//------------------------------------------- TESTING KALO GA PAKE RELASIONAL ------------------------------------------//
	//** GET IMAGE PIC
	public function pic($file,$width=100,$height=100)
	{ 	
		return CHtml::image(Yii::app()->baseUrl.'/upload/'.$file, $alt=$file ,array ( "width"=>$width, "height"=>$height,"title"=>$file ));
	}
	
	
	//** ADD BUAT CARI  "pic_id"      ------------------------------- CUMA TESTING( SBENERNYA KALO SUDAH DI SET RELATIONNYA SUDAH GA PERLU)
	// public function load_picID($id)
	// {
		 // $picID = TblData::model()->FindByPk($id)->propic_id; //echo $picID;
		 // return $picID;
	// }
	// //** ADD BUAT CARI  attribute/field berdasarkan "pic_id"
	// public function load_picAtr($id,$atr)
	// {
		 // $picID=TblPic::load_picID($id);  //echo "picID :".$picID;
		 // $picAtr = TblPic::model()->FindByPk($picID)->$atr;  //echo $pic;	
		 // return $picAtr;
	// }
	// //** ADD GET pic description
	// public function pic_des($id)
	// { 	
		// $pic=TblPic::load_picAtr($id,'filename_ori');  //echo "picID :".$picID;  
		// $pic=$pic==null ? "<span class='txtDisable'> no description </span>" : TblPic::load_picAtr($id,'filename_ori');
		
		 // //$picID = TblData::model()->FindByPk($id)->propic_id; //echo $picID."<br>"; //** DI ALIHKAN PADA FUNSI "load_picID($id)"
		 // //$pic = TblPic::model()->FindByPk($picID)->filename_ori;  //echo $pic;	//** DI ALIHKAN PADA FUNSI "load_picAtr($id,$atr)"
		 // return $pic;   
	// }
	
	// public function pic_title($id)
	// { 	
		// $picTitle=TblPic::load_picAtr($id,'title');  //echo "picID :".$picID;   
		 // return $picTitle;
	// }
	
		// //** GET IMAGE LINK WITH FANCY BOX
	// public function picLink($id,$size)
	// { 		//return $id;
		// $picID=TblPic::load_picID($id)==null ? "" : TblPic::load_picID($id).".png";  //echo "picID :".$picID;
		// $title = TblPic::load_picAtr($id,'title');    //	ECHO "TEST picID :".$picID;
	
		// switch($size)
		// {
			// case"small": $htmlOptions=array( "width"=>"30", "height"=>"30","title"=>$title );
			// break;
			// case"medium": $htmlOptions=array ( "width"=>"100", "height"=>"100","title"=>$title );
			// break;
		// }
		// /*CHtml::link(tblData::propic_id($data->id,"small"), $url=array("testForm/pic","id"=>tblData::pic_des($data->id),"layout"=>"fancy"), 
											// $htmlOptions=array("class"=>"view fancybox.iframe" ))		-- MANUAL-- */
		
		// if($picID!=null) 
			// { 
				// $result = CHtml::link( 
					// CHtml::image(Yii::app()->baseUrl.'../upload/'.$picID, $alt=$title , $htmlOptions), 
					// $url=array("testForm/pic", "id"=>$picID,"layout"=>"fancy"), 
					// $htmlOptions=array("class"=>"view2 fancybox.iframe" ) 
				// );  
			// }
		// else { $result = "<span class='txtDisable'> No Picture</span>"; }
		
		// return $result;
	// }
}