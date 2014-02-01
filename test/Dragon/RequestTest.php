<?php

namespace Test\Dragon;

use Dragon\Request;
use Mockery;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    public function testRequest()
    {
        $method = 'get';
        $path = 'path';
        $query = ['query'];
        $form = ['form'];

        $request = new Request($method, $path, $query, $form);

        $this->assertEquals($request->method(), $method);
        $this->assertEquals($request->path(), $path);
        $this->assertEquals($request->query(), $query);
        $this->assertEquals($request->form(), $form);
    }
}