<?php
# RatingModel base class for modeling coefficient based ratings with calculations caching.

class UserRating extends RatingModel
{
    const RATING_CACHE_PREFIX = 'user_rating_';
    const DEFAULT_CACHE_DURATION = 1000;
    const DEFAULT_OUTPUT_MULTIPLIER = 1;
 
    public $user;
 
    public $cacheDuration = self::DEFAULT_CACHE_DURATION;
 
    public $ratio;
 
    public $multiplier = self::DEFAULT_OUTPUT_MULTIPLIER;
 
    public function rules()
    {
        return array(
            array('user, ratio, multiplier, cacheDuration', 'required'),
        );
    }
 
    public function getDataCacheId()
    {
        return self::RATING_CACHE_PREFIX . $this->user->id;
    }
 
    public function getDataCacheDuration()
    {
        return $this->cacheDuration;
    }
 
    protected function calc()
    {
        $ret = 0;
        $ret += $this->_calcFeedbackRating();
        $ret += $this->_calcPhotoRating();
        return round($ret * $this->multiplier);
    }
 
    /**
     * Saves calculated rating into database after calculating
     * 
     * @return void
     * @see RatingModel::afterCalculate()
     */
    protected function afterCalculate()
    {
        parent::afterCalculate();
        $this->user->rating = $this->getCachedValue();
        $this->user->save(true, array('rating'));
    }
 
    /**
     * Calculates user rating based on user's photo rating
     * 
     * @return double poi votes rating
     */
    private function _calcFeedbackRating()
    {
        $connection = $this->user->getDbConnection();
        $query = "
            SELECT SUM(`marks`.value) as `vote` FROM poi_visitor `t`
            INNER JOIN feedback `feedback` ON (`feedback`.user_id = `t`.user_id AND `feedback`.poi_id = `t`.poi_id)
            LEFT JOIN object_mark `marks` ON (`feedback`.id = `marks`.object_id)
            WHERE `t`.user_id = :user_id  AND `marks`.object_type = :object_type;
        ";
        $command = $connection->createCommand($query);
        $params = array(':user_id' => $this->user->id, ':object_type' => ObjectMark::OBJECT_TYPE_FEEDBACK);
        $votesSummary = $command->queryScalar($params);
        $ratio = $this->ratio['feedback'];
        return $ratio * $votesSummary;
    }
 
 
    /**
     * Calculates user rating based on user's photo rating
     * 
     * @return double poi votes rating
     */
    private function _calcPhotoRating()
    {
        $connection = $this->user->getDbConnection();
        $query = "
            SELECT SUM(`marks`.value) as `vote` FROM poi_visitor `t`
            INNER JOIN poi_photo `poi_photo` ON (`poi_photo`.poi_id = `t`.poi_id)
            INNER JOIN photo `photo` ON (`photo`.user_id = `t`.user_id AND `photo`.id = `poi_photo`.photo_id)
            LEFT JOIN object_mark `marks` ON (`photo`.id = `marks`.object_id)
            WHERE `t`.user_id = :user_id  AND `marks`.object_type = :object_type;
        ";
        $command = $connection->createCommand($query);
        $params = array(':user_id' => $this->user->id, ':object_type' => ObjectMark::OBJECT_TYPE_PHOTO);
        $votesSummary = $command->queryScalar($params);
        $ratio = $this->ratio['photo'];
        return $ratio * $votesSummary;
    }
}
?>