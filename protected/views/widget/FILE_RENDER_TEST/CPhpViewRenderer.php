Source/View File : CPhpViewRender.php <br><br>

$_REQUEST : <?php print_r($_REQUEST);?>

<h1>Sample Content File</h1>
data : <?php echo $viewData; ?> <br>
$this : <?php dump($this); ?> <br>

Yii::app()->getViewRenderer() <?php dump(Yii::app()->getViewRenderer()); ?> <br>
CFileHelper::getExtension($viewFile) <?php echo CFileHelper::getExtension('D:\WEB\HTDOCS\yiiProject\yiiTest\protected\views\widget\FILE_RENDER_TEST\CPhpViewRenderer.php') ?> <br>

<p>Compare :<a href="http://localhost/yiitest/widget/Yii_renderFile" target="_blank">Compare with YII renderFile()</a><p>
<p> <?php echo CHtml::link('Compare with YII renderFile()', array('widget/Yii_renderFile'), array('target'=>'_blank')); ?> </p>