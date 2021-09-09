<?php

namespace Command;

class Argument
{
    /**
     * init
     * 
     * @param Base $argument
     * @return void
     */
    public function __construct(Base $argument)
    {
        $argument->handle();
    }
}
