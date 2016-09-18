<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - kindEditor'; 
$this->breadcrumbs=array('widget/kindeditor',);
$this->renderPartial('WYSIWYG/_menu');
?>

<p><b class="badge badge-inverse">KindEditor (GA BISA)</b></p>
<p>
[KindEditor](http://www.kindsoft.net/) is an open-source HTML editor, developers can replace the traditional multi-line text input box (textarea) 
with the visualization of richtext entry box through KindEditor.
</p>
<a href="http://www.yiiframework.com/extension/yii-kindeditor/" target="_blank">SUMBER</a><br>

<?php 
$this->widget('ext-coll.WYSIWYG_EDITOR.kindeditor.KindEditorWidget',array(
    'id'=>'Post_content',   //Textarea id
    // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
	'language'=>'en', // example: spanish
    'items' => array(
        'width'=>'700px',
        'height'=>'300px',
        'themeType'=>'simple',
        'allowImageUpload'=>true,
        'allowFileManager'=>true,
        'items'=>array(
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
            'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
            'justifyright', 'insertorderedlist','insertunorderedlist', '|',
            'emoticons', 'image', 'link',
			'language'=>'en',),
    ),
)); 
?>

<div class="flash-error">
<pre>
Created By <jinmmd@gmail.com> Based on Joe Chu's [KindEditor](http://www.yiiframework.com/extension/kindeditor)

 * [KindEditor Documentation](http://www.kindsoft.net/doc.php)
 * [KindEditor Demo](http://www.kindsoft.net/demo.php)
</pre>
</div>