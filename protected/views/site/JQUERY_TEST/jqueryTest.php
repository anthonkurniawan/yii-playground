<style> .container { width: 1100px }</style>

http://localhost/JS/JQUERY_PLUGIN/jquery-ui-192/

<div class="view">
Usage 
First, define a viewRenderer component in an application configuration:
...
'components' => array(
   ...
   'viewRenderer' => array(
       'class' => 'CPhpViewRenderer'
   ),
   ...
),
...
Second, you can use directly the renderer component for rendering views (usually needed for console applications):

...
$context = $renderer = Yii::app()->getComponent('viewRenderer');
$viewData = array('param1' => 'value1', 'param2' => 'value2');
$content = $renderer->renderFile($context, 'absolute/path/to/view/file', $viewData, true);
...
Third, CController::render(), CWidget::render() methods will work same way as in the framework :)

<?php // echo __FILE__;
// $context = $renderer = Yii::app()->getComponent('viewRenderer');			dump($context);
// $viewData = array('param1' => 'value1', 'param2' => 'value2');
// $content = $renderer->renderFile($context, 'D:\WEB\HTDOCS\yiiProject\yiiTest\protected\views\site\JQUERY_TEST\jqueryTest.php', $viewData, true);
?>


<script type="text/javascript">
// initialize the jquery code
  $(document).ready(function() {
//close all the content divs on page load
    $('.mover').hide();

// toggle slide
    $('#slideToggle').click(function() {
// by calling sibling, we can use same div for all demos
      $(this).siblings('.mover').slideToggle();
    });

// regular toggle with speed of 'slow'
    $('#toggleSlow').click(function() {
      $(this).siblings('.mover').toggle('slow');
    });

// fade in and out
    $('#fadeInOut').toggle(function() {
      $(this).siblings('.mover').fadeIn('slow');
    }, function() {
      $(this).siblings('.mover').fadeOut('slow');
    });

//animate
    $('#animate').click(function() {
      $(this).siblings('.mover')
              .slideDown(5500).fadeOut(7300);
    });

  });
</script>


<script type="text/javascript">
// initialize the jquery code
  $(document).ready(function() {
// any of the links removes all classes
// return false keeps the browser from following the link's '#' target
    $("#switchLinks a").click(function() {
      $("#contentArea").removeClass();
      return false;
    });
// clicking one link adds its own class
    $("#linkOne").click(function() {
      $("#contentArea").addClass("one");
    });
    $("#linkTwo").click(function() {
      $("#contentArea").addClass("two");
    });
    $("#linkThree").click(function() {
      $("#contentArea").addClass("three");
    });
  });
// easy peasy!
</script>


<!-- content-wrap starts here -->
<fieldset>
	<legend>Animations</legend>
	<a href="#" id="slideToggle">slideToggle (slide down, slide up)</a> | 
	<a href="#" id="toggleSlow">Toggle (hide, show) with speed of 'slow'</a> |
	<a href="#" id="fadeInOut">Fade in and out with speed of 'slow'</a> |
	<a href="#" id="animate">Custom (and pointless) animation</a> <p>

	<div class="mover ket">
		<p>Benchmarking against industry leaders, an essential process, should be a top priority at all times measure the process, not the people. An important ingredient of business process reengineering building flexibility through spreading knowledge and self-organization, defensive reasoning, the doom loop and doom zoom. Quantitative analysis of all the key ratios has a vital role to play in this presentation of the process flow should culminate in idea generation, big is no longer impregnable. Whenever single-loop learning strategies go wrong, the strategic vision - if indeed there be one - is required to identify as knowledge is fragmented into specialities.</p>
		<p>By moving executive focus from lag financial indicators to more actionable lead indicators. From binary cause and effect to complex patterns, combined with optimal use of human resources, measure the process, not the people. Presentation of the process flow should culminate in idea generation, building flexibility through spreading knowledge and self-organization, the new golden rule gives enormous power to those individuals and units. Organizations capable of double-loop learning, to experience a profound paradigm shift, motivating participants and capturing their expectations. Whenever single-loop learning strategies go wrong, the components and priorities for the change program highly motivated participants contributing to a valued-added outcome.</p>
		<p>Working through a top-down, bottom-up approach, taking full cognizance of organizational learning parameters and principles, motivating participants and capturing their expectations. The three cs - customers, competition and change - have created a new world for business building a dynamic relationship between the main players. Exploitation of core competencies as an essential enabler, defensive reasoning, the doom loop and doom zoom in order to build a shared view of what can be improved. Through the  adoption of a proactive stance, the astute manager can adopt a position at the vanguard. Combined with optimal use of human resources, to ensure that non-operating cash outflows are assessed.</p>
	</div>
  
</fieldset>

<fieldset>
	<legend>Jquery Code</legend>
	<textarea onClick="this.select()" onBlur="">
	........................ THE CODE ..............
  </textarea>
</fieldset>



