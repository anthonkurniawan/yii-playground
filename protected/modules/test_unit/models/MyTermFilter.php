<?php
class MyTermFilter extends FilterModel
{	// DUMMY 
    public $term;
 
    public $poi_table_alias;
 
    public function rules()
    {
        return array(
            array('poi_table_alias', 'default', 'value' => 't'),
            array('poi_table_alias, term', 'required'),
            array('term', 'length', 'max' => 512),
            array('term', 'safe', 'on' => self::SCENARIO_FILTERING),
        );
    }
 
    public function applyAttributeFilter($criteria, $attribute)
    {
        switch ($attribute) {
        case 'term':
            $items = explode(',', $this->term);
            $queryCriteria = new CDbCriteria;
            $value = $this->$attribute;
            foreach ($terms as $key => $value) {
                $termCriteria = new CDbCriteria();
                $termCriteria->compare($this->poi_table_alias . '.name', $value, true, 'OR');
                $termCriteria->compare($this->poi_table_alias . '.description', $value, true, 'OR');
                $queryCriteria->mergeWith($termCriteria);
            }
            if ($this->poi_table_alias != 't') {
                $queryCriteria->with = array($this->poi_table_alias);
                $queryCriteria->together = true;
            }
            $criteria->mergeWith($queryCriteria);
            break;
        }
    }
}
?>