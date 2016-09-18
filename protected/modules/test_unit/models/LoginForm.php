<?php 
# 4. FormSubmitModel base class specially for encapsulating form submitting logic into it. 


class LoginForm extends FormSubmitModel
{
    public $username;
 
    public $password;
 
    public $rememberMe;
 
    private $_identity;
 
    public function rules()
    {
        return array(
            array('username, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    }
 
    public function attributeLabels()
    {
        return array(
            'username' => Yii::t('app', 'User Name'),
            'password' => Yii::t('app', 'Password'),
            'rememberMe' => Yii::t('app', 'Remember me next time'),
        );
    }
 
 
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
            switch($this->_identity->errorCode) {
            case UserIdentity::ERROR_EMAIL_INVALID:
                $this->addError('username', Yii::t('app', 'Email is incorrect.'));
                break;
            case UserIdentity::ERROR_PASSWORD_INVALID:
                $this->addError('password', Yii::t('app', 'Password is incorrect.'));
                break;
            }
        }
    }
 
    /**
     * Logs in the user using the given username and password in the model.
     *
     * @return boolean whether login is successful
     */
    protected function onSubmit()
    {
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 365 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else {
            return false;
        }
    }
}
?>