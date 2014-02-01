<?php

namespace Dragon;

class PathRedirectResponse implements Response
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
        header('location: ' . $this->value);
    }
}