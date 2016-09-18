<?php
class MySearchModel extends SearchModel
{
    const DEFAULT_PAGE_SIZE = 20;
 
    const SCOPE_ONLY_ACTIVE = 'only_active';
    const SCOPE_WITH_COMMENTS = 'with_comments';
 
    public $field_name;
	public $term;	// add additional fileter on MytermFilter.php
 
    public function getModelClass()
    {
        return 'Post';
    }
 
    protected function build()
    {
       $criteria = new CDbCriteria();
	   
       if (isset($this->field_name)) {
           $criteria->compare('t.name', $this->field_name, true);
       }
       if ($this->hasScope(self::SCOPE_ONLY_ACTIVE)) {
           $criteria->compare('t.status', 'active');
       }
       if ($this->hasScope(self::SCOPE_WITH_COMMENTS)) {
           $criteria->with[] = 'comments';
       }
	   
       $criteria->together = true;
	   
	   if (isset($this->term)) {
           $filter = new MyTermFilter();
           $filter->term = $this->term;
           $filter->apply($criteria);
       }
	   
       $config = array('criteria' => $criteria);
       return new CActiveDataProvider($this->getModelClass(), $config);
    }
 
    public function getDefaultPageSize()
    {
       return self::DEFAULT_PAGE_SIZE;
    }
 
    public function getDefualtSortMode()
    {
       return self::SORT_MODE_ALPHABETICAL;
    }
 
    protected function applySort($criteria)
    {
        switch ($this->sort) {
        case self::SORT_MODE_ALPHABETICAL:
            $criteria->order .= 't.name';
            break;
        case self::SORT_MODE_DATE:
            $criteria->order .= 't.time';
            break;
        }
        parent::applySort($criteria);
    }
}
?>