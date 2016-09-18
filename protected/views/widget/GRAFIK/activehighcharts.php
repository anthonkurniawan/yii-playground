<?php $this->layout='column1';?> 
<?php
$this->pageTitle=Yii::app()->name . ' - ActiveHighChart';
$this->breadcrumbs=array('mytemplate/ActiveHighChart',);
?>

<a href="http://www.yiiframework.com/extension/activehighcharts/" target="_blank" style="float:right">activehighcharts ext</a> <br><br>

<span class="badge badge-inverse">ActiveHighChart 1.2</span>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
    $this->Widget('ext-coll.grafik.ActiveHighcharts.HighchartsWidget', array(
        'dataProvider'=>$dataProvider,
        'template'=>'{items}',
        'options'=> array(
            'title'=>array(
                'text'=>'Chart View'
            ),
            'xAxis'=>array(
                // It cant be 1.a self-defined xAxis array as you want; 
                // 2.a series from datebase such as time series
                "categories"=>'item'            
            ),
            'series'=>array(
                array(
                    'type'=>'line',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge,  // 'arearange', 'areasplinerange', 'columnrange
                    'name'=>'Data',             //title of data
                    'dataResource'=>'price',     //data resource according to datebase column
                )
            )
        )
    ));
?>

<?php		
//$chart_id = $chart->getId();
	$chart_id = 'yw0';
    $refresh_button = $this->widget('zii.widgets.jui.CJuiButton', array(
        'buttonType'=>'button',
        'name'=>'refresh',
        'caption'=>'Refresh',
        'options'=>array(
        ),
        'onclick'=>'js:function(){
            url = window.location.href+"?";
            $.fn.highchartsview.update("'. $chart_id .'", url);
       }'
    ));
?>

 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
 <?php Yii::app()->sc->renderSourceBox();  ?>
 
<!-------------------------------------------- 	KETERANGAN ------------------------------------->
<div class="flash-error">
Note :
<ul>
<li>Saat load chart ga keluar. tapi anehnya klo aktifin firebug langsung kluar.</li>
<li><code>id chart</code> utntuk "refreh button via ajax gw cari secara manual (liat id yg di berikan ootomatis)</li>
</ul>
</div>

