<?php
$this->menu=array(
	array('label'=>'Tree data array', 'url'=>array('TreeArray/treeArray'), 'linkOptions'=>array('target'=>'_blank')), 
	array('label'=>'Tree data DB', 'url'=>array('TreeDB/tree_db'), 'linkOptions'=>array('target'=>'_blank')), 
	array('label'=>'CFileBrowser', 'url'=>array('widget/tree' , 'view'=>'cfilebrowser'), 'linkOptions'=>array('target'=>'_blank')), 
	array('label'=>'Ex-JS tree sample', 'url'=>'http://127.0.0.1/js/EXTJS/EXTJS_TEST/examples/videos/tree.html', 'linkOptions'=>array('target'=>'_blank')), 
    array('label'=>'jstree-behavior (NOT IMPLEMENTED)'), 
	array('label'=>'-- with widget menu --'),
	array('label'=>'Tree Menu', 'url'=>array('widget/treeMenu'), 'linkOptions'=>array('target'=>'_blank')), //pake action terpisah
	array('label'=>'Tree Menu2', 'url'=>array('treeMenu/treeMenu'), 'linkOptions'=>array('target'=>'_blank')), 
	array('label'=>'-- sample other site --'),
	array('label'=>'Contoh di local-testing', 'url'=>'http://localhost/testing/dir_filetree/jqueryfiletree/FileTree.php', 'linkOptions'=>array('target'=>'_blank'),),
);
?>