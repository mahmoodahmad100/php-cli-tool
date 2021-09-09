<?php

namespace Console;

class Argument
{
    /**
     * init
     * 
     * @param Base $argument
     * @return void
     * @codeCoverageIgnore
     */
    public function __construct(Base $argument)
    {
        $argument->handle();
    }
}
