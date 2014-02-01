<?php

namespace Dragon;

class PathMethodRoute implements Route
{
    private $method;
    private $path;
    private $query;
    private $form;
    private $parameters = [];
    private $responder;

    public function __construct($method, $path, $query, $form, Responder $responder)
    {
        $this->method = $method;
        $this->path = $path;
        $this->query = $query;
        $this->form = $form;
        $this->responder = $responder;
    }

    /**
     * @param $method
     * @return bool
     */
    private function matchesMethod($method)
    {
        return $this->method === $method;
    }

    /**
     * @param $path
     * @return int
     */
    private function matchesPath($path)
    {
        return preg_match($this->path, $path, $this->parameters);
    }

    /**
     * @param array $query
     * @return bool
     */
    private function matchesQuery(array $query)
    {
        foreach ($this->query as $key => $value) {
            if (!isset($query[$key]) || $query[$key] !== $value) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $form
     * @return bool
     */
    private function matchesForm(array $form)
    {
        foreach ($this->form as $key => $value) {
            if (!isset($form[$key]) || $form[$key] !== $value) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param Request $request
     * @return boolean
     */
    public function matches(Request $request)
    {
        return $this->matchesMethod($request->method())
        && $this->matchesPath($request->path())
        && $this->matchesQuery($request->query())
        && $this->matchesForm($request->form());
    }

    /**
     * @return array
     */
    public function parameters()
    {
        return $this->parameters;
    }

    public function response()
    {
        return $this->responder;
    }
}