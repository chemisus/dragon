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

namespace Dragon;

use Closure;

/**
 * Invokes a callback and provides the result.
 *
 * @name CallbackProvider
 * @author Terrence Howard <chemisus@gmail.com>
 * @package Dragon
 */
class CallbackProvider implements DependencyProvider
{
    /**
     * @var callable
     */
    private $callback;

    /**
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Provides a value to be injected.
     *
     * @param DependencyContainer $container
     * @return mixed
     */
    public function provide(DependencyContainer $container)
    {
        return call_user_func_array($this->callback, []);
    }
}