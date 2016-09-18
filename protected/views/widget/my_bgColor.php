<?php //$this->layout='column1'; ?>
<?php
$this->breadcrumbs=array(
	'Custorders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Custorder', 'url'=>array('index')),
	array('label'=>'Create Custorder', 'url'=>array('create')),
);
?>
<!----------------------------------------- CONTENT --------------------------->
<?php
$bg=array(
"ftr_glasy_blue.png",
"portlet_right.gif",
"ui-bg_flat_0_a7a38b_40x100.png",
"ui-bg_flat_0_fae98f_40x100.png",
"ui-bg_flat_75_0a0a0a_40x100.png",
"ui-bg_glass_55_77c5c5_1x400.png",
"ui-bg_glass_55_ebd28e_1x400.png",
"ui-bg_glass_65_47d8e6_1x400.png",
"ui-bg_highlight-hard_70_000000_1x100.png",
"ui-bg_highlight-hard_80_d7ebf9_1x100.png",
"ui-bg_highlight-soft_25_ffef8f_1x100.png",
"ui-bg_highlight-soft_70_47d8e6_1x100.png",
"ui-bg_highlight-soft_75_47d8e6_1x100.png",
"ui-bg_highlight-soft_100_e6e8eb_1x100.png",
"ui-bg_inset-hard_75_77c5c5_1x100.png",
"ui-bg_inset-hard_75_ebd28e_1x100.png",
"ui-bg_inset-hard_100_e8d991_1x100.png",
"ui-bg_inset-soft_50_deedf7_1x100.png",
"ui-bg_inset-soft_100_47d8e6_1x100.png"
);

$bg_grid=array(
"bg.gif",
"cell-special-bg.png",
"column-header-bg.gif",
"column-header-bg.png",
"column-header-over-bg.gif",
"column-header-over-bg.png",
"dhx_simple_sep.png",
"footer-bg.gif",
"grid3-hrow.gif",
"grid3-hrow-over.gif",
"grid-blue-hd.gif",
"grid-split.gif",
"grid-blue-split.gif",
"grid-vista-hd.gif",
"grid-hrow.gif",
"header_bg.gif",
"hdr_black.png",
"hdr_glasy_blue.png",
"hdr_skyblue.png",
"header_bg_60.gif",
"header-bg.gif",
"header-bg_blue.gif",
"header-selected-bg_blue.gif",
"header-selected-bg.gif",
"row-over.gif",
"mso-hd.gif",
"row-sel.gif",
"skin_light_header.png",
"skin_modern_header.png",
"skinA_header.png",
"skinB_header.png",
"sky_blue_grid.gif",
"sky_blue_sel.png",
"sky_blue_sel2.png",
"tb-blue.gif",
"toolbar-default-bg.gif"
);

$bg_panel=array(
"panel-header-default-bottom-bg.gif",
"panel-header-default-framed-bottom-bg.gif",
"panel-header-default-framed-bottom-corners.gif",
"panel-header-default-framed-bottom-sides.gif",
"panel-header-default-framed-collapsed-bottom-bg.gif",
"panel-header-default-framed-collapsed-bottom-corners.gif",
"panel-header-default-framed-collapsed-top-corners.gif",
"panel-header-default-framed-collapsed-bottom-sides.gif",
"panel-header-default-framed-collapsed-top-bg.gif",
"panel-header-default-framed-collapsed-top-sides.gif",
"panel-header-default-framed-top-corners.gif",
"panel-header-default-framed-top-bg.gif",
"panel-header-default-framed-top-sides.gif",
"panel-header-default-top-bg.gif"
);
?>

<style>
.bg div { height:30px; margin:3px 5px; width:450px;}
div .bg {border:1px solid #000; font-size:11px; text-align:left; margin-bottom:10PX}
</style>

<!------------------------------------------ BG COLOR PANEL ---------------------------------------->
<h3><?php echo Yii::app()->request->baseUrl."../images/BG/";?></h3>
<div class="bg" style="float:left">
<?php $x=1; ?>
<?php foreach($bg as $i) { ?>
	<div style="float:<?php echo $x%2==0?'left':'right'?>; background:url(<?php echo Yii::app()->request->baseUrl."/images/BG/".$i;?>)"> 
		<?=$i?>
    </div>
<?php $x++; } ?>
</div>

<!------------------------------------------ BG COLOR PANEL ---------------------------------------->
<h3><?php echo Yii::app()->request->baseUrl."../images/BG/PANEL";?></h3>
<div class="bg" style="float:left">
<?php $x=1; ?>
<?php foreach($bg_panel as $i) { //echo $x++?>	
	<div style="float:<?php echo $x%2==0?'left':'right'?>; background:url(<?php echo Yii::app()->request->baseUrl."/images/BG/PANEL/".$i;?>)"> 
		<?=$i?>  
    </div>
<?php $x++; } ?>
</div>

<!------------------------------------------ BG COLOR GRID ---------------------------------------->
<h3><?php echo Yii::app()->request->baseUrl."../images/BG/GRID";?></h3>
<div class="bg" style="float:left">
<?php $x=1; ?>
<?php foreach($bg_grid as $i) { //echo $x++?>	
	<div style="float:<?php echo $x%2==0?'left':'right'?>; background:url(<?php echo Yii::app()->request->baseUrl."/images/BG/GRID/".$i;?>)"> 
		<?=$i?> 
    </div>
<?php $x++; } ?>
</div>