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

/**
 *
 *
 * @name DependencyContainer
 * @author Terrence Howard <chemisus@gmail.com>
 * @package Dragon
 */
class DependencyContainer
{
    /**
     * @var DependencyProvider[]
     */
    private $providers = [];

    /**
     * Provides a value for the specified key.
     *
     * @param string $key
     * @param DependencyContainer $container
     * @return mixed
     */
    public function get($key, DependencyContainer $container = null)
    {
        if ($container === null) {
            $container = $this;
        }

        return $this->providers[$key]->provide($container);
    }

    /**
     * Adds a provider for a key.
     *
     * @param string $key
     * @param DependencyProvider $value
     */
    public function set($key, DependencyProvider $value)
    {
        $this->providers[$key] = $value;
    }

    /**
     * Adds a callback provider.
     *
     * @param string $key
     * @param callable $value
     * @param bool $cached
     */
    public function callback($key, callable $value, $cached = true)
    {
        $value = new CallbackProvider($value);

        if ($cached) {
            $value = new CachedProvider($value);
        }

        $this->set($key, $value);
    }

    /**
     * Adds a value provider.
     *
     * @param string $key
     * @param mixed $value
     */
    public function value($key, $value)
    {
        $this->set($key, new ValueProvider($value));
    }
}