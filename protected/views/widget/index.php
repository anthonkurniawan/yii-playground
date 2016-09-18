<?php $this->layout='column1';?> 

<?php
$this->pageTitle=Yii::app()->name . ' - Widgets';
$this->breadcrumbs=array('site/widget',);
?>

<h1><small>All Widget</small></h1>

<!----------------------------------------- My Custom Portlet1------------------------------------------>
<style>
/*--public $decorationCssClass='portlet-decoration';--*/
.Mydecoration-portlet1{  		/*header*/
	padding: 3px 8px;
	background: #000099; /*biru aj*/
	border-left: 0px solid #6FACCF;
}
/*--Header Title--*/
.Mytitle-portlet1{
	font-size: 12px;
	font-weight: bold;
	padding: 0;
	margin: 0;
	color:#fff; 
}

/*----public $contentCssClass='portlet-content';-----*/
.Mycontent-portlet1 {
	margin: 0px;
	padding: 0px;
	background:#EFFDFF;
}
.Mycontent-portlet1 ul{
	list-style-image:none;
	list-style-position:outside;
	list-style-type:none;
	margin: 0;
	padding: 0;
}
.Mycontent-portlet1 li{padding: 0px;}

/*----------------- CLASS OPERATION (CONTENT MENU)-----------------*/
.Myoperations1 { list-style-type: none; margin: 0; padding: 0; }
.Myoperations1 li{padding-bottom: 2px; list-style:none; }
.Myoperations1 li a{
	line-height: 15px; font: bold 11px Arial;
	text-decoration:none; 
	display:block; padding:2px 2px 2px 10px;  
	color: #0066A4;
}
.Myoperations1 li a:visited{color: #0066A4;}
.Myoperations1 li a:hover{
	/*background: #80CFFF;*/
	color:#fff; background:#e60;
}

.subMenu{  		/*header*/
	padding: 3px 9px;
	/*background: #000099; /*biru aj*/
	background:#80CFFF

}

.box{padding:0; margin:5px; min-width:200px} 
</style>
	
	
	<?php
		$items= array(
			array('label'=>'YI Widgets', 'url'=>array('#'),'items'=>array(	
				array('label'=>'CFlex (adobe flex)', 'url'=>array('widget/cflex', 'view'=>'cflex')),
				array('label'=>'CClipWidget', 'url'=>array('widget/CClipWidget', 'view'=>'CClipWidget')),
				array('label'=>'CTabView', 'url'=>array('widget/CTabView', 'view'=>'CTabView')),
				array('label'=>'CgridView', 'url'=>array('#'), 'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
					array('label'=>'CGridView', 'url'=>array('Widget_CgridView/index')),
					array('label'=>'CGridView standar(admin)', 'url'=>array('userMysql/admin')),
					array('label'=>'CGridView Customs', 'url'=>array('Widget_CgridView/GridJoin')),
					array('label'=>'Grid with Resize', 'url'=>array('Widget_CgridView/gridResize')),
					array('label'=>'Grid Custom Style', 'url'=>array('Widget_CgridView/grid_dynamic_style')), 
					array('label'=>'Cgrid Extensions', 'url'=>array('#'), 'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
						array('label'=>'groupgridview', 'url'=>array('widget/groupgridview')),	
						array('label'=>'jtogglecolumn', 'url'=>array('widget/jtogglecolumn')),	
						array('label'=>'EDataTables', 'url'=>array('widget/EDataTables')),  
					)),
				)),
				array('label'=>'CListView', 'url'=>array('#'), 'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
					array('label'=>'CListView(standart)', 'url'=>array('userMysql/index')),
					array('label'=>'CListView Dynamic View', 'url'=>array('Widget_ClistView/dynamic_view')),
				)),
			)),
            # --- INTERFACE
			array('label'=>'INTERFACE', 'url'=>array('#'),'items'=>array(	
				array('label'=>'clonnableFields1.0', 'url'=>array('widget/clonnableFields', 'view'=>'clonnableFields')),
				array('label'=>'TbTypeAhead', 'url'=>array('widget/TbTypeAhead', 'view'=>'TbTypeAhead')),
				array('label'=>'TagHandler', 'url'=>array('widget/TagHandler', 'view'=>'TagHandler')),
				array('label'=>'eselect2', 'url'=>array('widget/eselect2', 'view'=>'eselect2')),
				array('label'=>'JEditable(NOT COMPLETE)', 'url'=>array('widget/JEditable', 'view'=>'JEditable')),
				array('label'=>'xMultiSelect', 'url'=>array('widget/xMultiSelect', 'view'=>'xMultiSelect')),
				//----- MESSAGE
                array('label'=>'MESSAGE', 'url'=>array('#'),'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
                    array('label'=>'ToastMessage', 'url'=>array('widget/ToastMsg', 'view'=>'ToastMsg')),
                    array('label'=>'HzlToastr', 'url'=>array('widget/HzlToastr', 'view'=>'HzlToastr')),
                )),
                //---- WYSIWYG Editor
                array('label'=>'WYSIWYG Editor', 'url'=>array('#'), 'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
                    array('label'=>'Jqueryte', 'url'=>array('widget/Jqueryte', 'view'=>'Jqueryte')),
                    array('label'=>'Xheditor', 'url'=>array('widget/Xheditor', 'view'=>'Xheditor')),
                    array('label'=>'TinyMce', 'url'=>array('widget/TinyMce', 'view'=>'TinyMce')),
                    array('label'=>'kindeditor(GA BISA)', 'url'=>array('widget/kindeditor', 'view'=>'kindeditor')),
                )),
			)),
            array('label'=>'Grafik','url'=>array('#'),'items'=>array(				
				array('label'=>'openflashchart2','url'=>array('#'), 'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
					array('label'=>'openflashchart', 'url'=>array('mytemplate/openFlash', 'view'=>'openFlash')),
					array('label'=>'openflashchart custom', 'url'=>array('mytemplate/openFlash_custom', 'view'=>'openFlash_custom')),
				)),
				array('label'=>'Highcharts-yii','url'=>array('#'), 'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(		
					array('label'=>'HighChart Sample', 'url'=>array('mytemplate/highchart', 'view'=>'highchart')),
					array('label'=>'HighChart Custom', 'url'=>array('mytemplate/highchart_custom', 'view'=>'highchart_custom')),
					array('label'=>'HighChart Custom Adv', 'url'=>array('mytemplate/highchart_custom_adv', 'view'=>'highchart_custom_adv')),
					array('label'=>'HighChart Dynamic', 'url'=>array('mytemplate/highchart_dynamic', 'view'=>'highchart_dynamic')),
					array('label'=>'HighChart Dynamic HTML', 'url'=>array('mytemplate/highchart_dynamic_html', 'view'=>'highchart_dynamic_html')),
					array('label'=>'HighChart Dialog', 'url'=>array('widget/CjuiDialog_highcharts', 'view'=>'CjuiDialog_highcharts')),
					array('label'=>'HighChart Date Interval', 'url'=>array('/mytemplate/highChart_interval')),
				)),		
				array('label'=>'ActiveHighCharts','url'=>array('#'),'items'=>array(	
					array('label'=>'ActiveHighCharts sample', 'url'=>array('mytemplate/activehighcharts')),
				)),
			)),
			#  PRINT, DOWNLOAD, CONVERT ( xls, pdf, etc )
			array('label'=>'Others', 'url'=>array('#'),'items'=>array(	
                array('label'=>'Excel/pdf', 'url'=>array('media/index')),	
				array('label'=>'RSS', 'url'=>array('widget/rss', 'view'=>'index')),	//----rss
				array('label'=>'Xportlet', 'url'=>array('widget/Xportlet', 'view'=>'Xportlet'),  'linkOptions'=>array('target'=>'_blank'),),
				array('label'=>'eHtmlDateSelect', 'url'=>array('widget/eHtmlDateSelect', 'view'=>'EHtmlDateSelect')),
				array('label'=>'StickyPage', 'url'=>array('widget/StickyPage', 'view'=>'StickyPage')),
				array('label'=>'jpopup1.2', 'url'=>array('widget/jpopup', 'view'=>'jpopup')),
				array('label'=>'fontSizer', 'url'=>array('widget/fontSizer', 'view'=>'fontSizer')),
				array('label'=>'XLangMenu', 'url'=>array('widget/XLangMenu', 'view'=>'XLangMenu')),
				array('label'=>'eJTimeLine', 'url'=>array('widget/eJTimeLine', 'view'=>'eJTimeLine')),
				array('label'=>'NPager', 'url'=>array('widget/npager', 'view'=>'npager')),
			)),
			//-----CJUI
			array('label'=>'CJUI on Yii', 'url'=>array('#'),'items'=>array(	
				array('label'=>'CJui', 'url'=>array('widget/cjui', 'view'=>'cjui')), 
				array('label'=>'CJuiDialog', 'url'=>array('widget/cjuiDialog', 'view'=>'cjuiDialog')), 
				array('label'=>'CJuiAccordion', 'url'=>array('widget/cjuiAccordion', 'view'=>'CJuiAccordion')), 
				//array('label'=>'cjuiDialog', 'url'=>array('widget/cjuiDialog', 'view'=>'cjuiDialog' )),		#using "CViewAction'"
				array('label'=>'CJuiTabs', 'url'=>array('widget/cjuiTabs', 'view'=>'cjuiTabs')), 
				array('label'=>'CJuiAutoComplete', 'url'=>array('widget/CJuiAutoComplete', 'view'=>'CJuiAutoComplete')),	
				array('label'=>'CJuiSlider', 'url'=>array('widget/CJuiSlider', 'view'=>'CJuiSlider')), 
				array('label'=>'cjuidatepicker', 'url'=>array('widget/cjuidatepicker', 'view'=>'cjuidatepicker')), 
				array('label'=>'cjuibutton', 'url'=>array('widget/cjuibutton', 'view'=>'cjuibutton')), 
				array('label'=>'CJuiDraggable', 'url'=>array('widget/CJuiDraggable', 'view'=>'CJuiDraggable')), 
			)),
			//------- GALERRY
			array('label'=>'GALERRY', 'url'=>array('#'),'items'=>array(	
				array('label'=>'jSupersized', 'url'=>array('widget/jSupersized', 'view'=>'jSupersized')), 
				array('label'=>'Magnific-Popup', 'url'=>array('widget/Magnific-Popup', 'view'=>'Magnific-Popup')), 
				array('label'=>'Gallery Manager', 'url'=>array('widget/galleryManager')),
				array('label'=>'Galleria', 'url'=>array('widget/galleria', 'view'=>'galleria')),
                array('label'=>'MULTIMEDIA', 'url'=>array('#'),'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
                    array('label'=>'Yiippod', 'url'=>array('widget/Yiippod', 'view'=>'Yiippod')),
                )),
			)),
			# SEARCH ENGINE EXT --------------------------
			array('label'=>'SEARCH ENGINE', 'url'=>array('#'),'items'=>array(	
				array('label'=>'Solr', 'url'=>array('widget/solr', 'view'=>'solr')),
				array('label'=>'Solr Basic', 'url'=>array('widget/solr', 'view'=>'solr_basic')),
				array('label'=>'SolrPhpClient', 'url'=>array('widget/SolrPhpClient', 'view'=>'SolrPhpClient')),
				array('label'=>'Yii-Solr', 'url'=>array('widget/solr', 'view'=>'yiisolr')),
				//array('label'=>'EajaxUpload', 'url'=>array('widget/EajaxUpload', 'view'=>'EajaxUpload'), 'linkOptions'=>array('target'=>'_blank'), ),
			)),
			
			#TREE EXTENSION/WIDGET ----------------------
			array('label'=>'TREE WIDGET', 'url'=>array('#'),'items'=>array(	
				array('label'=>'Tree Menu', 'url'=>array('widget/treeMenu')), //pake action terpisah
				array('label'=>'Tree Menu2', 'url'=>array('treeMenu/treeMenu')), 
				//array('label'=>'Tree data array', 'url'=>array('widget/treeArray')), //pake action terpisah
				array('label'=>'Tree data array', 'url'=>array('TreeArray/treeArray')), 
				array('label'=>'Tree data DB', 'url'=>array('TreeDB/tree_db')), 
				array('label'=>'CFileBrowser', 'url'=>array('widget/CFileBrowser' , 'view'=>'cfilebrowser')), 
				array('label'=>'Ex-JS tree sample', 'url'=>'http://127.0.0.1/js/EXTJS/EXTJS_TEST/examples/videos/tree.html'), 
			)),
			
			array('label'=>'Bootstrap', 'url'=>array('#'),'items'=>array(	
				array('label'=>'TbGridView', 'url'=>array('Widget_Bootstrap/TbGridView')),
				array('label'=>'Form Bootstrap', 'url'=>array('#'), 'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(
                    array('label'=>'TbNavbar', 'url'=>array('/widget_bootstrap/TbNavbar')),
                    array('label'=>'TbActiveForm', 'url'=>array('/widget_bootstrap/TbActiveForm')), 
                    array('label'=>'TbActiveForm Complete', 'url'=>array('/widget_bootstrap/TbActiveForm2')),  
					array('label'=>'TbEditableField', 'url'=>array('/widget_bootstrap/TbEditableField')),
				)),
			)),
			
			# HTTP REQUEST ---------------------------------------
            array('label'=>'HELPERS', 'url'=>array('#'),'items'=>array(
                array('label'=>'browser 0.1', 'url'=>array('widget/browserInfo', 'view'=>'browserInfo')), 
                array('label'=>'Print Codes', 'url'=>array('widget/printCodes', 'view'=>'printCodes')),
                array('label'=>'Json Behavior', 'url'=>array('widget/ejsonbehavior')),  //----JSON
                array('label'=>'Http Request', 'url'=>array('#'),'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
                    array('label'=>'yii-curl', 'url'=>array('widget/yii_curl', 'view'=>'yii_curl')),	
                    array('label'=>'EHttpClient', 'url'=>array('widget/EHttpClient', 'view'=>'EHttpClient')),	
                )),
            )),

			array('label'=>'FILES UPLOAD & READ', 'url'=>array('#'),'items'=>array(	
				array('label'=>'Basic Upload', 'url'=>array('image/basic_upload'), 'linkOptions'=>array('target'=>'_blank'), ),
				array('label'=>'CMultiFileUpload', 'url'=>array('image/CMultiFileUpload', 'view'=>'CMultiFileUpload')),
				array('label'=>'EajaxUpload', 'url'=>array('image/EajaxUpload', 'view'=>'EajaxUpload'), 'linkOptions'=>array('target'=>'_blank'), ),
				array('label'=>'yii-image-attach', 'url'=>array('gallery/create')),
				array('label'=>'yii-image(editing)', 'url'=>array('image/yiiImage', 'view'=>'yiiImage')),
				array('label'=>'xupload', 'url'=>'http://localhost/yii/demos/xupload-demo151/', 'linkOptions'=>array('target'=>'_blank')),
				
			)),
			
            # MENU JQERY PLUGIN --------------------
			array('label'=>'JQUERY COLLECTIONS', 'url'=>array('#'),'items'=>array(	
				array('label'=>'FancyBox', 'url'=>array('/widget/fancy', 'view'=>'fancy')),
				array('label'=>'Jquey PrettyDate(time Status)', 'url'=>'http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery.prettydate/demo/'),
				array('label'=>'Jquey Tooltip', 'url'=>array('widget/tooltip',  'view'=>'index'), 'linkOptions'=>array('class'=>'subMenu'), 'items'=>array(	
					array('label'=>'Tooltip-JS Function', 'url'=>array('widget/tooltip_js', 'view'=>'tooltip_js')),
					array('label'=>'Tooltip-Jquery(default)', 'url'=>array('widget/tooltip_jquery', 'view'=>'tooltip_jquery')),
					array('label'=>'Tooltip(Jquery-Jorn Zafferer)', 'url'=>array('widget/tooltip_jhon', 'view'=>'tooltip_jhon')),
					array('label'=>'tTooltip', 'url'=>array('widget/ttooltip', 'view'=>'ttooltip')),
				)),
			)),
		);
		?>

		
		<?php foreach($items as $item) :   ?>

		<div class="box left"><!--#sidebar{padding: 20px 20px 20px 0;}-->
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=> $item['label'],
				'decorationCssClass'=>'Mydecoration-portlet1',
				'titleCssClass'=>'Mytitle-portlet1',
				'contentCssClass'=>'Mycontent-portlet1',
			));
													//dump($item['items']);
			$this->widget('zii.widgets.CMenu', array(
				'items'=> $item['items'],
				'htmlOptions'=>array('class'=>'Myoperations1'),
			));
			
			$this->endWidget();
		?>
		</div>
		<?php endforeach; ?>