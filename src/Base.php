<?php

namespace Console;

use Console\Definition\Console;

class Base extends Console
{
    /**
     * welcoming message
     * 
     * @var string
     */
    private $message;

    /**
     * adding a single line break
     * 
     * @var bool
     */
    private $line_break;

    /**
     * console arguments
     * 
     * @var array
     */
    protected $arguments;

    /**
     * init
     * 
     * @param string $message
     * @param bool   $line_break
     * @return void
     */
    public function __construct($message = '', $line_break = false)
    {
        $this->message    = $message;
        $this->line_break = $line_break;
        $this->setUp();
    }

    /**
     * setup the CLI
     * 
     * @return void
     */
    private function setUp()
    {
        global $argc, $argv;
        $this->outputToConsole($this->message, $this->line_break);
        parse_str(implode('&', array_slice($argv, 1)), $_GET);
        $this->arguments = $_GET;
    }

    /**
     * output to stdout
     * 
     * @param string $message
     * @param bool   $line_break
     * @return string
     */
    protected function outputToConsole($message, $line_break = true)
    {
        echo $message . ($line_break ? "\n" : '');
    }

    /**
     * handle the argument/s
     * 
     * @return void
     */
    public function handle()
    {
        //
    }
}
