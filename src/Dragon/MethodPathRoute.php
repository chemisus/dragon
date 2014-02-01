<?php

namespace Dragon;

class MethodPathRoute implements Route
{
    private $method;
    private $path;
    private $response_factory;

    /**
     * @param string $method
     * @param string $path
     * @param ResponseFactory $response_factory
     */
    public function __construct($method, $path, ResponseFactory $response_factory)
    {
        $this->method = $method;
        $this->path = $path;
        $this->response_factory = $response_factory;
    }

    /**
     * @param Request $request
     * @return RouteResult
     */
    public function validate(Request $request)
    {
        $parameters = [];

        $matched = $this->method === $request->method();

        $matched = $matched && preg_match($this->path, $request->path(), $parameters);

        return new RouteResult($this, $matched, $parameters, $this->response_factory);
    }
}