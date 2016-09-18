<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('ext.stickyPage.StickyPage', array(
    'height' => '300px',  // height of containter
    'width' => '300px',  // width of containter
    'data' => array(
        // **message**: message to be shown
        // **x**: x-coordinate
        // **y**: y-coordinate
        // **degree**: rotation angle
        // **footer**: bottom text like date
        // **height**: height of single stick-note
        // **width**: width of single stick-note
        array('message' => 'Happy New Year! ', 'x' => 130, 'y' => 100, 'degree' => '-3deg', 'footer' => '10/5/2014', 'height' => '400px'),
        array('message' => 'This is just another sample sticky tag. ', 'x' => 15, 'y' => 15, 'degree' => '-14deg', 'footer' => '1/6/2014', 'width' => '40px'),
        array('message' => ' I have created a jQuery plugin called<a target="_blank" href="https://github.com/soichih/jquery-stickypage">stickypage</a>
         for this page.  ', 'x' => 150, 'y' => 15, 'degree' => '-14deg', 'footer' => '1/6/2014', 'width' => '40px'),
        array('message' => 'Somewhere beneath all these sticky tags, there is a buried treasure (not really!)  ', 'x' => 15, 'y' => 15, 'degree' => '-14deg', 'footer' => '1/6/2014', 'width' => '40px'),
        array('message' => 'Getting ready for Christmas.  ', 'x' => 70, 'y' => 150, 'degree' => '-14deg'),
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>