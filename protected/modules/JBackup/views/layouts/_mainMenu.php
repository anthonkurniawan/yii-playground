<!--------- MENU WITH (ext.widgets.ddmenu.XDropDownMenu) --------->
	<div id="mb_mainmenu">
	<?php $this->widget('ext-coll.menu.mbmenu.MbMenu',array(
	'items'=>array(
		array('label'=>'Home','url'=>array('/site/index'),'items'=>array(								   
			array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),		#using "CViewAction'"
			array('label'=>'Contact', 'url'=>array('/site/contact')),
			array('label'=>'Data User', 'url'=>array('/userMysql/index'),'items'=>array(
				array('label'=>'Create user', 'url'=>array('userMysql/create')),
				array('label'=>'Manage user', 'url'=>array('userMysql/admin')),
		 	)),
		)),
		//array('label'=>'Switch Menu', 'url'=>array('mainMenu2/mainMenu2'),),
		array('label'=>'Mytemplate','url'=>array('#'),  'linkOptions'=>array('target'=>'_blank'), 'items'=>array(	
			array('label'=>'My Menu','url'=>array('#'),'items'=>array(																			
				array('label'=>'Main menu', 'url'=>array('mytemplate/mainMenu', 'view'=>'mainMenu')),
				array('label'=>'Side menu','url'=>array('#'),'items'=>array(	
					array('label'=>'Side menu-All', 'url'=>array('myTemplate/sideMenu_all', 'view'=>'sideMenu_all')),
					array('label'=>'RightMenu', 'url'=>array('myTemplate/RightMenu', 'view'=>'RightMenu')),
				)),
			)),
			array('label'=>'My Widget','url'=>array('#'),'items'=>array(
				array('label'=>'My Portlet','url'=>array('mytemplate/myPortlet', 'view'=>'myPortlet')),
				array('label'=>'My Portlet Menu','url'=>array('mytemplate/myMenuPortlet', 'view'=>'myMenuPortlet')),
				array('label'=>'My Box','url'=>array('#'),'items'=>array(
					array('label'=>'Box standar','url'=>array('mytemplate/boxStandart', 'view'=>'boxStandart')),
					
				)),
			)),
			array('label'=>'BG Color', 'url'=>array('myTemplate/bgColor', 'view'=>'bgColor')),
			array('label'=>'Grafik','url'=>array('#'),'items'=>array(				
				array('label'=>'openflashchart2','url'=>array('#'),'items'=>array(	
					array('label'=>'openflashchart', 'url'=>array('mytemplate/openFlash', 'view'=>'openFlash')),
					array('label'=>'openflashchart custom', 'url'=>array('mytemplate/openFlash_custom', 'view'=>'openFlash_custom')),
				)),
				array('label'=>'Highcharts-yii','url'=>array('#'),'items'=>array(		
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
		)),
		array('label'=>'YII Class','url'=>array('#'),'items'=>array(	
			array('label'=>'common instance', 'url'=>array('tool/index', 'view'=>'index')),
			array('label'=>'YII api system', 'url'=>array('tool/api', 'view'=>'api')),
			array('label'=>'Show Class( Metadata ext )', 'url'=>array('tool/metadata', 'view'=>'metadata')),
			array('label'=>'Forms','url'=>array('testForm/index'),'items'=>array(
				//array('label'=>'Detail view', 'url'=>array('/person/view', 'id'=>3)),
				//array('label'=>'Tree view', 'url'=>array('/site/widget', 'view'=>'treeview')),
				array('label'=>'Ajax', 'url'=>array('/ajax/index', 'view'=>'index')),
				array('label'=>'Input Tabular', 'url'=>array('testForm/inputBatch')),	
				)),
			)),
		array('label'=>'Test DB','url'=>array('/testDb/index'),'items'=>array(	
			array('label'=>'Data Access Object & DB doc', 'url'=>array('TestDb/dbDoc')),																										
			array('label'=>'Test Query', 'url'=>array('TestDb/testQuery', 'view'=>'testQuery')),				
			array('label'=>'Test Multiple DB', 'url'=>array('TestDb/multipleDB')),	
			array('label'=>'Test Upload Migration', 'url'=>array('testDb/LoadMigration'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'Sample Create table', 'url'=>array('testDb/TestCreateTable'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'Dump table(dumpDB ext)', 'url'=>array('widget/dumpDb', 'view'=>'dumpDb'), ),	
		)),
		
		# TOOLS & CONSOLE
		array('label'=>'Tools','url'=>array('/testDb/index'),'items'=>array(	
			array('label'=>'RenderFile using CPhpViewRender', 'url'=>array('widget/Cphp_renderFile'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'RenderFile YII', 'url'=>array('widget/Yii_renderFile'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'Test TConsole', 'url'=>array('widget/Tconsole'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'Test Sendmail', 'url'=>array('site/gmail'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'Code Tester', 'url'=>array('tool/codeTest'), 'linkOptions'=>array(),),	
		)),
		
		//#Script on Yii--------------------
		array('label'=>'Script Handler', 'url'=>array('#'),'items'=>array(	
			array('label'=>'Script add yii', 'url'=>array('scriptHandler/index')),
		)),
		
		//#MENU MODULE --------------------
		array('label'=>'MODULE', 'url'=>array('site/modules', 'view'=>'modules' ),'items'=>array(	
			array('label'=>'GII', 'url'=>array('gii/'), 'linkOptions'=>array('target'=>'_blank'),),		
			array('label'=>'Test unit & Generator', 'url'=>array('test_unit/'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'yii - Bootstrap', 'url'=>array('Bootstrap/'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'yii - Booster', 'url'=>array('YiiBooster/'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'yii - Foundation', 'url'=>array('Foundation/'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'Menu Builder', 'url'=>array('menubuilder/'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'User Groups', 'url'=>array('userGroups/'), 'linkOptions'=>array('target'=>'_blank'),),	
			array('label'=>'Yii-Message', 'url'=>array('userGroups/'), 'linkOptions'=>array('target'=>'_blank'),),	
		)),
		array('label'=>'Comp Inti', 'url'=>array('#'), 'items'=>array(	
			array('label'=>'Authorization & RBAC', 'url'=>array('site/auth_rbac', 'view'=>'index' )),
			array('label'=>'SECURITY', 'url'=>array('site/security', )),
			array('label'=>'CACHE', 'url'=>array('cache/index', 'view'=>'index')),
			array('label'=>'WEB SERVICES', 'url'=>array('web_services/index')),
		),
			'active'=>($this->route)=='site/security' || ($this->route)=='cache/index' || ($this->route)=='web_services/index'
		),
		
		//#MENU EXTENSION/WIDGET ----------------------
		array('label'=>'WIDGET/EXT', 'url'=>array('widget/index'),'items'=>array(
			array('label'=>'YI Widgetst', 'url'=>array('#'),'items'=>array(	
				array('label'=>'CFlex (adobe flex)', 'url'=>array('widget/cflex', 'view'=>'cflex')),
				array('label'=>'CClipWidget', 'url'=>array('widget/CClipWidget', 'view'=>'CClipWidget')),
				array('label'=>'CTabView', 'url'=>array('widget/CTabView', 'view'=>'CTabView')),
				array('label'=>'CgridView', 'url'=>array('#'),'items'=>array(	
					array('label'=>'Cgrid Extensions', 'url'=>array('#'),'items'=>array(	
						array('label'=>'groupgridview', 'url'=>array('widget/groupgridview')),	
						array('label'=>'jtogglecolumn', 'url'=>array('widget/jtogglecolumn')),	
						array('label'=>'EDataTables', 'url'=>array('widget/EDataTables')),  
					)),
					array('label'=>'CGridView', 'url'=>array('Widget_CgridView/index')),
					array('label'=>'CGridView standar(admin)', 'url'=>array('userMysql/admin')),
					array('label'=>'CGridView Customs', 'url'=>array('Widget_CgridView/GridJoin')),
					array('label'=>'Grid with Resize', 'url'=>array('Widget_CgridView/gridResize')),
					array('label'=>'Grid Custom Style', 'url'=>array('Widget_CgridView/grid_dynamic_style')), 
				)),
				array('label'=>'CListView', 'url'=>array('#'),'items'=>array(	
					array('label'=>'CListView(standart)', 'url'=>array('userMysql/index')),
					array('label'=>'CListView Dynamic View', 'url'=>array('Widget_ClistView/dynamic_view')),
				)),
			)),
			# HTTP REQUEST ---------------------------------------
			array('label'=>'Http Reuest', 'url'=>array('#'),'items'=>array(	
				array('label'=>'yii-curl', 'url'=>array('widget/yii_curl', 'view'=>'yii_curl')),	
				array('label'=>'EHttpClient', 'url'=>array('widget/EHttpClient', 'view'=>'EHttpClient')),	
			)),
			#  PRINT, DOWNLOAD, CONVERT ( xls, pdf, etc )
			array('label'=>'Test Media', 'url'=>array('#'),'items'=>array(	
				array('label'=>'Excel/pdf', 'url'=>array('media/index')),	
			)),
			
			//#MENU JQERY PLUGIN --------------------
			array('label'=>'JQUERY COLLECTt', 'url'=>array('#'),'items'=>array(	
				array('label'=>'FancyBox', 'url'=>array('/widget/fancy', 'view'=>'fancy')),
				array('label'=>'Jquey Tooltip', 'url'=>array('widget/tooltip',  'view'=>'index'),'items'=>array(	
					array('label'=>'Tooltip-JS Function', 'url'=>array('widget/tooltip_js', 'view'=>'tooltip_js')),
					array('label'=>'Tooltip-Jquery(default)', 'url'=>array('widget/tooltip_jquery', 'view'=>'tooltip_jquery')),
					array('label'=>'Tooltip(Jquery-Jorn Zafferer)', 'url'=>array('widget/tooltip_jhon', 'view'=>'tooltip_jhon')),
					array('label'=>'tTooltip', 'url'=>array('widget/ttooltip', 'view'=>'ttooltip')),
				)),
				array('label'=>'Jquey PrettyDate(time Status)', 'url'=>'http://localhost/js/demo/DATE/jquery.prettydate/demo/'),
			)),
			
			array('label'=>'FILES UPLOAD & READ', 'url'=>array('#'),'items'=>array(	
				array('label'=>'CMultiFileUpload', 'url'=>array('widget/CMultiFileUpload', 'view'=>'CMultiFileUpload')),
				array('label'=>'EajaxUpload', 'url'=>array('widget/EajaxUpload', 'view'=>'EajaxUpload'), 'linkOptions'=>array('target'=>'_blank'), ),
				array('label'=>'yii-image-attach', 'url'=>array('widget/yii-image-attach', 'view'=>'yii-image-attach')),
				
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
				array('label'=>'Ex-JS tree sample', 'url'=>'http://localhost/js/EXTJS/EXTJS_TEST/examples/videos/tree.html'), 
			)),
			
			array('label'=>'Bootstrap', 'url'=>array('#'),'items'=>array(	
				array('label'=>'Form Bootstrap', 'url'=>array('#'), 'items'=>array(
						array('label'=>'TbNavbar', 'url'=>array('/widget_bootstrap/TbNavbar')),
						array('label'=>'TbActiveForm', 'url'=>array('/widget_bootstrap/TbActiveForm')), 
						array('label'=>'TbActiveForm Complete', 'url'=>array('/widget_bootstrap/TbActiveForm2')),  
						array('label'=>'TbEditableField', 'url'=>array('/widget_bootstrap/TbEditableField')),
					)),
				array('label'=>'TbGridView', 'url'=>array('Widget_Bootstrap/TbGridView')),
			)),
			//-----CJUI
			array('label'=>'CJUI on Yii', 'url'=>array('#'),'items'=>array(	
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
			
			array('label'=>'BROWSER', 'url'=>array('#'),'items'=>array(	
				array('label'=>'browser 0.1', 'url'=>array('widget/browser', 'view'=>'browser')), 
			)),
			//------- GALERRY
			array('label'=>' GALERRY', 'url'=>array('#'),'items'=>array(	
				array('label'=>'jSupersized', 'url'=>array('widget/jSupersized', 'view'=>'jSupersized')), 
				array('label'=>'Magnific-Popup', 'url'=>array('widget/Magnific-Popup', 'view'=>'Magnific-Popup')), 
				array('label'=>'Yiippod', 'url'=>array('widget/Yiippod', 'view'=>'Yiippod')),
			)),
			//----- MESSAGE
			array('label'=>'MESSAGE', 'url'=>array('#'),'items'=>array(	
				array('label'=>'ToastMessage', 'url'=>array('widget/ToastMsg', 'view'=>'ToastMsg')),
				array('label'=>'HzlToastr', 'url'=>array('widget/HzlToastr', 'view'=>'HzlToastr')),
			)),
			//---- WYSIWYG Editor
			array('label'=>'WYSIWYG Editor', 'url'=>array('#'),'items'=>array(	
				array('label'=>'kindeditor', 'url'=>array('widget/kindeditor')),
				array('label'=>'Jqueryte', 'url'=>array('widget/Jqueryte', 'view'=>'Jqueryte')),
			)),
			
			# --- FORM
			array('label'=>'FORM', 'url'=>array('#'),'items'=>array(	
				array('label'=>'clonnableFields1.0', 'url'=>array('widget/clonnableFields', 'view'=>'clonnableFields')),
				array('label'=>'TbTypeAhead', 'url'=>array('widget/TbTypeAhead', 'view'=>'TbTypeAhead')),
				array('label'=>'TagHandler', 'url'=>array('widget/TagHandler', 'view'=>'TagHandler')),
				
			)),
			
			//----rss
			array('label'=>'RSS', 'url'=>array('widget/rss', 'view'=>'index')),
			
			//---
			array('label'=>'SrcCollect + syntaxhighlighter', 'url'=>array('widget/ScrCollect', 'view'=>'ScrCollect')),

			//----
			array('label'=>'Xportlet', 'url'=>array('widget/Xportlet'),  'linkOptions'=>array('target'=>'_blank'),),
			
			//----media
			array('label'=>'EPhpThumb', 'url'=>array('widget/EPhpThumb')),
			//----JSON
			array('label'=>'Json Behavior', 'url'=>array('widget/ejsonbehavior')),  
			//----DATE
			array('label'=>'eHtmlDateSelect', 'url'=>array('widget/eHtmlDateSelect')),
			array('label'=>'StickyPage', 'url'=>array('widget/StickyPage', 'view'=>'StickyPage')),
			array('label'=>'jpopup1.2', 'url'=>array('widget/jpopup', 'view'=>'jpopup')),
			array('label'=>'fontSizer', 'url'=>array('widget/fontSizer', 'view'=>'fontSizer')),
			
		)),
		
		# YII DEMO
		array('label'=>'YII-DEMO', 'url'=>array('#'), 'items'=>array(	
			array('label'=>'YII-EASYUI', 'url'=>'http://127.0.0.1/htdocs/yiiProject/DEMOS/yii-easyui-website-master', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'YII-PlayGround', 'url'=>'http://127.0.0.1/htdocs/yiiProject/DEMOS/Yii-Playground', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'YII-PlayGround', 'url'=>'http://127.0.0.1/htdocs/yiiProject/DEMOS/yii_playground2', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'YII-mtreeview', 'url'=>'http://127.0.0.1/htdocs/yiiProject/DEMOS/mtreeview', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'YII-DHTMLX', 'url'=>'http://127.0.0.1/htdocs/yiiProject/DEMOS/DHTMLX', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'YII-BackboneBoilerplate(BACK)', 'url'=>'http://127.0.0.1/htdocs/yiiProject/DEMOS/YiiBackboneBoilerplate-master/backend/www', 'linkOptions'=>array('target'=>'_blank', 'style'=>'width:220px')),
			array('label'=>'YII-BackboneBoilerplate(FRONT)', 'url'=>'http://127.0.0.1/htdocs/yiiProject/DEMOS/YiiBackboneBoilerplate-master/frontend/www/', 'linkOptions'=>array('target'=>'_blank', 'style'=>'width:220px')),
			array('label'=>'YII-Asset', 'url'=>'http://127.0.0.1/htdocs/yiiProject/Asset', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'YII - Drumaddict-ember', 'url'=>'http://localhost/htdocs/yiiproject/DEMOS/drumaddict-ember//', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'Angular - YII', 'url'=>'http://localhost/htdocs/yiiproject/DEMOS/angular-yii/', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'YII-Theme', 'url'=>'http://127.0.0.1/htdocs/yiiProject/yii-theme', 'linkOptions'=>array('target'=>'_blank')),
			array('label'=>'YII-', 'url'=>'http://127.0.0.1/htdocs/yiiProject/DEMOS/', 'linkOptions'=>array('target'=>'_blank')),
			
		),  'linkOptions'=>array('style'=>'')),
		
		array('label'=>'Jquery', 'url'=>array('site/jqueryTest', 'view'=>'jqueryTest')),
		
		//jika belum login  maka user adalah 'guest'
		array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest), 
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)),
		)); ?>
	</div>
	
<!--	ITEM-CONFIG
label: string, optional, specifies the menu item label. When encodeLabel is true, the label will be HTML-encoded. If the label is not specified, it defaults to an empty string.
url: string or array, optional, specifies the URL of the menu item. It is passed to CHtml::normalizeUrl to generate a valid URL. If this is not set, the menu item will be rendered as a span text.
visible: boolean, optional, whether this menu item is visible. Defaults to true. This can be used to control the visibility of menu items based on user permissions.
items: array, optional, specifies the sub-menu items. Its format is the same as the parent items.
active: boolean, optional, whether this menu item is in active state (currently selected). If a menu item is active and activeClass is not empty, its CSS class will be appended with activeClass. If this option is not set, the menu item will be set active automatically when the current request is triggered by url. Note that the GET parameters not specified in the 'url' option will be ignored.
template: string, optional, the template used to render this menu item. When this option is set, it will override the global setting itemTemplate. Please see itemTemplate for more details. This option has been available since version 1.1.1.
linkOptions: array, optional, additional HTML attributes to be rendered for the link or span tag of the menu item.
itemOptions: array, optional, additional HTML attributes to be rendered for the container tag of the menu item.
submenuOptions: array, optional, additional HTML attributes to be rendered for the container of the submenu if this menu item has one. When this option is set, the submenuHtmlOptions property will be ignored for this particular submenu. This option has been available since version 1.1.6.
-->

	<!--------- template from EXT--JS
	D:\WEB\htdocs\TESTING\EXTJS\EXTJS_TEST\examples\app\feed-viewer

	FORM SAMPLE :http://localhost/js/EXTJS/EXTJS_TEST/examples/videos/form.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/videos/formBuilder.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/videos/layout.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/videos/panel.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/videos/toolbar.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/videos/window.html
	
	http://localhost/js/EXTJS/EXTJS_TEST/examples/writer/writer.html
	
	#DATA VIEW(IMAGES)
	http://localhost/js/EXTJS/EXTJS_TEST/examples/viEW/data-view.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/viEW/animated-dataview.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/viEW/chooser/chooser.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/viEW/multisort/multisort.html
	
	#WINDOW
	http://localhost/js/EXTJS/EXTJS_TEST/examples/window/layout.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/window/window.html
	http://localhost/js/EXTJS/EXTJS_TEST/examples/window/gmap.html
	
	
	
	
	-->