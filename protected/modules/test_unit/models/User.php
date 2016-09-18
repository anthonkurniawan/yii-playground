<?php
class User extends CActiveRecord
{
    //...    
 
    /**
     * Returns user's rating value
     * 
     * @param boolean $refresh whether required to refresh cached rating value (recalculate)
     * 
     * @return integer user's rating value
     */
    public function getRating($refresh = false)
    {
        if (!$this->isNewRecord) {
            $model = new UserRating;
            $model->attributes = Yii::app()->params['rating']['user'];
            $model->user = $this;
            $value = $model->getValue($refresh);
            return $value;
        }
        return $this->getAttribute('rating');
    }
 
    //...
}

?>