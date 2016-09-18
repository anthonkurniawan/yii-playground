<!--<script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.js"></script> -->

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/themes/base/jquery.ui.tooltip.css"><!--must-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/ui/jquery.ui.position.js"></script>
<script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/ui/jquery.ui.tooltip.js"></script> 

<?php $this->layout='column2';?>
<?php
$this->pageTitle=Yii::app()->name . ' - Tooltip with JQuery-UI'; 
$this->breadcrumbs=array('tooltip_jquery',);
?>

<?php
$this->menu=array(
	array('label'=>'Default functionality', 'url'=>'http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-192/development-bundle/demos/tooltip/default.html'),
	array('label'=>'Custom style with arrow', 'url'=>'http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-192/development-bundle/demos/tooltip/custom-style.html'),
	array('label'=>'Forms with tooltips', 'url'=>'http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-192/development-bundle/demos/tooltip/forms.html'),
	array('label'=>'Track the mouse', 'url'=>'http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-192/development-bundle/demos/tooltip/tracking.html'),
	array('label'=>'Custom animation', 'url'=>'http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-192/development-bundle/demos/tooltip/custom-animation.html'),
	array('label'=>'Custom content', 'url'=>'http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-192/development-bundle/demos/tooltip/custom-content.html'),
	array('label'=>'Video Player', 'url'=>'http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-192/development-bundle/demos/tooltip/video-player.html'),
);
?>

<a href="http://api.jqueryui.com/tooltip/" target="_blank">Tooltip JQuery-Dokumentasi</a> |
<a href="http://jqueryui.com/tooltip/#video-player" target="_blank">Tooltip JQuery-Demo</a> <br>
<b class="txtTitle">Sample Tooltip with Jquery-UI</b><br>

<div class="ket">
<p>Tooltips are also useful for form elements, to show some additional information in the context of each field.</p>
Sntax :<br>
$( ".selector" ).tooltip( "option", "content" );<br>
$( ".selector" ).tooltip();  //default/basic<br>
$( ".selector" ).tooltip({ content: "Awesome title!" }); <br>//option: content, disabled, hide, items, position, show, tooltipClass, track
</div>

<!------------------------------------------------------------------------- SAMPLE -------------------------------------------------------------------------------->
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<style type="text/css">
.container {width:1000px}
.loading {
    /*background-color: #eee;*/
    /*background-image:  url(<?php Yii::app()->request->baseUrl;?>'../../images/loading/black_loading5.gif');*/  
	background-image:  url(<?php Yii::app()->request->baseUrl;?>'../../images/loading/bar_loading_black.gif'); 
	background-position:  center center;
    background-repeat: no-repeat;
    opacity: 1;
}
div.loading * { opacity: .8; }
</style>

<style>
    .ui-tooltip, .arrow:after {
        background: black;
        border: 2px solid white;
    }
    .ui-tooltip {
        padding: 5px 10px;
        color: white;
        border-radius: 20px;
        font: bold 14px "Helvetica Neue", Sans-Serif;
        text-transform: uppercase;
        box-shadow: 0 0 7px black;
    }
    .arrow {
        width: 70px;
        height: 16px;
        overflow: hidden;
        position: absolute;
        left: 50%;
        margin-left: -35px;
        bottom: -16px;
    }
    .arrow.top {
        top: -16px;
        bottom: auto;
    }
    .arrow.left {
        left: 20%;
    }
    .arrow:after {
        content: "";
        position: absolute;
        left: 20px;
        top: -20px;
        width: 25px;
        height: 25px;
        box-shadow: 6px 5px 9px -9px black;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        tranform: rotate(45deg);
    }
    .arrow.top:after {
        bottom: -20px;
        top: auto;
    }
</style>

<script>
$(function() {
	//default
	$( ".tooltip1").tooltip(); 
	//$( ".tooltip").tooltip({ content: "<h1>Awesome title!</h1>" }); 
		
	//custom with frame arrow
	$(".tooltip_arrow").tooltip({
        position: {
			my: "center bottom-20",
			at: "center top",
			using: function( position, feedback ) {
                $( this ).css( position );
                $( "<div>" )
					.addClass( "arrow" )
                    .addClass( feedback.vertical )
                    .addClass( feedback.horizontal )
                    .appendTo( this );
            }
		}
	});	
		
	//custom with ajax call
	$(".tooltip_ajax").tooltip({
		content:  function() {
			var result = $("<span>").html("<div class='loading'>loading..</div>"); 	//.ui-tooltip 
			//$(".ui-tooltip ").addClass("loading");	//.ui-tooltip 
			//$.get("/HTDOCS/yiiProject/yiiTest/index.php/widget_CgridView/view/1", { id: "myid" }, function(data) { result.html(data); }, "html"); 
			$.ajax({
				//url: $(this).attr("href"),
				url:'/HTDOCS/yiiProject/yiiTest/index.php/widget_CgridView/view/1',
				success: function(html){ result.html(html); }
			});
			return result; 
		}
	});

});
</script>

<p> <label for="age">Your age:</label> <input id="age" class="tooltip1" title="We ask for your age only for statistical purposes." /> </p>

<a href="#" class="tooltip_arrow" title="Test Link">sample tooltip1</a><p>

<a href="http://localhost/HTDOCS/yiiProject/yiiTest/index.php/Widget_CgridView/picView?id2=propic1"  title="ajax title" class="tooltip_ajax" >Test Ajax</a><br>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>