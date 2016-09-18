<style>.container{ width:1000px} </style>
<?php
$this->pageTitle=Yii::app()->name . ' - Main Menu';
$this->breadcrumbs=array('Main Menu Template',);

?>
<?php //Yii::app()->_identity; ?>
<ul>
<li> <a href="http://localhost/web/PHP/TESTING/DESIGN_INTERFACE/MENU_DESIGN/main_side_menu.html" target="_blank">Cool main n side menu</a></li>

<li><b class="txtHead">Main Menu with (CMenu-bawaan YII)</b></li>
    <!----------------------------------------------- STANDART MAIN MENU ----------------------------------------------------------->
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Data User', 'url'=>array('/userMysql')),
				//test add for cek variable
				array('label'=>'Check instance', 'url'=>array('/cek/index')),
				//*test select DB
				array('label'=>'Test DB', 'url'=>array('/TestDb/index')),
				//*testing form
				array('label'=>'Test Form', 'url'=>array('/testForm/index')),
				
				//jika belum login  maka user adalah 'guest'
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest), 
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
	<div class="clear"></div>
	<p>
    
    <!----------------------------------------------- STANDART MAIN MENU ----------------------------------------------------------->
  <?php $this->renderPartial('MENU/_abound_menu'); ?>
  
    <!-------------------------------- MENU WITH (ext.widgets.ddmenu.XDropDownMenu) ----------------------------------------->
    <li><b class="txtHead">Main Menu Template with( XDropDownMenu )</b></li>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
    <?php
    $this->widget('ext-coll.menu.ddmenu.XDropDownMenu', array(
    'items'=>array(
		array('label'=>'Home','url'=>array('site/index'),'items'=>array(								   
			array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),

			array('label'=>'Contact', 'url'=>array('/site/contact')),
			array('label'=>'Data User', 'url'=>array('/userMysql/index'),'items'=>array(
				array('label'=>'Create user', 'url'=>array('userMysql/create')),
				array('label'=>'Manage user', 'url'=>array('userMysql/admin')),
		 	)),
		)),
		array('label'=>'My interface template','url'=>array('#'),'items'=>array(	
			array('label'=>'My Menu','url'=>array('#'),'items'=>array(																			
				array('label'=>'Main menu', 'url'=>array('/mytemplate/mainMenu')),
				array('label'=>'Side menu', 'url'=>array('/myTemplate/sideMenu')),
			)),
		)),
		array('label'=>'Check instance', 'url'=>array('/cek/index')),
		
        //array('label'=>'Test Form','url'=>'#','items'=>array(		//**# jika tidak nge-LINK**/
		array('label'=>'Test Form','url'=>array('testForm/index'),'items'=>array(
            //array('label'=>'Detail view', 'url'=>array('/person/view', 'id'=>3)),
            //array('label'=>'Tree view', 'url'=>array('/site/widget', 'view'=>'treeview')),
			array('label'=>'Input Link', 'url'=>array('testForm/inputLink')),	//sintax: 'url'=>array($router,$params)
			array('label'=>'Input TextField', 'url'=>array('testForm/inputTxt')), //$router bisa berupa "page" atau "class action"
			array('label'=>'Input Tabular', 'url'=>array('testForm/inputBatch')),	//array('/site/page', 'view'=>'about')),
			array('label'=>'Form with CActiveForm', 'url'=>array('testForm/formWid')),
			array('label'=>'List Data', 'url'=>array('testForm/listData')),
        )),
		array('label'=>'Data Process','url'=>array('#'),'items'=>array(								   
			array('label'=>'Ajax', 'url'=>array('/ajax/index', 'view'=>'index')),
			//array('label'=>'Contact', 'url'=>array('/site/contact')),
			//array('label'=>'Data User', 'url'=>array('/userMysql/index'),'items'=>array(
			//array('label'=>'Create user', 'url'=>array('userMysql/create')),
			//array('label'=>'Manage user', 'url'=>array('userMysql/admin')),
		 )),		
		array('label'=>'Test DB','url'=>array('/testDb/testDb'),'items'=>array(	
				array('label'=>'Test Query', 'url'=>array('TestDb/testQuery')),				
				array('label'=>'Test Multiple DB', 'url'=>array('TestDb/multipleDB')),	
		)),
		array('label'=>'Test Media', 'url'=>array('#'),'items'=>array(	
			array('label'=>'Excel/pdf', 'url'=>array('media/index')),	
		)),
		//#MENU MODULE
		array('label'=>'Test MODULE', 'url'=>array('#'),'items'=>array(	
			array('label'=>'GII', 'url'=>array('gii/')),	
			array('label'=>'test', 'url'=>array('test/')),	
			array('label'=>'yii - Bootstrap', 'url'=>array('Bootstrap/')),
		)),
		//jika belum login  maka user adalah 'guest'
		array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest), 
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)),
));
	?>
		<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
	<div class="clear"></div>
	<p>
  
		
