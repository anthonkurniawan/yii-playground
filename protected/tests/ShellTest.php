<?php
#http://www.yiiframework.com/forum/index.php/topic/29569-unit-testing-shell-cconsolecommands/

class ShellTest extends CTestCase
{
        function testShellCommand()
        {
                $commandName='MyTest';
                $CCRunner=new CConsoleCommandRunner();
                
                $shell=new MyTestCommand($commandName,$CCRunner);
                $this->assertTrue($shell->run(array()));
        }
}