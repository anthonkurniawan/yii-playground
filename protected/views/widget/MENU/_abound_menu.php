<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<style>
/*Nav bar*/
.navbar .brand {
  display:block;
  float:left;
  font-size:20px;
  font-weight:200;
  padding:10px 20px;
  margin-left:-15px;
}

.navbar .nav > li > a {
  float:none;
  padding:10px 15px;
  text-decoration:none;
}

.navbar-search .search-query {
  border-radius:5px;
}

/* end Portlets*/
.navbar {
  margin-bottom:0px;
  overflow:visible;
}

 /*Navbar*/
 .navbar-fixed-top {
  top:0;
  left:0;
}

.subnav.navbar-fixed-top {
  top:40px;
  z-index:1;
}

/*	------------ OVERIDE FROM BOOTSTRAP (GREY HOVER)
.dropdown-menu li > a:hover,
.dropdown-menu li > a:focus,
.dropdown-submenu:hover > a {
  color: #ffffff;
  text-decoration: none;
  background-color: #848282;
  background-color: #848282;
  background-image: -moz-linear-gradient(top, #848282, #9e9090);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#848282), to(#9e9090));
  background-image: -webkit-linear-gradient(top, #848282, #9e9090);
  background-image: -o-linear-gradient(top, #848282, #9e9090);
  background-image: linear-gradient(to bottom, #848282, #9e9090);
  background-repeat: repeat-x;
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#848282', endColorstr='#9e9090', GradientType=0);
}

.dropdown-menu .active > a,
.dropdown-menu .active > a:hover {
  color: #ffffff;
  text-decoration: none;
  background-color: #848282;
  background-color: #848282;
  background-image: linear-gradient(to bottom, #848282, #9e9090);
  background-image: -moz-linear-gradient(top, #848282, #9e9090);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#848282), to(#9e9090));
  background-image: -webkit-linear-gradient(top, #848282, #9e9090);
  background-image: -o-linear-gradient(top, #848282, #9e9090);
  background-repeat: repeat-x;
  outline: 0;
  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#848282', endColorstr='#9e9090', GradientType=0);
}
*/

/* Desktops and laptops ----------- */
@media only screen 
and (min-width : 1224px) {
	.container-fluid{padding-top: 100px;}
	.navbar .brand {margin-left:-90px;}
	.style-switcher{margin-left:-70px;}
}

/* Large screens ----------- */
@media only screen 
and (min-width : 1824px) {
	.container-fluid{padding-top: 100px;}
	.navbar .brand {margin-left:-90px;}
	.style-switcher{margin-left:-70px;}
}
</style>

<?php
  cs()->registerCssFile('http://localhost/yii/yii-theme/themes/abound/css/bootstrap.min.css');
  cs()->registerCssFile('http://localhost/yii/yii-theme/themes/abound/css/style-red.css');
  cs()->registerScriptFile('http://localhost/yii/yii-theme/themes/abound/js/bootstrap.min.js');
?>

<div class="navbar  navbar-inverse navbar-fixed-top99"> <!-- enable navbar-fixed-top utk always on top. disable navbar-inverse ( BLACK) -->
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">abound <small>admin theme v1.1</small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Dashboard', 'url'=>array('/site/index')),
                        array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs')),
                        array('label'=>'Forms', 'url'=>array('/site/page', 'view'=>'forms')),
                        array('label'=>'Tables', 'url'=>array('/site/page', 'view'=>'tables')),
						array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),
                        array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                        array('label'=>'My Account <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'My Messages <span class="badge badge-warning pull-right">26</span>', 'url'=>'#'),
							array('label'=>'My Tasks <span class="badge badge-important pull-right">112</span>', 'url'=>'#'),
							array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Separated link', 'url'=>'#'),
							array('label'=>'One more separated link', 'url'=>'#'),
                        )),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top99"> <!-- del subnav utk disable( untuk munculin "input search" /klo mau di pindah di atas-->
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left" >
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
				<input type="text" class="search-query span2" placeholder="Search">
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
	<div class="clear"></div>