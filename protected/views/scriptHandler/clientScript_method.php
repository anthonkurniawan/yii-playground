<!-------------------------------------------------------------- HELPER ------------------------------------------------------------>
<div class="view2">
<b class="badge"> Other Method</b><br>

Yii::getPathOfAlias('gii.assets') : <?php dump( Yii::getPathOfAlias('gii.assets') ); ?><br>
Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('gii.assets'))  :
<?php dump( Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('gii.assets')) ); ?><br>
Yii::app()->getAssetManager()->getPublishedUrl(Yii::getPathOfAlias('gii.assets')) :
<?php dump( Yii::app()->getAssetManager()->getPublishedUrl(Yii::getPathOfAlias('gii.assets')) ); ?><br>


Yii::getPathOfAlias('application.assets') :<?php dump( Yii::getPathOfAlias('application.assets') ); ?><br>

<?php //dump( Yii::app()->getAssetManager()->publish('application.assets' ) ); ?><br>
Yii::app()->getAssetManager()->getPublishedUrl('http://localhost/HTDOCS/yiiProject/yiiTest/' ) :
<?php dump( Yii::app()->getAssetManager()->getPublishedUrl('http://localhost/HTDOCS/yiiProject/yiiTest/' ) ); ?><br>

Yii::app()->clientScript->isScriptRegistered('fancy') : <?php dump(Yii::app()->clientScript->isScriptRegistered('fancy')); ?><br>
	
Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/' : <?php dump(Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/' ); ?><br>

Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id,"jQuery('#{$id}').autocomplete($options);"); <br>
<br>

</div>

<div class="view2">
<b class="badge"> registerLinkTag()</b> <br>
Registers a link tag that will be inserted in the head section (right before the title element) of the resulting page. <br>
<code>registerLinkTag(string $relation=NULL, string $type=NULL, string $href=NULL, string $media=NULL, array $options=array ( ))</code>
</div>

<div class="view2">
<b class="badge"> registerMetaTag() </b> <br>
Registers a meta tag that will be inserted in the head section (right before the title element) of the resulting page.<br>
Note: Each call of this method will cause a rendering of new meta tag, even if their attributes are equal. <br>

<code>registerMetaTag(string $content, string $name=NULL, string $httpEquiv=NULL, array $options=array ( ), string $id=NULL)</code><br><br>
sample :<br>
<code>$cs->registerMetaTag('example', 'description', null, array('lang' => 'en'));<code><br>
<code>$cs->registerMetaTag('beispiel', 'description', null, array('lang' => 'de'));<code>
</div>

<div class="view2">
<b class="badge">setCoreScriptUrl() </b> Cleans all registered scripts.<br>
Sets the base URL of all core javascript files. This setter is provided in case when core javascript files are manually published to a pre-specified location.<br>
 This may save asset publishing time for large-scale applications.
</div>

<div class="view2">
<b class="badge">reset() </b> <code>setCoreScriptUrl(string $value)</code><br>
<code>reset()</code>
</div>

<div class="view2">
<b class="badge">unifyScripts() </b> Removes duplicated scripts from scriptFiles.<br>
<code>unifyScripts() </code>
</div>