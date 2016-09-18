<?php
#5. TransactionalFormModel base class used for submitting data into database under transaction. Automatic rollback transaction on exception throw or on submitting error. 

class RegistrationForm extends TransactionalFormModel
{   
    public $username;
 
    public $email;
 
    public $password;
 
    public $verifyPassword;
 
    public $verifyCode;
 
    public function rules()
    {
        return array(
            array('username, password, verifyPassword, email', 'required'),
            array('email', 'email'),
            array('verifyPassword', 'compare', 'compareAttribute' => 'password',
                'message' => Yii::t('app', 'Retype Password is incorrect.'),
            ),
            array('verifyCode', 'captcha', 'allowEmpty' => false),
        );
    }
 
    /**
     * Registers new user under database transaction.
     * If something would be wrong, model rollbacks
     * transaction automatically. For manual rollback
     * transaction return false.
     * 
     * @return whether user registered successfully
     * @see FormSubmitModel::onSubmit()
     */
    protected function onSubmit()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = md5($this->password);
        $user->status = User::STATUS_NOT_VERIFIED;
        if ($user->save()) {
            $profile = new UserProfile();
            $profile->attributes = $this->getAttributes();
            $profile->user_id = $user->id;
            if ($profile->save()) {
                return true;
            } else {
                $this->addErrors($profile->getErrors());
            }
        } else {
            $this->addErrors($user->getErrors());
        }
        return false;
    }
 
    //...
}
?>