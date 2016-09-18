<?php
class TestForm extends CFormModel
{
	public $checkBox = true;
	public $checkBoxList = array(0,1); # 0 or 1 if single check
	public $dateField = '2013-08-02';  //date('y-m-d');
	public $dropDownList=1;
	public $emailField ='tona_atonix@yahoo.com';
	public $fileField;
	public $hiddenField;
	public $label;
	public $labelEx;
	public $listBox=0;
	public $numberField = 'harus integer..';
	public $radioButton =1;
	public $radioButtonList = 1;
	public $rangeField ; //= array(0=>1, 1=>5);
	public $textArea = 'ini text area..';
	public $textField = 'min 3 max 12 char..';
	public $urlField;
	public $compare1;
	public $compare2;
	
	public $image;
    public $rememberMe=false;
	public $error;
    
	public $verifyCode;
	//private $_identity;  # kalo varibale hanya di gunakan di internal (ga di publish)
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function attributeLabels()
	{
		return array(
			'compare1' => 'Text compare1',
			'compare2' => 'Text compare2',
			'checkBox'=>'ini checkBox',
			'image'=> 'poto kamuh',
			'rememberMe' => 'Ingatkah saya?',
			'textField'=>'text Field',
			'verifyCode'=>' Masukan Verification Code',    //utk tampilakn label Verification Code
		);
	}
	
	# http://localhost/yiidoc/CValidator.html#builtInValidators
	# http://localhost/yiidoc/CModel.html#rules-detail
	# Validation rules reference ( CValidator::builtInValidators. )
	// boolean : CBooleanValidator
	// captcha : CCaptchaValidator
	// compare : CCompareValidator
	// email : CEmailValidator
	// numerical : CNumberValidator
	// in : CRangeValidator
	// length : CStringValidator
	// match : CRegularExpressionValidator //the attribute value matches to the specified regular expression. You may invert the validation logic with help of the not 
	// required : CRequiredValidator
	// url : CUrlValidator	validates that the attribute value is a valid http or https URL.
	
	#the following core validators NOT support client-side validation: 
	// date : CDateValidator
	// default : CDefaultValueValidator
	// exist : CExistValidator # This validator is often used to verify that a foreign key contains a value that can be found in the foreign table. 
	// file : CFileValidator
	// filter : CFilterValidator # is actually not a validator but a data processor. It invokes the specified filter method to process the attribute 
				//value and save the processed value back to the attribute. The filter method must follow the following signature:
				//function foo($value) {...return $newValue; }
	// safe : CSafeValidator
	// type : CTypeValidator
	// unique : CUniqueValidator
	// unsafe : CUnsafeValidator
	
	
	
