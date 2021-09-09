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
            $this->outputToConsole($this->uppercase($argument));
            $this->outputToConsole($this->alternate($argument));
            $this->outputToConsole($this->export($argument), false);
        } else {
            $this->outputToConsole('please enter a valid argument');
        }
    }

    /**
     * converts the string to uppercase
     * 
     * @param string $string
     * @return string
     */
    private function uppercase($string)
    {
        return strtoupper($string);
    }

    /**
     * converts the string to alternate upper and lower case
     * 
     * @param string $string
     * @param string $start
     * @return string
     */
    private function alternate($string, $start = 'lower')
    {
        for ($i = 0; $i < strlen($string); $i++) {
            if ($start == 'lower') {
                $string[$i] = strtolower($string[$i]);
            } else {
                $string[$i] = strtoupper($string[$i]);
            }

            $start = $start == 'lower' ? 'upper' : 'lower';
        }

        return $string;
    }

    /**
     * creates a file (CSV for example) from the string by making each character a column (in case of CSV)
     * 
     * @param string $string
     * @param string $type
     * @return string
     */
    private function export($string, $type = 'CSV')
    {
        /**
         * @todo create the file
         */
        return "{$type} created!";
    }
}