<?php

namespace Dragon;

interface Request
{
    public function method();

    public function path();

    public function query();

    public function form();
}