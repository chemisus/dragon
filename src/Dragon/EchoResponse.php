<?php

namespace Dragon;

class EchoResponse implements Response
{
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function respond()
    {
        echo $this->value;
    }
}