	public function rules()
    {		# array('attribute list', 'validatorMethod /builtInValidators', 'enableClientValidation'=> #bol, 'message'=> #string, 'on'=>'scenario name', .'except'=> , 'safe'=> , skipOnError=> #boolean)
			# message : the user-defined error message. Different validators may define various placeholders in the message that are to be replaced with actual values. 
				//All validators recognize "{attribute}" placeholder, which will be replaced with the label of the attribute.
			# on: this specifies the scenarios when the validation rule should be performed. Separate different scenarios with commas. 
					//If this option is not set, the rule will be applied in any scenario that is not listed in "except".
			# safe : whether attributes listed with this validator should be considered safe for massive assignment. Defaults to true.
			# except: this specifies the scenarios when the validation rule should not be performed. Separate different scenarios with commas.
			# skipOnError : whether this validation rule should be skipped when there is already a validation error for the current attribute. Defaults to false.
			//Note, in order to inherit rules defined in the parent class, a child class needs to merge the parent rules with child rules using functions like array_merge().
        return array(
            array('compare1,compare2, textField', 'required'),
			array('textField', 'length', 'min'=>3, 'max'=>12),	// harus di set required to for active
			array('dateField', 'date'),
			array('emailField', 'email'),
			array('rangeField', 'in'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('numberField', 'numerical', 'integerOnly'=>true),
		   	array('image', 'file',
				'allowEmpty'=>'true',
                'types'=>'jpg, gif, png',
                'maxSize'=>1024 * 1024 * 50, // 50MB
                'tooLarge'=>'The file was larger than 50MB. Please upload a smaller file.',
            ),
			array('rememberMe', 'boolean'),
			array('compare2', 'compare', 'compareAttribute'=>'compare1', /*'on'=>'register'*/ ),
			//array('pass', 'sample_validator', 'on'=>'login'),	#sample validation from "loginForm"
			
			# additional parameters are used to initialize the corresponding validator properties
			
			# Please remove those attributes that should not be searched. buatcolumn filter cth:CgridView
			# Harus di set untuk bisa fungsi search eg:CgridView
			// array('id, username, password, email, first_name, role, active, propic_id, create_time, ket, create_time, filename_ori, title, 
				// comment, from_id, tgl, event, stamp ', 'safe', 'on'=>'search, search_join'),
				
        );
    }
	
	# must have the following signature:   function validatorName($attribute,$params)  // $params refers to validation parameters given in the rule
	# sampe A validation method from "loginForm" model ( This is the 'sample_validator' validator as declared in rules().)
	public function sample_validator($attribute,$params) //**nama variable $attribute,$params bebas(bisa di ganti)
	{	
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password); 
			if(!$this->_identity->sample_validator())
				$this->addError('password','Incorrect username or password.');
				
				//print_r( $this->_identity);   ---TEST RESULT: array object _identity
				//*UserIdentity Object ( [_id:private] =>  [username] =>  [password] =>  [errorCode] =>  [errorMessage] => [_state:private] => Array ( [lastLoginTime] =>  [email] => ) [_e:private] => [_m:private] => )
		}
		#Method Details
		# addError(CModel $object, string $attribute, string $message, array $params=array ( ))
		# applyTo(string $scenario)  - Returns a value indicating whether the validator applies to the specified scenario.  dengan syarat :
			// the validator's "on" property is empty
			// the validator's "on" property contains the specified scenario
		# isEmpty(mixed $value, boolean $trim=false)
			//Checks if the given value is empty. A value is considered empty if it is null, an empty array, or the trimmed result is an empty string. 
			//Note that this method is different from PHP empty(). It will return false when the value is 0.
		# validate(CModel $object, array $attributes=NULL) - Validates the specified object.
		# validateAttribute(CModel $object, string $attribute) - Validates a single attribute. This method should be overridden by child classes.
		# clientValidateAttribute(CModel $object, string $attribute) 
			//Returns the JavaScript needed for performing client-side validation. Do not override this method if the validator does not support client-side validation.
			//wo predefined JavaScript variables can be used:
				// value: the value to be validated
				// messages: an array used to hold the validation error messages for the value
	}
	
	protected function afterSave()
	{
		parent::afterSave();

		if($_FILES['image_head']['size'] != 0)
			move_uploaded_file($_FILES['image_head']['tmp_name'], "files/header/" . $this->id .".jpg");
			
		$this->arrayMenu();

	}
	
	#CRAETE VALIDASI MANUAL ( TP PADA DASAR NYA SUDAH ADA PADA KELAS MODEL )
	// public function validate2(){
		// $this->addError('password','Incorrect username or password.');
	// }


	// public function login()
	// {											
		// if($this->_identity===null)
		// {
			// $this->_identity=new UserIdentity($this->username,$this->password);			//print_r($this->_identity);
			// $this->_identity->authenticate();
		// }
		// if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		// {
			// $duration=$this->rememberMe ? 3600:0;   //3600*24*30 : 0; // 30 days
			// Yii::app()->user->login($this->_identity,$duration);
			// return true;
		// }
		// else
			// return false;
	// }
}
?>