<?php 
// $this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - Solr'; 
$this->breadcrumbs=array('solr/solr',);
//$this->renderPartial('WYSIWYG/_menu');
?>

<h1>SOLR</h1>

	<style>
	.ui-autocomplete-loading {
		background: white url('<?php echo Yii::app()->homeUrl; ?>/images/loading/wheel-load1.gif') right center no-repeat;
	}
	.ui-autocomplete {
		max-height: 100px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
	}
	/* IE 6 doesn't support max-height
	 * we use height instead, but this forces the menu to always be this tall
	 */
	* html .ui-autocomplete {
		height: 100px;
	}
	</style>
	
<!-- Resize Script-->
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/colResizable-1.3.min.js'); ?>
<!--
<script type="text/javascript">
	$(function(){	
		$("table").colResizable();
		// $("table").colResizable({
			// //liveDrag:true, 
			// // gripInnerHtml:"<div class='grip'></div>", 
			// // draggingClass:"dragging", 
			// // onResize:onSampleResized
		// });
	});	
</script>
-->

<?php echo CHtml::beginForm(); ?>
<div class="view2">
	<?php echo CHtml::label('Search Query', ''); ?>
	<?php //echo CHtml::textField('q',$value='',$htmlOptions=array()) ?>
	<?php
	// $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	$this->widget('myCJuiAutoComplete', array(
		'name'=>'q',  //as ID name
		// 'source'=>$this->createUrl('tool/AutoComplete_solr', array('term_fl'=>'name')), #suggestUsername($keyword, $limit=20) @"TblUserMysql - model"
		'source'=>'js:function(request, response){	//alert(request + response);	alert(request.term);
			var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
			$.getJSON( "'.$this->createAbsoluteUrl('solr/AutoComplete_solr', array('term_fl'=>'name')).'", request, function( data, status, xhr ) {
													//alert(data[0]);
				response(								 
					data.map(function(val, i) {	//alert(val + "-"+i);
						var text = val.label;			//alert(this.value);  //alert(text);
																	// alert( $.ui.autocomplete.escapeRegex(request.term));
						if ( val.value && ( !request.term || matcher.test(text) ) )
							return {
								label: text.replace(
									new RegExp(
										"(?![^&;]+;)(?!<[^<>]*)(" +
											$.ui.autocomplete.escapeRegex(request.term) +
										")(?![^<>]*>)(?![^&;]+;)", "gi"
									), "<strong>$1</strong>" ),
								//label : "<b>"+ text +"</b>",
								value: text,
							};
						else
							return { 
								label : "<span class=\"txtAtt\">" + val.label, 
								value : val.value
							};
					})
				);
			});
		}',
		
		// additional javascript options for the autocomplete plugin
		'options'=>array(
			'minLength'=>'2',
			'change'=>'js:function( event, ui ) {	
				if ( !ui.item )
					return removeIfInvalid( this );
			}',	
			'select'=>'js:function( event, ui ) {
				log( ui.item ?
					"Selected: " + ui.item.label :
					"Nothing selected, input was " + this.value);
			}',
			'open'=>'js:function() {
				$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			}',
			'close'=>'js:function() {
				$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			}',
			// 'focus'=>"js:function(event, ui) {
				// $('#".CHtml::activeId($model,'username')."').val(ui.item.value);
			// }"
		),
		# ini khusus gw buat sdr extednd widget
		'renderItem'=>'function( ul, item ) {
				return $( "<li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.label + "</a>" )
				.appendTo( ul );
		};',
		
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
	));	
	?>
	
	<?php //echo Chtml::button('Fetch', array('onClick' => 'fetch()')); ?> 
	<?php echo Chtml::button('Fetch Solr', array('id'=>'fetch_solr', 'class'=>'btn btn-sm btn-primary')); ?> 
	<label for="search">Search Mode : </label>
	<?php 
		echo CHtml::dropDownList('search', 'select', 
			array('select'=>'select', 'spell'=>'spell', 'suggest'=>'suggest', 'terms'=>'terms'), 
			array('id'=>'search', 'OnChange'=>'{
				if($(this).val()=="terms") $("#term_fl").show(); }'
			)
		); 
	?>
	<label for="show_class">See Class properties : </label>
	<?php echo CHtml::dropDownList('show_class', true, array(true=>'true', false=>'false'), array('id'=>'show_class')); ?>
	
	<span id="term_fl" style="display:none"> Field : <?php echo CHtml::textField('term_fl',$value='',$htmlOptions=array('size'=>10)) ?></span>
