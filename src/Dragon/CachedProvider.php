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
 * @name CachedProvider
 * @author Terrence Howard <chemisus@gmail.com>
 * @package Dragon
 */
class CachedProvider implements DependencyProvider
{
    private $provider;
    private $value;
    private $cached = false;

    public function __construct(DependencyProvider $provider)
    {
        $this->provider = $provider;
    }

    public function provide(DependencyContainer $container)
    {
        if (!$this->cached) {
            $this->cached = true;
            $this->value  = $this->provider->provide($container);
        }

        return $this->value;
    }
}