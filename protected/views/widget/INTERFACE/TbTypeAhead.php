 
 <a href="http://twitter.github.io/typeahead.js/examples/" target="_blank" class="right">DEMO</a>
   <?php //Yii::app()->bootstrap->init(); ?>
   
<h1>TbTypeAhead</h1>

<div class="view2">
<span class="label label-info">Basic</span>

<?php
 $this->widget('ext.TbTypeAhead.TbTypeAhead',array(
       'name' => 'hello',
	   'htmlOptions'=>array('style'=>'width:400px'),
       'options' => array(
           array(
               'name' => 'accounts',
               'local' => array(
                   'jquery',
                   'ajax',
                   'bootstrap'
               ),
           )
       ),
       // 'events' => array(
           // 'selected' => new CJavascriptExpression('function(evt,data) {
               // console.log("data==>" + data); //selected datum object
           // }'),
       // ),
	     'events' => array(
           'selected' => CJavaScript::encode('function(evt,data) {
               console.log("data==>" + data); //selected datum object
           }'),
       ),
  ));
 ?>
 </div>
 
<div class="view2">
<span class="label label-info">Usage with model</span> 
<?php
$model =new TblUserMysql;
 $this->widget('ext.TbTypeAhead.TbTypeAhead',array(
       'model' => $model,
       'attribute' => 'username',
       'options' => array(
           array(
               'name' => 'accounts',
               'local' => array(
                   'jquery',
                   'ajax',
                   'bootstrap'
               ),
           )
       ),
  ));
 ?>
</div>

<div class="view2">  LOM DI TERUSIN !
<span class="label label-info">Complicated Usage</span>
<?php
$model =new TblUserMysql;
 $this->widget('ext.TbTypeAhead.TbTypeAhead',array(
       'model' => $model,
       'attribute' => 'username',
       'enableHogan' => true,
       'options' => array(
           array(
               'name' => 'countries',
               'valueKey' => 'name',
               'remote' => array(
                   'url' => Yii::app()->createUrl('/ajax/countryLists') . '?term=%QUERY',
               ),
               'template' => '<p>{{name}}<strong>{{code}}</strong> - {{id}}</p>',
               'engine' => new CJavaScriptExpression('Hogan'),
           )
       ),
       'events' => array(
           'selected' => new CJavascriptExpression("function(obj, datum, name) {
               console.log(obj);
               console.log(datum);
               console.log(name);
           }")
       ),
  ));
?>
</div>

 
  in your Ajax Controller
  ```
  class AjaxController extends Controller
  {
      public function actionCountryLists()
      {
          $term = Yii::app()->request->getQuery('term');
          $countries = Country::model()->findAllByAttributes(array('name' => "%{$term}%"));
 
          $lists = array();
          foreach($countries as $country) {
              $lists[] = array(
                  'id' => $country->id,
                  'name' => $country->name,
                  'code' => $country->code,
              );
          }
 
          echo json_encode($lists);
      }
 
  }