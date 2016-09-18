<?php
#http://www.yiiframework.com/forum/index.php/topic/29569-unit-testing-shell-cconsolecommands/
class TestCommand extends CConsoleCommand
{
        public function run($args)
        {			echo "testttttttttt";
                //actual command code here
                //return TRUE;    
        }
}

#We want to unit test it.
#1. edit the default test configuration file in protected/config/test.php
	//import the Shell Classes that we need to test (which extend CConsoleCommand).
	// 'import'=>array(
                // 'application.commands.shell.*',
        // ),
	#This way our unit test application, will be able to auto load/import our MyTestCommand class.
		
#2. create the unit test file protected/tests/unit/ShellTest.php
//It should run 1 test and 1 assertion successfully.
// Please note that this is a basic unit testing of a shell command just for starters.

?>