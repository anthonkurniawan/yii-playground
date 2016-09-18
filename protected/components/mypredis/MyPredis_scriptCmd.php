<?php
// Define a new scriptable command by extending Predis\Command\ScriptCommand:
// class ListPushRandomValue extends Predis\Command\ScriptCommand
class MyPredis_scriptCmd extends Predis\Command\ScriptCommand
{
    public function getKeysCount()
    {
        return 1;
    }

    public function getScript()
    {
        return <<<LUA
math.randomseed(ARGV[1])
local rnd = tostring(math.random())
redis.call('lpush', KEYS[1], rnd)
return rnd
LUA;
    }
}

?>