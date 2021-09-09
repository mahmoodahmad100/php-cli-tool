<?php

namespace Console;

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
     * @param string $dir
     * @param string $file_name
     * @return string
     */
    private function export($string, $type = 'csv', $dir = __DIR__ . '/..', $file_name = 'output')
    {
        switch ($type) {
            case 'csv':
                $data   = [];
                $data[] = str_split($string);
                try {
                    $this->exportToCsv($data, $dir, $file_name);
                } catch(\Exception $e) {
                    return $e->getMessage();
                }
                break;
            case 'php':
                // ...
                break;  
        }

        return strtoupper($type) . ' created!';
    }

    /**
     * creates CSV file
     * 
     * @param array  $data
     * @param string $dir
     * @param string $file_name
     * @return void
     * @throws \Exception
     */
    private function exportToCsv($data, $dir, $file_name)
    {
        try {
            $file = fopen("$dir/{$file_name}.csv",'w');
        
            foreach ($data as $line) {
                fputcsv($file, $line);
            }
            
            fclose($file);
        } catch(\Exception $e) {
            throw new \Exception($e->getMessage());
        }      

    }
}