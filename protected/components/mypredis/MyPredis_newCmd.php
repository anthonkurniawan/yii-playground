<?php
// Define a new command by extending Predis\Command\Command:
class MyPredis_newCmd extends Predis\Command\Command
{
    public function getId()
    {
        return 'NEWCMD';
    }
	
	// public function test(){
		// return "test new command";
	// }
}

?>