<!-------------------------------------------------------------------------------------------------------------------------------------->
<!-- jquery for this page -->
<script type="text/javascript">
// initialize the jquery code
  $(document).ready(function() {
// changer links when clicked
    $("a.changer").click(function() {
//set the div with class mainText as a var called $mainText 
      var $mainText = $('div.mainText');
// set the current font size of .mainText as a var called currentSize
      var currentSize = $mainText.css('font-size');
// parse the number value out of the font size value, set as a var called 'num'
      var num = parseFloat(currentSize, 10);
// make sure current size is 2 digit number, save as var called 'unit'
      var unit = currentSize.slice(-2);
// javascript lets us choose which link was clicked, by ID
      if (this.id == 'linkLarge') {
        num = num * 1.4;
      } else if (this.id == 'linkSmall') {
        num = num / 1.4;
      }
// jQuery lets us set the font Size value of the mainText div
      $mainText.css('font-size', num + unit);
      return false;
    });
// hover for links - toggle css background colors
    $("a.changer").hover(function() {
      $(this).css('background-color', '#0099fb');
    }, function() {
      $(this).css('background-color', '#fff');
    });
// hide switchLinks on page load
    $('#switchLinks').hide();
// show the switchLinks div if showme is clicked
    $('#showMe').click(function() {
      $(this).hide();
      $('#switchLinks').show();
      return false;
    });
// hide switchlinks if it is clicked
    $('#switchLinks').click(function() {
      $(this).hide();
      $('#showMe').show();
      return false;
    });

  });
</script>


<h3>Easy text resizing  w/  <a href="http://www.jquery.com">jQuery</a></h3>
<p>This uses but a simple show/hide on the div containing the switcher links, a simple css 'setter' for the hover on the buttons, and a bit more complicated js calculation, with a css 'getter' to get the current size, and a 'setter' to set it up or down a notch with each click. </p>
<p> <strong>See <a href="#thecode">the code</a></strong></p>
<p>Disclaimer: if you want it cleanly degradable, hide the buttons and clickable links with css and then show the 'showMe' link with jquery when the page loads. </p>

<fieldset><legend>Text size changer example</legend>

  <a id="showMe" href="">Change text size</a>
  
  <div id="switchLinks">
    <a id="linkLarge" class="changer" href="">Larger</a>
    <a id="linkSmall" class="changer" href="">Smaller</a>
    <br />
    <br />
    <br style="clear:both"/>
    Click to close
  </div>
  
  <div class="mainText" id="demoText">
    <h1>I'm My Own Grandpaw</h1>
    <h2>by Dwight Latham and Moe Jaffe</h2>
    <p>Many, many years ago when I was twenty-three<br />
      I was married to a widow who was pretty as could be.<br />
      This widow had a grown-up daughter who had hair of red. <br />
      My father fell in love with her and soon they, too, were wed. </p>
    <p>This made my dad my son-in-law and changed my very life<br />
  </div>
  
  <br />
  <br />
</fieldset>

</div>

<div class="view2">
<b class="baadge">EMAIL ADDRESS VALIDATION</b><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!---
<![CDATA[*/
checkRegexp( 
	email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+
	(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?
	(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|
	[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|
	(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*
	([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|
	[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*
	([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" 
);
/*]]>  -->
<?php Yii::app()->sc->collect('javascript', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1,'tabSize'=>1  )); ?>
//document.getElementById("demo").innerHTML="My First JavaScript";
$("#demo").innerHTML="My First JavaScript";
document.write("<p>My First JavaScript2</p>");
$("#test").



$('<div id="test" class="foobar">' + content + '</div>');

//... is a lot harder to maintain than this:
$('<div/>', {
    id: someID,
    className: 'foobar',
    html: content
});

//If you want to create a large number of identical elements, then the last thing you want to do is create a massive loop, 
//creating a new jQuery object on every iteration. E.g. the quickest way to create 100 divs with jQuery:
jQuery(Array(101).join('<div></div>'));

//You can get the second method to achieve the same effect by:
var mySecondDiv = $('<div></div>');
$(mySecondDiv).find('div').attr('id', 'mySecondDiv');
$('#myDiv').append(mySecondDiv);

//Luca mentioned that html() just inserts hte HTML which results in faster performance.
//In some occassions though, you would opt for the second option, consider:
// Clumsy string concat, error prone
$('#myDiv').html("<div style='width:'" + myWidth + "'px'>Lorem ipsum</div>");

// Isn't this a lot cleaner? (though longer)
var newDiv = $('<div></div>');
$(newDiv).find('div').css('width', myWidth);
$('#myDiv').append(newDiv);

#----------------------------------- LOOP INTERVAL CALL --------------------------------
$(function(){
    callme();
});

function callme(){
    $('#checkit').append("callme loaded<br />");
    setInterval("callme()", 5000); //OR
	 setTimeout(callme, 5000);
}

#You need to check if the #checkit element has been created. And, you need to use a timeout (which only calls once) instead of an interval (which goes on and on):
function callme(){
   $('#checkit').append("callme loaded<br />");
   if (!document.getElementById('checkit'))
      setTimeout(callme, 5000);
}

---------------------------------------- sambung string --------------------------------------
var optionsHTML  = 'Current Option: ' + mDist + '<br />';
      optionsHTML += 'Other Options:';
      optionsHTML += ' 2 <input type="radio" name="dist" id="dist" value="2" /> |';
      optionsHTML += ' 5 <input type="radio" name="dist" id="dist" value="5" />';
  $(ui.panel).append(optionsHTML);

 ----------------------------- hide/show ----------------------------------

// show and hide
$('.tpanel2 .toggle2').click(function() {
	$(this).next().slideToggle()
	return false;
})
.next().hide(); 

	$('.tpanel .toggle').click(function() {
			$(this).next().toggle();
			return false;
	}).next().hide();
 <?php $this->endWidget(); ?>
 </div>