<!-------------------------------- MENU WITH "mbMenu" ----------------------------------------->
<li><b class="txtHead">Main Menu with (MbMenu)</b></li>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<div id="mb_mainmenu">
		<?php $this->widget('ext-coll.menu.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Data Warehouse', 'url'=>array('/products/index_adv'), 'items'=>array(
					array('label'=>'Data User', 'url'=>array('/userMysql/index'),'items'=>array(
						array('label'=>'Create user', 'url'=>array('userMysql/create')),
						array('label'=>'Manage user', 'url'=>array('userMysql/admin')),
					)),
					array('label'=>'Suppliers', 'url'=>array('/suppliers/index')),
					array('label'=>'Products', 'url'=>array('/Products/index')),
					array('label'=>'Customers', 'url'=>array('/Customers/index')),
					array('label'=>'Expediters', 'url'=>array('/Expediters/index')),
				)),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
		<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
	<div class="clear"></div>
	<p><!-- mb_mainmenu -->
  
  <!-------------------------------- MENU WITH (ext.widgets.ddmenu.XDropDownMenu) ----------------------------------------->
<li><b class="txtHead">Main Menu with ( TileSlideMenu )</b></li>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php  
  $this->widget('ext-coll.menu.TileSlideMenu.TileSlideMenu', array(
    'menuTitle'=>'Yii Framework',
    'items'=>array(
        array(
            'text' => 'Main Site',
            'url'=>'http://www.yiiframework.com/',
            'urlTarget'=>'_blank'
        ),
        array(
            'text' => 'Demos',
            'url'=>'http://www.yiiframework.com/demos/'
        ),
        array(
            'text' => 'Guide',
            'url'=>'http://www.yiiframework.com/doc/guide/'
        ),
        array(
            'text' => 'Class Reference',
            'url'=>'http://www.yiiframework.com/doc/api/'
        ),
        array(
            'text' => 'Wiki',
            'url'=>'http://www.yiiframework.com/wiki/'
        ),
        array(
            'text' => 'Extensions',
            'url'=>'http://www.yiiframework.com/extensions/'
        ),
        array(
            'text' => 'Forum',
            'url'=>'http://www.yiiframework.com/forum/'
        ),
        array(
            'text' => 'Live Chat',
            'url'=>'http://www.yiiframework.com/chat/'
        ),
    )
));
?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
	<div class="clear"></div>

<!--------------------------------------------------  AMENU ------------------------------------------------------>
<li><b class="txtHead">Link menu amenu</b></li>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php $this->widget('ext-coll.menu.amenu.XActionMenu', array(
	'htmlOptions'=>array('class'=>'actionBar'),
	'items'=>array(
		array('label'=>'Create UserSqlite', 'url'=>array('create')),
		array('label'=>'Manage UserSqlite', 'url'=>array('admin')),
	),
)); ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
<div class="clear"></div>

<!------------------------------------------------- EFG MENU ------------------------------------------------------>
<li><b class="txtHead">EFGMenu</b></li>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('ext-coll.menu.efgmenu.EFgMenu', array(
    'items' => array(
        array('label' => 'Home', 'url' => array('/site/index'), 'active' => true, 'icon-class'=>'fa-home'),
        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
        array('label' => 'Contact', 'url' => array('/site/contact')),
        array('label'=>'Level 2 Menu', 'url'=>'#', 'items' => array(
            array('label' => 'Sub-Menu 1', 'url' => '#', 'icon-class'=>'fa-home'),
            array('label' => 'Level 3 Menu', 'url' => '#', 'items' => array(
                array('label' => 'Sub-Menu 1', 'url' => '#', 'icon-class'=>'fa-home'),
                 array('label' => 'Sub-Menu 2', 'url' => '#'),
            )),
        )),
        array('label' => 'Login', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
    )
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
<div class="clear"></div>

<!------------------------------------------------- EFLAT MENU ------------------------------------------------------>
<li><b class="txtHead">EflatMenu</b></li>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('ext-coll.menu.eflatmenu.EFlatMenu', array(
    'items' => array(
        array('label' => 'Home', 'url' => array('/site/index'), 'active' => true, 'icon-class'=>'fa-home'),
        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
        array('label' => 'Contact', 'url' => array('/site/contact')),
        array('label'=>'Level 2 Menu', 'url'=>'#', 'items' => array(
            array('label' => 'Sub-Menu 1', 'url' => '#', 'icon-class'=>'fa-home'),
            array('label' => 'Level 3 Menu', 'url' => '#', 'items' => array(
                array('label' => 'Sub-Menu 1', 'url' => '#', 'icon-class'=>'fa-home'),
                 array('label' => 'Sub-Menu 2', 'url' => '#'),
            )),
        )),
        array('label' => 'Login', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
    )
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
<div class="clear"></div>

  <!---------------------------------------------------------------- SAMPLE HTML MENU -------------------------------------------------------------->
<li><b class="txtHead">Sample Main Menu with ( http://localhost/web/PHP/TESTING/DESIGN_INTERFACE/FORM_MENU/MENU1.HTM)</b></li>
<iframe src="http://localhost/web/PHP/TESTING/DESIGN_INTERFACE/FORM_MENU/MENU1.HTM" style="width:100%"></iframe>


  <!---------------------------------------------------------------- SAMPLE HTML MENU -------------------------------------------------------------->
<li><b class="txtHead">Sliding Menu Effect ( http://localhost/web/PHP/TESTING/DESIGN_INTERFACE/FORM_MENU/menueffect/ )</b></li>
<iframe src="http://localhost/web/PHP/TESTING/DESIGN_INTERFACE/FORM_MENU/menueffect/index.html" style="width:100%"></iframe>

  <!---------------------------------------------------------------- Side Flyout -------------------------------------------------------------->
<li> <a href="localhost/web/PHP/TESTING/DESIGN INTERFACE/FORM MENU/flyout/flyout/flyout.html">Side menu Flyout</a> </li>


 
