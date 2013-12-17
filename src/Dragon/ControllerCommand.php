<?php

namespace Dragon;

class CallbackCommand
{
    private $callback;

    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return Response
     */
    public function response()
    {
        return call_user_func_array($this->callback, []);
    }
}