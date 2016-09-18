
<div class="view2">
	<a href="http://localhost/yiidoc/CTreeView.html" target="_blank" style="float:right">CTreeView Docs</a><br><br>
	
	@var array the data that can be used to generate the tree view content.
	Each array element corresponds to a tree view node with the following structure:
	  <ul>
	  <li>text: string, required, the HTML text associated with this node.</li>
	  <li>expanded: boolean, optional, whether the tree view node is expanded.</li>
	  <li>id: string, optional, the ID identifying the node. This is used in dynamic loading of tree view (see {@link url}).</li>
	  <li>hasChildren: boolean, optional, defaults to false, whether clicking on this node should trigger dynamic loading of more tree view nodes from server.<br>
	    The {@link url} property must be set in order to make this effective.</li>
	  <li>children: array, optional, child nodes of this node.</li>
	  <li>htmlOptions: array, additional HTML attributes (see {@link CHtml::tag}).</li>
	  </ul>

	  <div class="ket">
	  <b>Note:</b> 
	  <ul><li>anything enclosed between the beginWidget and endWidget calls will also be treated as tree view content, 
	  which appends to the content generated from this data.</li>
	  <li>default dari widget "CTreeView" no include : <code>jquery.treeview.sortable.js</code> </li> </ul>
	  </div>
	  
 <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 	  
$this->widget('CTreeView',array(
	'id '=> ,//Returns the ID of the widget or generates a new one if requested.
	'data'=>$data,
	'url'=> , //the URL to which the treeview can be dynamically loaded (in AJAX).
	'animated'=>'slow',	//("slow", "normal", or "fast") or the number of milliseconds(e.g. 1000). If not set, no animation is used.
	'collapsed'=>true,	//Defaults to false.
	'toggle'=>, //Callback when toggling a branch. Arguments: "this" refers to the UL that was shown or hidden
		
	'cssFile'=> , //
	'control'=>, //valid jQuery selector 
						(e.g. '#treecontrol' where 'treecontrol' is the ID of the 'div' element containing the hyperlinks.)
	'unique'=>, //set to allow only one branch on one level to be open (closing siblings which opening). Defaults to false.
	'htmlOptions'=>array('class'=>'treeview-gray'),
	'options'=> , //array - additional options that can be passed to the constructor of the treeview js object.
					* @var array additional HTML attributes that will be rendered in the UL tag.
					* The default tree view CSS has defined the following CSS classes which can be enabled
					* by specifying the 'class' option here:
						* <ul>
						* <li>treeview-black</li>
						* <li>treeview-gray</li>
						* <li>treeview-red</li>
						* <li>treeview-famfamfam</li>
						* <li>filetree</li>
						* </ul>
	)); 
<?php $this->endWidget(); ?> 


</div>