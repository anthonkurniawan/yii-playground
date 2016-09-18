<?php
class myPanelbar extends CWidget
{
	public $selector;
	public $title;
	public $visible=true;
	public $content="";
	public $class ="btn-group";	// if bootstrap exist
	private $script;
	
	public function init()
	{
	}

	public function run()
	{
		if(!$this->visible)
			return;
		$this->renderContent();
		//echo "</div><!-- {$this->contentCssClass} -->\n";
		//echo "</div><!-- {$this->cssClass} -->";
		if($this->selector){	# JIKA ADA SET "selector id"
			$this->script = "
			var elem_".$this->id." = $('#".$this->id ."');		
			var selector_".$this->id." = $('#".$this->selector ."');   
			var margin_left_".$this->id." = selector_".$this->id.".width() - (elem_".$this->id.".width()+15);
			elem_".$this->id.".css({'margin-left':  margin_left_".$this->id.", 'margin-top': '30px' });";
		}
		else
			$this->script = "
			var elem_".$this->id." = $('#".$this->id ."');
			var selector_".$this->id." = elem_".$this->id.".parent();		//alert(selector.attr('id') );
			var margin_left_".$this->id." = selector_".$this->id.".width() - (elem_".$this->id.".width()+15);
			elem_".$this->id.".css({'margin-left':  margin_left_".$this->id.", 'margin-top': '5px' });";
			
		Yii::app()->getClientScript()->registerScript('myPanelbar_'.$this->id, $this->script);
	}

	protected function renderContent(){	
		// $selector_id ="$('#".$this->id."').parent()";   
		$selector_id = ($this->selector) ? "$('#".$this->selector."')" : "$('#".$this->id."').parent()";   //echo $selector_id;
		
		echo '<div id="'.$this->id.'" class="'. $this->class. ' " style="position: absolute">' .
				'<div class="task_'.$this->id.' icon_max btn btn-default" title="Maximize" onClick="'.$selector_id.'.attr({\'rows\':\'30\'}).animate({height:\'100%\'}, \'slow\');"></div>' .
				'<div class="task_'.$this->id.' icon_min btn btn-default" title="Miximize" onClick="'.$selector_id.'.css({\'height\': \'100px\', \'overflow\':\'auto\'}).scrollTop('.$selector_id.'.height());"></div>' .
				'<div class="task_'.$this->id.' icon_close btn btn-default" title="close" onClick="'.$selector_id.'.slideUp(); $(\'#'.$this->id.'_toggle\').show(); $(\'.task_'.$this->id.'\').slideUp(); $(\'#'.$this->id.'\').css({\'position\': \'relative\'});"></div>'.
				'<div id="'.$this->id.'_toggle" class="icon_on btn btn-default" title="Show" onClick="'.$selector_id.'.slideToggle(); $(this).hide(); $(\'.task_'.$this->id.'\').show(); $(\'#'.$this->id.'\').css({\'position\': \'absolute\'});" style="display:none"></div>'.
				'</div>';
		
		echo '<div style="margin-top:5px">';
		if( is_array($this->content) || is_object($this->content))
			dump($this->content);
		else
			echo '<p>'. $this->content .'</p>';
		echo '</div>';
		//echo "xxxxxxxxxxxxxxxxxxxxxxxx".$this->selector;
	}
}