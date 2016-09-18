<?php $this->layout='column1';?> 
<style>
.container {width:1100px; }
#content { font-size: 80%; }
pre {margin:0px 0px 0px 0px}
.view2{ width:auto}
.php-hl-main {font-size:10px}
.php-hl-table {font-size:10px}
.html-hl-main  {font-size:11px}
.javascript-hl-main{font-size:10px}
</style>

<?php $this->pageTitle='Api data collection'; ?>

<?php echo CHtml::link('view in new tab', array('cek/collect', 'view'=>'_data_collect'), array('class'=>'right', 'target'=>'_blank') ); ?> <br>
<h1> NOTE : nant buat widget utk capture kelas detail nya</h1>

<div class="view2">
<b class="badge"> CAttributeCollection </b> --CAttributeCollection implements a collection for storing attribute names and values. <br>
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$col = new CAttributeCollection;
$col->text='text';    dump($col);
echo $col->text;
dump($col->keys)
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
</div>


<div class="view2" >
	<b class="badge"> CMAP</b><br>
	<a href="http://localhost/yiidoc/CMap.html" target="_blank" style="float:right">CMAP</a> 
	CMap implements a collection that takes key-value pairs. 
	<br> and extend by <a href="http://localhost/yiidoc/CTypedMap.html" target="_blank">CTypedMap(extends)</a>
	CTypedMap represents a map whose items are of the certain type.
	CTypedMap extends CMap by making sure that the elements to be added to the list is of certain class type. <br>
	
	<b> class counstruct :</b> <code>__construct($data=null,$readOnly=false)</code><br>
	 <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
	$arr1 = array( 1=>'a', 2=>'b');
	$arr2 = array( 'a'=>1, 'b'=>2);

	$cmap1 = new CMap($arr1);
	$cmap1->mergeArray($cmap1, $arr2);	OR CMap::mergeArray($arr1, arr2);

	 $cmap1->itemAt('a');	#Returns the item with the specified key.
	$cmap1->add('b', 3); #$key, $value
	$cmap1->remove(2); #$key
	$cmap1->contains('a');	#param mixed $key the key (retiurn boolean)
	$cmap1->toArray();	#return array the list of items in array
	$cmap1->copyFrom($data); #Copies iterable data into the map.  existing data in the map will be cleared first.
	$cmap1->mergeWith($data,$recursive=true); #Merges two or more arrays into one recursively.
	$cmap1->offsetExists($offset);	#Returns the element at the specified offset., required by the interface ArrayAccess.
	$cmap1->offsetGet($offset);
	$cmap1->offsetSet($offset,$item);
	$cmap1-> offsetUnset($offset);
	$cmap1->contains();  $item  // cek member array contain
	$cmap1->count();
	$cmap->clear(); #Removes all items in the map.
	<?php $this->endWidget(); ?><br>

	<b> SAMPLE :</b><br>	
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$arr1 = array( 1=>'a', 2=>'b');
	$arr2 = array( 'a'=>1, 'b'=>2);

	$cmap1 = new CMap($arr1);
	$cmap1->mergeArray($cmap1, $arr2);	
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	<div class="left myBox"> <b class="txtKet">$cmap1->mergeArray($cmap1, $arr2);	 </b> <?php dump($cmap1); ?></div>
	<div class="left myBox"> <b class="txtKet">$cmap1->getIterator());</b> <?php dump($cmap1->getIterator());?></div>
	<div class="left myBox"> <b class="txtKet">$cmap1->getKeys()</b><?php dump($cmap1->getKeys()); ?></div>
	<div class="left myBox"> 
		<b class="txtKet">$cmap1->count();</b><br>  <?php echo $cmap1->count(); ?> <br>
		<b class="txtKet"> dump( $cmap1->toArray() </b> <?php dump( $cmap1->toArray() ); ?>
	</div>
	<div class="clear"></div>
	
	<b class="badge"> --- OR --- </b>  <div class="clear"></div>
	

	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$cmap = CMap::mergeArray($arr1, $arr2);
	$json = CJSON::encode($cmap);
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	
	<div class="left myBox"> <b class="txtKet"> dump( CMap::mergeArray($arr1, $arr2) );</b> <br> <?php dump($cmap); ?></div>
	<div class="left myBox"> <b class="txtKet">echo CJSON::encode($cmap);</b><br><?php echo $json; ?></div>
	
	<div class="left">
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>

</div>

<div class="view2">
	<p>
	<a href="http://localhost/yiidoc/CList.html" target="_blank" >Clist</a>|
	<a href="http://localhost/yiidoc/CTypedList.html" target="_blank" >CTypedList (extends)</a>
	</p>
	<b class="badge"> CList implements an integer-indexed collection class. </b><br>
	 
	 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$arr1 = array( 1=>'a', 2=>'b');
	$arr2 = array( 'a'=>1, 'b'=>2);
	
	$clist = new CList($arr1);
	$clist2 = $clist->mergeWith( $arr2 );	
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	
	<div class="left myBox"> <b class="txtKet">new CList($arr1);</b><?php dump($clist); ?></div>
	<div class="left myBox"> 
		<b class="txtKet">$clist->mergeWith($arr2);</b> (merge with array data/object) <br><br>
		<b class="txtKet">$clist->toArray() </b> (to array)<br> <?php print_r( $clist->toArray() );?>
	</div>
	<div class="left"><?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?> </div>
	<div class="clear"></div>
	
	<p>
	<b class="badge">CTypedList</b> <br> CTypedList extends CList by making sure that the elements to be added to the list is of certain class type. <br>
	(MASIH LOM PAHAM!!)
	<?php $CtypedList = new CTypedList('CList2'); 
		dump($CtypedList);
	?>
	</p>
</div>

<div class="view2">
	<a href="localhost/yiidoc/CQueue.html" target="_blank" style="float:right">CQueue</a><br />
	CQueue implements a queue.<br>
	The typical queue operations are implemented, which include enqueue(), dequeue() and peek(). In addition, contains() can be used to check if an item is contained in the queue. 
	To obtain the number of the items in the queue, check the Count property. <br>
	<b class="badge"> CQueue Sample</b><br>
	
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$arr1 = array( 1=>'a', 2=>'b');
	$cque = new CQueue($arr1);
	//echo $cque->peek();	#Returns the item at the top of the queue.
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	<div class="left myBox"> 
		<b class="txtKet">new CList($arr1);</b><?php dump($cque); ?> <br>
		<b class="txtKet">$cque->peek(); //top value </b><br> <?php echo $cque->peek();?>
	</div>
	<div class="left myBox"> 
		<b class="txtKet">$cque->enqueue('x');	//insert value </b><?php echo $cque->enqueue('x');?><br><br>
		<b class="txtKet"> dump($cque) </b> <?php dump($cque); ?> 
	</div>
	<div class="left myBox"> <b class="txtKet">$cque->dequeue(); //push out value</b><br><?php echo$cque->dequeue();?></div>
	<div class="left myBox"> <b class="txtKet">$cque->contains('x'); </b><br><?php dump( $cque->contains(  'x' )) ;?></div>
	
	<div class="left myBox"> <b class="txtKet">$cque->toArray();</b><br><?php print_r( $cque->toArray() );?></div>
	<div class="clear"></div>
	
</div>

<div class="view2">
	<b class="badge"> CStack Sample</b><br>
	<a href="http://localhost/yiidoc/CStack.html" target="_blank" style="float:right">CStack</a><br />
	CStack implements a stack.<br>
	The typical stack operations are implemented, which include <code>push()</code>, <code>pop()</code> and <code>peek()</code>. In addition, <code>contains()</code> can be used to check if an item is 
	contained in the stack. To obtain the number of the items in the stack, check the Count property. 
</div>