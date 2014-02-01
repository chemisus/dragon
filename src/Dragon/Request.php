<?php

namespace Dragon;

class Request
{
    private $method;
    private $path;
    private $query;
    private $form;

    public function __construct($method, $path, array $query = [], array $form = [])
    {
        $this->method = $method;
        $this->path = $path;
        $this->query = $query;
        $this->form = $form;
    }

    public function path()
    {
        return $this->path;
    }

    public function method()
    {
        return $this->method;
    }

    public function query()
    {
        return $this->query;
    }

    public function form()
    {
        return $this->form;
    }
}