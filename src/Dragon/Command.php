<?php

namespace Dragon;

interface Command
{
    /**
     * @return Response
     */
    public function response();
}