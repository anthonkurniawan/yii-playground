<code> ajax(array $options) </code> Generates the JavaScript that initiates an AJAX request.  Sample : 
<div class="view2">
<b class="badge"> Sample Basic</b><br><br>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>	<!-- 
  function getData() {
	 var result="";
	$.ajax({
		type: 'get',
		//dataType: 'json',
		url: '../data.php',
		async: false,  
		//complete: function(data) {    return data; }
		success: function(data) {		//alert('data->'+data);
			//return data;
			result = data; 
			/* var series = chart.series[0];	//alert('series->'+series);
			setInterval(function() {
					//series.addPoint(data, true, true);
					series.addPoint(data);
			}, 5000); */
		}
  });
   return result;
} -->
	<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>	
</div>
