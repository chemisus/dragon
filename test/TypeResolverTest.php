<?php
/*
 * Copyright (C) 2013 Terrence Howard <chemisus@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Test;

use Dragon\CachedProvider;
use Dragon\ConstructorTypeResolver;
use Dragon\TypeResolver;
use PHPUnit_Framework_TestCase;

class TypeResolverTest extends PHPUnit_Framework_TestCase
{
    public function testTypeResolver()
    {
        $function = function (TypeResolverTest $a, TypeResolver $b) {
        };

        $reflection = new \ReflectionFunction($function);

        $parameters = $reflection->getParameters();

        $resolver = new TypeResolver();

        $expect = ['Test\TypeResolverTest', 'Dragon\TypeResolver'];

        $actual = $resolver->resolve($parameters);

        $this->assertEquals($expect, $actual);
    }

    public function testResolveConstructor()
    {
//        $class_name = 'Dragon\ConstructorTypeResolver';
//
//        $resolver = new TypeResolver();
//
//        $expect = ['Dragon\TypeResolver'];
//
//        $actual = $resolver->resolveConstructor($class_name);
//
//        $this->assertEquals($expect, $actual);
    }

    public function testResolveCallback()
    {
        $resolver = new TypeResolver();

        $expect = ['Test\TypeResolverTest', 'Dragon\TypeResolver'];

        $callback = function (TypeResolverTest $a, TypeResolver $b) {
        };

        $actual = $resolver->resolveFunction($callback);

        $this->assertEquals($expect, $actual);
    }

    public function dummyForResolveMethod(TypeResolver $a, CachedProvider $b)
    {
    }

    public function testResolveMethod()
    {
        $resolver = new TypeResolver();

        $expect = ['Dragon\TypeResolver', 'Dragon\CachedProvider'];

        $actual = $resolver->resolveMethod('Test\TypeResolverTest', 'dummyForResolveMethod');

        $this->assertEquals($expect, $actual);
    }
}