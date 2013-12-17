<?php

namespace Test\Dragon;

use Dragon\PathMethodRoute;
use Mockery;
use PHPUnit_Framework_TestCase;

class PathMethodRouteTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    public function mockRequest($method, $path, $query, $form)
    {
        $request = Mockery::mock('Dragon\Request');
        $request->shouldReceive('method')->andReturn($method);
        $request->shouldReceive('path')->andReturn($path);
        $request->shouldReceive('query')->andReturn($query);
        $request->shouldReceive('form')->andReturn($form);

        return $request;
    }

    public function testMatches()
    {
        $request = $this->mockRequest('GET', '/path', ['a' => 'A'], ['b' => 'B']);

        $route = new PathMethodRoute('GET', '/\/path/', ['a' => 'A'], ['b' => 'B']);

        $this->assertTrue($route->matches($request));
    }

    public function testMatchMethodFails()
    {
        $request = $this->mockRequest('POST', '/', [], []);

        $route = new PathMethodRoute('GET', '/\//', [], []);

        $this->assertFalse($route->matches($request));
    }

    public function testMatchPathFails()
    {
        $request = $this->mockRequest('GET', '/', [], []);

        $route = new PathMethodRoute('GET', '/\/asdf/', [], []);

        $this->assertFalse($route->matches($request));
    }

    public function testMatchesQuery()
    {
        $request = $this->mockRequest('GET', '/', ['a'=>'A'], []);

        $route = new PathMethodRoute('GET', '/\//', ['a'=>'A'], []);

        $this->assertTrue($route->matches($request));
    }

    public function testMatchQueryFails()
    {
        $request = $this->mockRequest('GET', '/', ['a'=>'A'], []);

        $route = new PathMethodRoute('GET', '/\//', ['a'=>'B'], []);

        $this->assertFalse($route->matches($request));
    }

    public function testMatchesForm()
    {
        $request = $this->mockRequest('GET', '/', [], ['a' => 'A']);

        $route = new PathMethodRoute('GET', '/\//', [], ['a' => 'A']);

        $this->assertTrue($route->matches($request));
    }

    public function testMatchFormFails()
    {
        $request = $this->mockRequest('GET', '/', [], ['a' => 'A']);

        $route = new PathMethodRoute('GET', '/\//', [], ['a' => 'B']);

        $this->assertFalse($route->matches($request));
    }

    public function testParameters()
    {
        $request = $this->mockRequest('GET', '/5/6', [], []);

        $route = new PathMethodRoute('GET', '/\/(?P<param1>\d+)\/(?P<param2>\d+)/', [], []);

        $expect = ['/5/6', 5, 'param1' => '5', 6, 'param2' => 6];

        $route->matches($request);

        $actual = $route->parameters();

        $this->assertEquals($expect, $actual);
    }
}