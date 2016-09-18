<?php
// Yii::import('zii.widgets.CPortlet');

//class TagTreeMenu extends CPortlet
class TagTreeMenu extends myPortlet
{
	public $title='Tree Menu Widget';
	//public $maxTags=20;

	//public function run()
	//{																								
       // $data=$this->getDataFormatted($this->getData());					//dump($data);
       // $this->getController()->render('/widget/CTreeView/CTreeView_menu',array('data'=>$data ));
	   // dump( Yii::app()->getController('treeMenuController') );
	//}
	
	protected function renderContent()
	{						
		// $tags=Tag::model()->findTagWeights($this->maxTags);

		// foreach($tags as $tag=>$weight)
		// {
			// $link=CHtml::link(CHtml::encode($tag), array('post/index','tag'=>$tag));
			// echo CHtml::tag('span', array(
				// 'class'=>'tag',
				// 'style'=>"font-size:{$weight}pt",
			// ), $link)."\n";
		// }
		

		$this->widget('CTreeView',array(
			'id'=>'mytreeWidget',
			//'data'=>$data,
			'url'=>array('treeMenu/treeMenuWidget'),
			//'url'=>array('treeMenu/treeFill'),
			'animated'=>'slow',
			'collapsed'=>true,
			'control'=>"#sidetreecontrol",
			//'persist'=>"location",
			//'toggle'=>"js:alert(this)",  //keluar pas page load??
			'htmlOptions'=>array('class'=>'filetree')
		)); 

		//$this->render('CTreeView');
	}
}

