<script src="js/fancybox/jquery.fancybox.js"></script>
<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

<script src="js/ui/jquery.ui.widget.js"></script>  <!-- HARUS ADA (FANCY NEED TOO) -->

<script src="js/ui/jquery.ui.tabs.js"></script>
<link rel="stylesheet" href="js/jquery-ui.css" />

<!-------------------------------------------------------------------------------------------->

<?php
$this->breadcrumbs=array(
	'Products',
); ?>

<!-------------------------------------------------------------------------------------------->

<script>
	$(function() {		//alert('test');
		/*
		$("#tabs").tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$(anchor.hash).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			
			}
		});  		*/
		
		/**------------------- LINK DI DALAM TAB KALO DI KLICK AKAN KE TAB YG LAIN -OK
		var $tabs = $('#tabs').tabs(); // first tab selected

		$('#test_link').click(function() { // bind click event to link
   			$tabs.tabs('select', 5); // switch to third tab
   			return false;
		});		*/
		
		/** mengambil indeks dari tab yang sedang dipilih ---------------------------------- 
		var $tabs = $('#test').tabs();
		var selected = $tabs.tabs('option', 'selected'); //alert(selected);// => 0  */
		
	  /*$('#tabs').tabs({
    		load: function(event, ui) {
        		$(ui.panel).delegate('a', 'click', function(event) {
            		$(ui.panel).load(this.href);
            		event.preventDefault();
       			 });
   			 }
		});		*/
		
		/** -------------immediately select a just added tab (untuk load tab mana yg di load duluan ) 
		var $tabs = $('#tabs').tabs({
    		add: function(event, ui) {
       			 $tabs.tabs('select', '#' + ui.panel.id);
   			}
		});   */
		
		
		/**-------Returning false in the tabs select handler prevents the clicked tab from becoming selected.  */
		$('#tabs').tabs({
    		select: function(event, ui) {
        		//var isValid = ... // form validation returning true or false
        		//return isValid;
    		}
		});
	
		
		/**-------TESTING AJE
		//alert($tabs.attr('id'));	
		/*$('#tabs').event(function(){	
			alert('test');
		});*/
	});
</script>


<?php /*
Yii::app()->clientScript->registerScript('nama_bebas', "
$('#tabs').tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$(anchor.hash).html(
						\"Couldn't load this tab. We'll try to fix this as soon as possible. \" +
						\"If this wouldn't be a demo.\" );
				}
			}
		});
");		*/
?>

<?php
Yii::app()->clientScript->registerScript('fancy', "
$('.view').fancybox({
			afterClose: function() {
			parent.location.reload(true);
			},
			'transitionIn'	:	'elastic',//none
			'transitionOut'	:	'elastic',
			'speedIn'		:	600, 
			'speedOut'		:	200, 
			'overlayShow'	:	false,
			'autoDimensions': false,
			'width'         : 550,
			'height'        : 500,//auto
		});
			
");		
?>    

<!-------------------------------------------------------------------------------------------->
<?php 
$this->menu=array(
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
	array('label'=>'Manage Products Advance', 'url'=>array('product_adv')),
);
?>
<a class="view fancybox.iframe" href="#" title="Tambah Nama"> test fancy</a><p>
<?php 
	//print_r($_GET); 
	//print_r($_REQUEST); 
	//print_r($_COOKIE);
	//print_r($_ENV);
	//print_r($_SERVER);
	//print_r($_SESSION);
?>
    
<h1>Products</h1>

<?php    /*
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Static tab'=>'Static content',
        
		//'Render tab'=>$this->renderPartial('site/pages/about',null,true),
		'Create Product'=>$this->renderPartial('create',array('model'=>$model_create),true),
		'Manage Products - Advance'=>$this->renderPartial('product_adv_tab',array('model'=>$model),true),
		
		'Render tab'=>$this->renderPartial('pages/_content1','test',true),
        'Ajax tab'=>array('ajax'=>array('ajaxContent','view'=>'_content2')),
    ),
    'options'=>array(
        'collapsible'=>true,
        'selected'=>1,
    ),
    'htmlOptions'=>array(
        'style'=>'width:900px;'
    ),
));			*/
?>
<!---------------------------------------------------------------------------------------->
<?php echo CHtml::link('Link TEST',array('products/create')); ?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Preloaded</a></li>
        <li><a href="#test">test</a></li>
        <li><a href="#test2">test2</a></li>
		<li><?php echo CHtml::link('New Product',array('products/create')); ?></li>
		<li><a href="ajax/content2.html">Tab 2</a></li>
		<li><a href="ajax/content3-slow.php">Tab 3 (slow)</a></li>
	</ul>
    
	<div id="tabs-1">
		<p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. 
        	Nam elementum quam ullamcorpe.</p>
	</div>
    <div id="test">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
    <div id="test2">
		<a href="http://localhost" id="test_link"> test fancy</a> <br />
        sjdsdjsljdsldjlsjljs..
	</div>
    
</div>


<div class="demo-description">
<p>Fetch external content via Ajax for the tabs by setting an href value in the tab links.  While the Ajax request is waiting for a response, the tab label changes to say "Loading...", then returns to the normal label once loaded.</p>
<p>Tabs 3 and 4 demonstrate slow-loading and broken AJAX tabs, and how to handle serverside errors in those cases. Note: These two require a webserver to interpret PHP. They won't work from the filesystem.</p>
</div><!-- End demo-description -->