</div>

<?php echo CHtml::endForm(); ?>

<label for="auto_clear">Auto Clear tabs: </label>
<?php echo CHtml::checkBox('auto_clear', '', array('id'=>'tab_autoClear')); ?>
<?php echo Chtml::button('Clear Tabs', array('id'=>'tab_clear', 'class'=>'btn btn-sm btn-default right', 'style'=>'display:none', 'onClick'=>'js:clearTab("tabs");')); ?> 

<div class="clear"></div>

<!--- RESULT -->
<div id="result" style="height:300px; overflow: auto"></div>

<!------------------------------ FETCH KELAS -------------------------------->

<?php
$this->widget('zii.widgets.jui.CJuiTabs',array(
	'id'=>'tabs',
    'tabs'=>array(),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
		// 'selected'=>0,
		// 'select'=> 'js: function(event, ui) {
			// //$(\'.tbl_resize\').colResizable({disable: true});
			// $(\'.tbl_resize\').colResizable();
		// }',
		'show'=> 'js: function(event, ui) {				//alert( $(this).attr("id") );
			//var table = $(ui[\'panel\']).find(\'table\');	//alert(table);
			//$(table).colResizable({disable: true});
			//$(table).colResizable();
			
			$(\'.tbl_resize\').colResizable({disable: true});
			$(\'.tbl_resize\').colResizable();
		}',
    ),
	'htmlOptions'=>array('style'=>'display:none'),
));
?>

<div id="log" class="flash-error"></div>

<?php
$cs = Yii::app()->getClientScript();  
//$cs->registerScriptFile('jquery-ui.min.js');
 
$cs->registerScript('log', 'function log( message ) {
	$( "<div>" ).text( message ).prependTo( "#log" );
	$( "#log" ).scrollTop( 0 );
}'); 

$cs->registerScript('solr_res',
"$('#fetch_solr').click(function(){ 
	var res = $('#result');
	var show_class = $('#show_class');
	//var tabClear = $('#tab_autoClear');		alert(tabClear.is(':checked'));		
	
	 $.ajax({
		url: 'http://localhost/yii/yiitest/solr/getSolr',
		type: 'POST',
		dataType: 'json',
		data : $('form').serialize(),
		beforeSend :function(){
			res.html('<div class=\'loading\'>loading..</div>') ;
			//tabs.tabs( 'refresh' );
			if($('#tab_autoClear').is(':checked'))
				clearTab('tabs');
		},
		success: function(data){ 	 // alert(data);
			res.addClass('myBox');
			res.html(data.result.toString() );
			
			if(show_class.val()==1){		
				var tab_item = {'client': data.client, 'query':data.query};
				getObj_tabs('tabs', tab_item);
			}
			$('#tab_clear').show();	// show button tab clear
		},
		error: function(xhr, status, errorThrown) {	//Type: Function( jqXHR jqXHR, String textStatus, String errorThrown )
			$('#res').text(status + errorThrown);
		},
		complete: function(data, status, xhr){	
			// $('table').colResizable();
			// event.preventDefault();
		}
	});
	
});"                //define function
    //,CClientScript::POS_END   # Defaults to CClientScript::POS_READY.
);

?>


<!---------------------------------------- TAB ------------------------------------->
<!--
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Nunc tincidunt</a></li>
		<li><a href="#tabs-2">Proin dolor</a></li>
		<li><a href="#tabs-3">Aenean lacinia</a></li>
	</ul>
	<div id="tabs-1">
		<p>Proin elit arcu, rutruper ante. Etiam aliqifeudin. Sed ut dolor nec  lectus.</p>
	</div>
	<div id="tabs-2">
		<p>Morbi tincidunt, dui sit amet facilism. Suspendisseque pretium portor et purus.</p>
	</div>
	<div id="tabs-3">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspuisque eu urns a, lacus.</p>
	</div>
</div>

<div class="demo-description">
<p>Click tabs to swap between content that is broken into logical sections.</p>
</div>
-->