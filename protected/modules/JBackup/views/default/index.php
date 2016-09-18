<?php /** @var DefaultController $this */?>
<?php
Yii::app()->clientScript->registerScript(
   'HideAlert',
   '$(".alert-success, .alert-error").animate({opacity: 1.0}, 10000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>
<h1><?php echo JBackupTranslator::t('backup', 'Manage Backup')?></h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert-success" style="text-align: center; margin: 10px 0 10px 0; padding: 10px;">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php elseif(Yii::app()->user->hasFlash('error')):?>
    <div class="alert-error" style="text-align: center; margin: 10px 0 10px 0; padding: 10px;">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?php
    $cs = Yii::app()->clientscript;
    $afterAjax = '';
    if($this->module->bootstrap){
        $cs->registerScript('backup','
            $(function (){
                $(".bdownload").html("<i class=\'icon-arrow-down\'></i>");
                $(".brestore").html("<i class=\'icon-repeat\'></i>");
            });
        ',CClientScript::POS_HEAD);
        $afterAjax = '$(".bdownload").html("<i class=\'icon-arrow-down\'></i>"); $(".brestore").html("<i class=\'icon-repeat\'></i>");';
    }else{
        $cs->registerScript('backup','
            $(function (){
                $(".download").text("");
                $(".restore").html("");
            });
        ',CClientScript::POS_HEAD);
        $cs->registerCss('backup','
            .delete{
                margin: 1px;
                float:left;
            }
        ');
        $afterAjax = '$(".download").text(""); $(".restore").html("");';
    }
	$moduleId = $this->module->id;
    $this->widget($this->gridViewClass, array(
            'id' => 'backup-grid',
            'afterAjaxUpdate' => 'function(id, data){'.$afterAjax.'}',
            'dataProvider' => $dataProvider,
            'columns' => array(
                    array(
                        'name'=>'name',
                        'header'=>JBackupTranslator::t('backup', 'Name'),
                    ),
                    array(
                        'name'=>'size',
                        'header'=>JBackupTranslator::t('backup', 'Size'),
                    ),
                    array(
                        'name'=>'create_time',
                        'header'=>JBackupTranslator::t('backup', 'Create Time'),
                    ),
                    array(
                            'class' => $this->CButtonColumnClass,
                            'deleteButtonUrl' =>'Yii::app()->createUrl("/'.$moduleId.'/default/delete", array("file"=>$data["name"]))',
                            'template' => '{download} {restore} {delete}',
                            'htmlOptions'=>array('style'=>'width: 60px;'),
                            'buttons'=>array(
                                    'download' => array(
                                        'label'=>JBackupTranslator::t('backup', 'Download'),
                                        'options'=>array('class'=>$this->module->bootstrap ?'bdownload': 'download'),
                                        'url'=>'Yii::app()->createUrl("/'.$moduleId.'/default/download", array("file"=>$data["name"]))',
                                        'visible'=>'Yii::app()->getModule("'.$moduleId.'")->download'
                                    ),
                                    'restore' => array(
                                        'label'=>JBackupTranslator::t('backup', 'Restore'),
                                        'options'=>array('class'=>$this->module->bootstrap ?'brestore':'restore'),
                                        'url'=>'Yii::app()->createUrl("/'.$moduleId.'/default/restore", array("file"=>$data["name"]))',
                                        'visible'=>'Yii::app()->getModule("'.$moduleId.'")->restore'
                                    ),
                             ),		
                    ),
            ),
    )); 
?>

<div class="flash-error">
<b>JBackup Module</b> http://www.yiiframework.com/extension/backup/ <br>
You can download the module from bitbucket [Repository](https://bitbucket.org/juanda1015/jbackup/),

Add following code in config main.php under modules <code>'jbackup'</code>, You can specify custom path for backup files.

<?php Yii::app()->sc->setStart(__LINE__); ?> <!--
	'jbackup'=>array(
			'path' => __DIR__.'/../_backup/', //Directory where backups are saved
			'layout' => '//layouts/column2', //2-column layout to display the options
			'filter' => 'accessControl', //filter or filters to the controller
			'bootstrap' => false, //if you want the module use bootstrap components
			'download' => true, // if you want the option to download
			'restore' => true, // if you want the option to restore
			'database' => true, //whether to make backup of the database or not
			//directory to consider for backup, must be made array key => value array ($ alias => $ directory)
			'directoryBackup'=>array( 
				'folder/'=> __DIR__.'/../../folder/',
			),
			//directory sebe not take into account when the backup
			'excludeDirectoryBackup'=>array(
				__DIR__.'/../../folder/folder2/',
			),
			//files sebe not take into account when the backup
			'excludeFileBackup'=>array(
				__DIR__.'/../../folder/folder1/cfile.png',
			),
			//directory where the backup should be done default Yii::getPathOfAlias('webroot')
			'directoryRestoreBackup'=>__DIR__.'/../../' 
		),
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox();  ?>



<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn btn-sm btn-primary" style="float:right"><?php echo Yii::t('ui','show class module'); ?></div>
	<div class="scroll" style="width:100%"><?php dump($this->module); ?></div>
</div>
<div class="clear"></div>
</div>


