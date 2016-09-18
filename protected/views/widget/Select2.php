
<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('groupgridview',);
?>
<?php
$this->menu=array(
	array('label'=>'test for CGridView', 'url'=>array('admin_ajax')),
	array('label'=>'NOT SET', 'url'=>array('create')),
);
?>

<a href="http://ivaynberg.github.io/select2/"><b>Demo Extension</b></a><br /><br>

<div class="div-left">
<b class="badge">Basic</b><br>
<?php
$this->widget('ext.select2.ESelect2', array(
 'name' => 'selectInput',
	'data' => array(
		0 => 'Nol',
		1 => 'Satu',
		2 => 'Dua',
	)
));
?>
</div>

<div class="div-left">
<b class="badge">Working with model</b><br>
<?php 	/*
$this->widget('ext.select2.ESelect2', array(
	'model' => $model,
	'attribute' => 'attrName',
	'data' => array(
		0 => 'Nol',
		1 => 'Satu',
		2 => 'Dua',
	),
));	*/
?>
</div>

<div class="div-left">
<b class="badge">Using selector</b><br>
<?php
$tags = array('Satu', 'Dua', 'Tiga');
echo CHtml::textField('test', '', array('id' => 'test'));
$this->widget('ext.select2.ESelect2', array(
	'selector' => '#test',
	'options' => array(
		'tags' => $tags,
	),
));
?>
</div>

<div class="div-left">
<b class="badge">Using `optgroup`</b><br>
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

$this->widget('ext.select2.ESelect2', array(
	'name' => 'testing',
	'data' => $data,
));
?>
</div>

<div class="div-left">
<b class="badge">Multiple data</b><br>
<?php
$data = array(
	'1' => 'Satu',
	'2' => 'Dua',
	'3' => 'Tiga',
);

$this->widget('ext.select2.ESelect2', array(
	'name' => 'ajebajeb',
	'data' => $data,
	'htmlOptions' => array(
		'multiple' => 'multiple',
	),
));
?>
</div>

<div class="div-left">
<b class="badge">Placeholder</b><br>
<?php
$this->widget('ext.select2.ESelect2', array(
	'name' => 'asik2x',
	'data' => $data,
	'options' => array(
		'placeholder' => Yii::t('select2', 'Keren ya?'),
		'allowClear' => true,
	),
));
?>
</div>

<div class="div-left">
<b class="badge">Working with remote data</b><br>
<?php
echo CHtml::textField('movieSearch', '', array('class' => 'span5'));
$this->widget('ext.select2.ESelect2', array(
	'selector' => '#movieSearch',
	'options' => array(
		'placeholder' => 'Search a movie',
		'minimumInputLength' => 1,
		'ajax' => array(
			'url' => 'http://api.rottentomatoes.com/api/public/v1.0/movies.json',
			'dataType' => 'jsonp',
			'data' => 'js: function(term,page) {
					return {
						q: term, 
						page_limit: 10,
						apikey: "e5mnmyr86jzb9dhae3ksgd73" // Please create your own key!
					};
				}',
			'results' => 'js: function(data,page){
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
</div>