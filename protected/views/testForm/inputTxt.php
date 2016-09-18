
<div class="view2">
	<b class="badge"> Sample Input TextField</b>

<b>CHtml::textField() method </b><br />
<code>textField($name,$value='',$htmlOptions=array())</code><br />

1.with name( CHtml::textField('Text') ) :<?php echo CHtml::textField('Text'); ?><br />
2.with name and value( CHtml::textField('Text', 'some value') ):<?php echo CHtml::textField('Text', 'some value'); ?><br />
3.with customized id, width and maxlength 
( CHtml::textField('Text', 'some value', array('id'=>'idTextField', 'width'=>100,'maxlength'=>100) )
 <?php echo CHtml::textField('Text', 'some value',array('id'=>'idTextField', 'width'=>100, 'maxlength'=>100)); ?> <br />
<i>*Note: use 'cols' instead of 'width' when working with textarea</i><br />
4.disabled textfield ( CHtml::textField('Text', 'some value', array('disabled'=>'disabled') )
<?php echo CHtml::textField('Text', 'some value', array('disabled'=>'disabled')); ?><br />


</div>