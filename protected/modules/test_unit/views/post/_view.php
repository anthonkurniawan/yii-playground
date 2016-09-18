<div class="post">
	<div class="title">
		<?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
	</div>
	
	<div class="author">
		<?php if(!Yii::app()->user->isGuest): ?>
		[<?php echo '<span class="'.strtolower($data->status).'">'.$data->status.'</span>'; ?>]
		<?php endif; ?>
		
		posted by <?php echo $data->author->username . ' on ' . date('F j, Y',$data->create_time); ?>
	</div>
	
	<div class="content" style="width:700px; border:1px black solid; dispay:table">
	 <?php //echo "<b>str_word_count :</b>". str_word_count($data->content); ?>
	 <?php //echo "<b>substr  : </b>". substr($data->content, 1, 500); ?>
																							<?php //dump($data->content); ?>
		<?php //$content = substr($data->content, 1, 500); ?>
		<?php	$this->beginWidget('CMarkdown', array('purifyOutput'=>true)); ?>
		<?php	//$this->beginWidget('CMarkdown'); ?>
			<?php //echo $data->content; ?>
			<?php  
				if(isset($full_view)) { 
					echo $data->content;
				}
				else {
					$content = substr($data->content, 1, 200); 	//echo $content. "<br>";
					$match = strpos($content, '~~~'); 		//echo "bol--->".$match;
					if($match) $content=$content . "\n~~~ \n<i>read more for continue..</i>"; 
					echo $content;
				}
			?>
		<?php $this->endWidget(); ?>
	</div>
	
	<div class="nav">
		<b>Tags:</b>
		<?php echo implode(', ', $data->tagLinks); ?>
		<br/>
		<?php echo CHtml::link('Read more', $data->url); ?> |
		<?php echo CHtml::link("Comments ({$data->commentCount})",$data->url.'#comments'); ?> |
		
		<?php if(!Yii::app()->user->isGuest): ?>
			<?php echo CHtml::link('Update',array('post/update','id'=>$data->id)); ?> |
			<?php echo CHtml::linkButton('Delete',array(
				'submit'=>array('post/delete','id'=>$data->id),
				'confirm'=>"Are you sure to delete this post?",
			)); ?> |
		<?php endif; ?>
	
		Last updated on <?php echo date('F j, Y',$data->update_time); ?>
	</div>
	
</div><!-- post -->
