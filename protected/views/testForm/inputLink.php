
<div class="view2">
	<b class="badge"> CHtml::link() </b> <code>link(string $text, mixed $url='#', array $htmlOptions=array ( ))</code>
	
<?php echo CHtml::beginForm(); ?>

1.<?php echo CHtml::link('Link Text1', array('testform/index')); ?> : <code>CHtml::link('Link Text1',array('testform/index')</code><br />
2.<?php echo CHtml::link( CHtml::image( bu() .'/images/48.jpg', 'gamabar kucing imoeett', array()), array('testform/index')); ?>   Link with image
	<code>echo CHtml::link( CHtml::image( bu() .'/images/48.jpg', array()), array('testform/index')); </code><br>
3.<?php echo CHtml::link('Link Text(WITH querystring parameters)',array('testform/index', 'param1'=>'value1')); ?> :
<code> CHtml::link('Link Text(WITH querystring parameters)',array('testform/index', 'param1'=>'value1')) </code><br />

4.<?php echo CHtml::link('Link Text(WITH multiple querystring parameters)',array('testform/index', 'param1'=>'value1',
                                       															 'param2'=>'value2',
                                         														 'param3'=>'value3')); ?> :<br />
<code>CHtml::link('Link Text(WITH multiple querystring parameters)',array('testform/index', 'param1'=>'value1',
                              'param2'=>'value2', 'param3'=>'value3')) </code> <br />

5.<?php echo CHtml::link('Link Text(WITH opening a new page)',array('testform/index', 'param1'=>'value1'), array('target'=>'_blank')); ?> <br />     
<code>echo CHtml::link('Link Text(WITH opening a new page)',array('testform/index', 'param1'=>'value1'), array('target'=>'_blank'</code><br />

6.<?php echo CHtml::link('Link WITH module-id with desired module id',array('/test/default/index')); ?>   
<code>CHtml::link('Link Text',array('/module-id/controller/action')</code><br />

7.<?php echo CHtml::link('link WITH Confirmation',"#", array("submit"=>array('delete', 'id'=>'$data->ID'),'confirm' => 'Are you sure?')); ?>  <br />
<code> CHtml::link('link delete WITH Confirmation',"#", array("submit"=>array('delete', 'id'=>$data->ID), 'confirm' => 'Are you sure?')</code>
<?php //echo $_POST['delete']; ?> <br />

<code>*If you are using CSRF protection in your application do not forget to add csrf parameter to the htmlOptions array </code><br />
8.<?php echo CHtml::link('link delete WITH Confirmation (using CSRF)',"#", array("submit"=>array('delete', 'id'=>'$data->ID'), 'confirm' => 'Are you sure?', 'csrf'=>true)); ?> <br />

*If you need to make POST request with arbitary link with additional POST parameters you should use following code<br>
9.<?php echo CHtml::link('Delete blog post', '#', array(
    'submit'=>array('blog/deletePost', 'param'=>100),
    // 'params'=>array('id'=>$post->id, 'status'=>Post::STATUS_DELETED_BY_OWNER),
	 'params'=>array('param1'=>5, 'param2'=>'test'),
    'csrf'=>true,
)); ?> <br />
<hr />

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')); ?>
	1. echo CHtml::link('Link Text1',array('testform/index')); 
	2. echo CHtml::link( CHtml::image( bu() .'/images/48.jpg', array()), array('testform/index')); 
    3. echo CHtml::link('Link Text(WITH querystring parameters)',array('testform/index', 'param1'=>'value1'));
    4. echo CHtml::link('Link Text(WITH multiple querystring parameters)',
		array('testform/index', 'param1'=>'value1','param2'=>'value2','param3'=>'value3')
		);
    5. echo CHtml::link('Link Text(WITH opening a new page)',array('testform/index', 'param1'=>'value1'), array('target'=>'_blank'));
    6. echo CHtml::link('Link WITH module-id with desired module id',array('/test/default/index'));
    7. echo CHtml::link('link WITH Confirmation',"#", 
		array("submit"=>array('delete', 'id'=>'$data->ID'),'confirm' => 'Are you sure?')
		);
    8. echo CHtml::link('link delete WITH Confirmation (using CSRF)',"#", 
		array("submit"=>array('delete', 'id'=>'$data->ID'), 'confirm' => 'Are you sure?', 'csrf'=>true)
		);
    9.//If you need to make POST request with arbitary link with additional POST parameters you should use following code
		echo link('Delete blog post', '#', array(
    	'submit'=>array('blog/deletePost', 'param'=>100),
    	'params'=>array('id'=>$post->id, 'status'=>Post::STATUS_DELETED_BY_OWNER),
    	'csrf'=>true,
	10.  ETERNAL LINK MASIH GUNAKAN TAG HTML
)); 
<?php $this->endWidget(); ?>



	