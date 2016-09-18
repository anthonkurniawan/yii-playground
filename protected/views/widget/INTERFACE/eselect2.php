<?php
$this->pageTitle=Yii::app()->name . ' - ESelect2';
$this->breadcrumbs=array('widget/eselect2',);
?>

<style>
.row{ float:left; min-width:100px; }
</style>


<h1>ESelect2</h1>
<div class="flash-error">
ESelect2 is a widget extension for Yii framework. This extension is a wrapper for Select2 Jquery plugin ([https://github.com/ivaynberg/select2][1]).
<pre>
## Resources ##
 - Jquery extension URL:
 - [https://github.com/ivaynberg/select2][2]
 - Demo [http://ivaynberg.github.com/select2/][3]
 - Yii extension URL:
 - [http://www.yiiframework.com/extension/select2/][5]
 - [https://github.com/anggiaj/ESelect2][5]

  [1]: https://github.com/ivaynberg/select2
  [3]: http://ivaynberg.github.com/select2/
  [4]: http://www.yiiframework.com/extension/select2/
  [5]: https://github.com/anggiaj/ESelect2
</pre>
</div>


<div class="row-fluid">

<div class="row" style="width:220px">
<p><span class="label label-info">Basic</span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
 $this->widget('ext-coll.select2.ESelect2', array(
 'name' => 'selectInput',
	'data' => array(
		0 => 'Nol',
		1 => 'Satu',
		2 => 'Dua',
	)
));
 ?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<!------------------------------------------------ Using `optgroup` --------------------------------------------->
<div class="row">
<p><span class="label label-info">Using `optgroup`</span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$data = array(
	'one' => array(
		'1' => 'Satu',
		'2' => 'Dua',
		'3' => 'Tiga',
	),
	'two' => array(
		'4' => 'Sidji',
		'5' => 'Loro',
		'6' => 'Telu',
	),
	'three' => array(
		'7' => 'Hiji',
		'8' => 'Dua',
		'9' => 'Tilu',
	),
);

$this->widget('ext-coll.select2.ESelect2', array(
	'name' => 'testing',
	'data' => $data,
));
 ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<!--------------------------------------------------------- Working with model --------------------------------------------------->
<div class="row">
<p><span class="label label-info">Working with model</span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$model = new TblUserMysql;

$this->widget('ext-coll.select2.ESelect2', array(
	'model' => $model,
	'attribute' => 'role',
	'data' => array(
		0 => 'administrator',
		1 => 'user-a',
		2 => 'user-b',
	),
));
 ?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<!-------------------------------------------------------- Using selector html element -------------------------------------------------->
 <div class="row">
<p><span class="label label-info">Using selector html element</span> </p>

<div id="test"></div> <!---- target element-->

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$tags = array('Satu', 'Dua', 'Tiga');

echo CHtml::textField('test', '', array('id' => 'test'));

$this->widget('ext-coll.select2.ESelect2', array(
	'selector' => '#test',
	'options' => array(
		'tags' => $tags,
	),
));
 ?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
</div><!--- row-fluid-->

<div class="row-fluid">
<!------------------------------------------------------------ Multiple data --------------------------------------------------->
<div class="row">
<p><span class="label label-info"> Multiple data</span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$tags = array('Satu', 'Dua', 'Tiga');

$this->widget('ext-coll.select2.ESelect2', array(
	'name' => 'ajebajeb',
	'data' => $data,
	'htmlOptions' => array(
		'multiple' => 'multiple',
		'style'=>'width:200px',
	),
));
 ?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<!---------------------------------------------------------- Placeholder ---------------------------------------------->
<div class="row" style="width:250px">
<p><span class="label label-info"> Placeholder</span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('ext-coll.select2.ESelect2', array(
	'name' => 'asik2x',
	'data' => $data,
	'options' => array(
		'placeholder' => Yii::t('select2', 'Keren ya?'),
		'allowClear' => true,
	),
));
 ?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<!--------------------------------------------------------Working with remote data ------------------------------------------------------->
<div class="row">
<p><span class="label label-info">Working with remote data</span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
echo CHtml::textField('movieSearch', '', array('style' => 'width:300px'));

$this->widget('ext-coll.select2.ESelect2', array(
	'selector' => '#movieSearch',
	'options' => array(
		'placeholder' => 'Search a movie',
		'minimumInputLength' => 1,
		'ajax' => array(
			'url' => 'http://api.rottentomatoes.com/api/public/v1.0/movies.json',
			//'url'=> $this->createUrl('widget/AutoComplete', array('model'=>'TblUserMysql', 'order'=>'username')),
			'dataType' => 'jsonp',
			'data' => 'js: function(term,page) {
					return {
						term: term, 
						page_limit: 10,
						apikey: "e5mnmyr86jzb9dhae3ksgd73" // Please create your own key!
					};
				}',
			'results' => 'js: function(data,page){	console.log(data);
				return {results: data.movies};
			}',
		),
		'formatResult' => 'js:function(movie){
			var markup = "<table class=\"movie-result\"><tr>";
			if (movie.posters !== undefined && movie.posters.thumbnail !== undefined) {
				markup += "<td class=\"movie-image\"><img src=\"" + movie.posters.thumbnail + "\"/></td>";
			}
			markup += "<td class=\"movie-info\"><div class=\"movie-title\">" + movie.title + "</div>";
			if (movie.critics_consensus !== undefined) {
				markup += "<div class=\"movie-synopsis\">" + movie.critics_consensus + "</div>";
			}
			else if (movie.synopsis !== undefined) {
				markup += "<div class=\"movie-synopsis\">" + movie.synopsis + "</div>";
			}
			markup += "</td></tr></table>";
			return markup;
		}',
		'formatSelection' => 'js: function(movie) {
			return movie.title;
		}',
	),
));
 ?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

</div><!--row-fluid-->
