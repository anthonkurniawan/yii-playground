<!--EDIT INI UNTUK CONTENT YANG AKAN DI LOAD PADA (protected\views\layouts\main.php)-->

<?php $this->pageTitle=Yii::app()->name; ?>

<?php
$this->widget('ext.calendar.Calendar',array(
        'day' => 29, // tanggal yang diinginkan, bisa load dari database artikel
        'month' => 'feb', // bulan yang diinginkan, bisa load dari database artikel
    ));
?>

<pre>
<?php 
//print_r(Yii::app()->components); 
print_r(Yii::app()); 
?>
</pre>


<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
</ul>
