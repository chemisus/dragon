<?php

namespace Dragon;

interface Route
{
    /**
     * @param Request $request
     * @return RouteResult
     */
    public function validate(Request $request);
}
