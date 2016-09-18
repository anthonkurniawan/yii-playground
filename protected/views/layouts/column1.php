<!--<br />CEK VAR FROM COLUMN 1: <?php //dump($_GET); ?> <!--- PRINT OBJECT ---------->

<?php /*-------------- TEST GET LAYOUT -------------------------*/
	// if($_GET['layout']) { $this->beginContent('//layouts/'.$_GET['layout']); }
	// else { $this->beginContent('//layouts/main'); }  //default
?>
<?php $this->beginContent('//layouts/main'); ?>
<?php //$this->beginContent('//layouts/Xportlet/mainXportlet'); ?>
<div class="container">
	<div id="content">
		<?php echo $content; ?> 
	</div><!-- content -->
    
    <!---------------------------------------------- ADD -------------------------------------------------------->
<!---<div class="span-5 last">
    <div id="sidebar">
      <?php //if(Yii::app()->user->id):?>
      <span class="admin-message">Hello,&nbsp; <span><?php //echo yii::app()->user->name;?>&nbsp;</span></span>
      <?php //echo Yii::app()->user->lastLoginTime;?>
    <?php //endif;?>
    <?php/*
      $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'Operations',
      ));
      $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
      ));
      $this->endWidget();			
    ?>

    <?php/*
      if(Yii::app()->getModule('user')->isAdmin()):
        $this->beginWidget('zii.widgets.CPortlet',array(
        'title' => 'Admin Operations',
        ));
        $this->widget('zii.widgets.CMenu', array(
        'items'=>array(
          array("label"=> "Create User", "url"=>array('/user/admin/create')),
          array("label"=> "List User", "url"=> array('/user')),
          array("label"=>"Manage Profile","url"=>array('/user/profile')),
          array("label"=>"Manage Profile Fields","url"=>array('/user/profileField/admin')),
        ),
        'htmlOptions'=>array('class'=>'operations'),
      ));
      $this->endWidget(); 
      ?>
      endif;															*/
    ?>
    </div>
  </div>-->
<!----------------------------------------------- END ------------------------------------------------------->
</div>
<?php $this->endContent(); ?>

