<?php

namespace Command;

class Dummy
{
    /**
     * init
     * 
     * @param string $message
     * @return void
     */
    public function __construct($message = "test a string argument:\n")
    {
        global $argc, $argv;
        echo $message;
        parse_str(implode('&', array_slice($argv, 1)), $_GET);
        echo $this->dummyMethodOne($_GET['string']) . "\n";
        echo $this->dummyMethodTwo($_GET['string']);
    }

    /**
     * just a dummy method
     * 
     * @return string
     */
    private function dummyMethodOne($dummy)
    {
        return strtoupper($dummy);
    }

    /**
     * just a dummy method
     * 
     * @return string
     */
    private function dummyMethodTwo($dummy)
    {
        return strtolower($dummy);
    }
}
