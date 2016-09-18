<?php $this->layout='column2';?>
<?php
$this->pageTitle=Yii::app()->name . ' - Tooltip Basic -JS Function'; 
$this->breadcrumbs=array('tooltip_js',);
?>

<?php $this->renderPartial('tooltip/_menu'); ?>
	
<a href="http://api.jqueryui.com/tooltip/" target="_blank">Tooltip JQuery-Dokumentasi</a> |
<a href="http://jqueryui.com/tooltip/#video-player" target="_blank">Tooltip JQuery-Demo</a> <br>
<b class="txtTitle">Sample Tooltip with JS Fuction</b>

<div class="ket">
<ul>	
    <li>This tooltip would replace title attribute of an HTML element.</li>
    <li>This tooltip text is extracted from the title attribute.</li>
    <li>This tooltip is compatible with common modern browser.</li>
    <li>This is not a jQuery plugin.</li>
</ul>
When cursor over on an element with title attribute, normally it will display a tooltip. Extract that title attribute, save it to a variable and remove original title attribute (to prevent original title being displayed).
Create a div element next to current element with position absolute, hidden, and fill it up with extracted title text. Finally, display that div when mouse over on it.

Then what happen when mouse cursor leaves the element? Simply, restore title attribute, and hide or remove tooltip.
</div>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<script type="text/javascript">
$(document).ready(function(){
	$('.poptip').mouseenter(function(){
		var text = $(this).attr('title');
		var posi = $(this).position();
		var top  = posi.top;
		var left = posi.left+5;
		var wid	 = $(this).width();
		$(this).attr('title','');
		$(this).parent().append('<div class="poptext">'+text.replace('|','<br />')+'</div>');
		$('.poptext').css({'left':(left+wid)+'px',
				'top':(top-$('.poptext').height())+'px',
				'background':'#fffeee',
				'border':'1px solid #f7a229',
				'display':'none',
				'position':'absolute',
				'z-index':'1000',
				'padding':'5px',
				'font-size':'0.8em'
		});
		$('.poptext').fadeIn('slow');
	});

	$('.poptip').mouseleave(function(){
		var title = $(this).parent().find('.poptext').html();
		$(this).attr('title',title.replace('<br />','|'));
		$(this).parent().find('.poptext').fadeOut('slow');
		$(this).parent().find('.poptext').remove();
	});
});
</script>

Lorem Ipsum is simply <a class="poptip" title="This is a simple tooltip in a link" href="#">dummy text</a> 

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>