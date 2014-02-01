<?php

namespace Dragon;

interface Route
{
    /**
     * @param Request $request
     * @return boolean
     */
    public function matches(Request $request);

    /**
     * @return array
     */
    public function parameters();

    /**
     * @return Responder
     */
    public function response();
}
