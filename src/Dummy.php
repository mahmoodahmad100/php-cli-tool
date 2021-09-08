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
        echo "test a string argument:\n";
        parse_str(implode('&', array_slice($argv, 1)), $_GET);
        echo $_GET['string'];
    }

    /**
     * just a dummy method
     * 
     * @return void
     */
    public function dummyMethod()
    {

    }
}
