<style>.myBox{margin-top:3px}</style>


<h1>YII-SOLR</h1>
Extension ini merupakan implentasi dari php solr ext lihat manual. jadi harus aktifkan <code>php_solr.dll</code> ext 
//dump( Yii::app()->solr_phpnode ); 

<div class="view2">
	<?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::label('Search Query', ''); ?>
	<?php echo CHtml::textField('solr_query',$value='',$htmlOptions=array()) ?>
	<?php 
	echo CHtml::ajaxSubmitButton('Search', 
		array('widget/SolrQuery'), 
		array('update'=>'#result',), 
		array('type'=>'submit',) 
	); ?>
<?php echo CHtml::endForm(); ?>

<!--- RESULT -->
<div id="result"></div>

</div>

<div class="view2">
<div class="myBox">
#CONFIG
<?php Yii::app()->sc->setStart(__LINE__); ?>
<?php /*
"components" => array(
	...
	"solr" => array(
	 	'class'=>'ext.SEARCH_ENGINE.YiiSolr-phpnode.ASolrConnection',
			"clientOptions" => array(
				"hostname" => "localhost",
				"port" => 8983,
			),
	 ),
),
*/ ?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox">
<span class="label label-info">Basic Add Index</span>

<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php 
// $doc = new ASolrDocument;
// $doc->id = 1;
// $doc->name = "test 1";
// $doc->save(); // adds the document to solr
// $doc->getSolrConnection()->commit();   // commit at gere like db transaction
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox">
<span class="label label-info">Basic Search Index</span><br>

The most useful of these methods are <code>find()</code> and <code>findAll()</code>. Both these methods take a criteria parameter, <br>
this criteria parameter should be an instance of <code>{@link ASolrCriteria}</code>.<br>
To find documents in solr, we use the following methods:
<ul>
	<li>{@link ASolrDocument::find()}</li>
	<li>{@link ASolrDocument::findAll()}</li>
	<li>{@link ASolrDocument::findByAttributes()}</li>
	<li>{@link ASolrDocument::findAllByAttributes()}</li>
	<li>{@link ASolrDocument::findByPk()}</li>
	<li>{@link ASolrDocument::findAllByPk()}</li>
</ul>

<div class="clear"></div>

<div class="left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

Example: Find all documents with the name "test"
<?php
$criteria = new ASolrCriteria;
$criteria->query = "name:test"; // lucene query syntax
$docs = ASolrDocument::model()->findAll($criteria);

# Alternative method:
$docs = ASolrDocument::model()->findAllByAttributes(array("name" => "test"));
?>

<?php
// $criteria = new ASolrCriteria;  
// $criteria->query = "solr"; // lucene query syntax
// $docs = ASolrDocument::model()->findAll($criteria); dump($docs);
?>

<?php
// $criteria = new ASolrCriteria;
// $criteria->query = "*"; // match everything
// $total = Job::model()->count($criteria); // the total number of jobs in the index
?>

<?php
// $criteria = new ASolrCriteria;  
// $criteria->query = "*"; // lucene query syntax
// $docs = ASolrDocument::model()->findAll($criteria); dump($docs);
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="scroll_custom left" style="height:150px; width:200px">
	<?php dump($docs); ?>
</div>
<div class="clear"></div>
</div>


<div class="myBox">
<span class="label label-info">Extend model</span><br>
If you need to deal with multiple solr indexes, it's often best to define a model for each index you're dealing with. 
To do this we extend ASolrDocument in the same way that we would extend CActiveRecord when defining a model
For example:
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php /*
class Job extends ASolrDocument {
	
	# Required for all ASolrDocument sub classes
	# @see ASolrDocument::model()
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	# @return ASolrConnection the solr connection to use for this model
	public function getSolrConnection() {
		return Yii::app()->yourCustomSolrConnection;
	}
}


# Example: Find a job with the unique id of 123
$job = Job::model()->findByPk(123);

# Example: Find the total number of jobs in the index
$criteria = new ASolrCriteria;
$criteria->query = "*"; // match everything
$total = Job::model()->count($criteria); // the total number of jobs in the index
*/ ?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

</div>

<div class="myBox">
<span class="label label-info">Using data providers</span><br>

Often we need to use a data provider to retrieve paginated lists of results. Example:
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php /*
$dataProvider = new ASolrDataProvider(Job::model());
$dataProvider->criteria->query = "*";
foreach($dataProvider->getData() as $job) {
	echo $job->title."\n";
}
*/ ?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox">
<span class="label label-info">Removing items from the index</span><br>
To remove an item from the index, use the following syntax:
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php /*
$job = Job::model()->findByPk(234);
$job->delete();
*/ ?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

</div> <!--- usage -->