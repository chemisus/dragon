<?php

namespace Dragon;

class RequestFactory
{
    public function makeRequest($method, $path, $query = [], $form = [])
    {
        return new Request($method, $path, $query, $form);
    }

    public function makeServerRequest()
    {
        return $this->makeRequest(
            strtolower($_SERVER['REQUEST_METHOD']),
            isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : '',
            $_GET,
            $_POST
        );
    }
}
