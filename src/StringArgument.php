<?php

namespace Command;

class StringArgument extends Base
{
    /**
     * handle the argument
     * 
     * @return void
     */
    public function handle()
    {
        if (isset($this->arguments['string'])) {
            $argument = $this->arguments['string'];
            $this->outputToConsole($this->dummyMethodOne($argument));
            $this->outputToConsole($this->dummyMethodTwo($argument), false);
        } else {
            $this->outputToConsole('please enter a valid argument');
        }
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
