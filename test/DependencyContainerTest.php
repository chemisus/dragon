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

use Dragon\DependencyContainer;
use PHPUnit_Framework_TestCase;

class DependencyContainerTest extends PHPUnit_Framework_TestCase
{
    private $container;

    public function setUp()
    {
        parent::setUp();

        $this->container = new DependencyContainer();
    }

    public function testCallback()
    {
        $this->container->callback(
            'a',
            function () {
                return 'A';
            }
        );

        $actual = $this->container->get('a');

        $expect = 'A';

        $this->assertEquals($expect, $actual);
    }

    public function testCacheCallback()
    {
        $count = 0;

        $this->container->callback(
            'a',
            function () use (&$count) {
                return $count++;
            }
        );

        $this->container->get('a');
        $actual = $this->container->get('a');

        $expect = 0;

        $this->assertEquals($expect, $actual);
    }

    public function testNotCacheCallback()
    {
        $count = 0;

        $this->container->callback(
            'a',
            function () use (&$count) {
                return $count++;
            },
            false
        );

        $this->container->get('a');
        $actual = $this->container->get('a');

        $expect = 1;

        $this->assertEquals($expect, $actual);
    }

    public function testValue()
    {
        $this->container->value('a', 'A');

        $actual = $this->container->get('a');

        $expect = 'A';

        $this->assertEquals($expect, $actual);
    }
}