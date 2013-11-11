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
 * Resolves the types of a list of parameters.
 *
 * @name TypeResolver
 * @author Terrence Howard <chemisus@gmail.com>
 * @package Dragon
 */
class TypeResolver
{
    /**
     * Returns a list of types for the parameters.
     *
     * @param \ReflectionParameter[] $parameters
     * @return string[]
     */
    public function resolve(array $parameters)
    {
        $values = [];

        foreach ($parameters as $parameter) {
            $values[] = $parameter->getClass()->getName();
        }

        return $values;
    }
}