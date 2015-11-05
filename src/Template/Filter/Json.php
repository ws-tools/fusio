<?php
/*
 * Fusio
 * A web-application to create dynamically RESTful APIs
 *
 * Copyright (C) 2015 Christoph Kappestein <k42b3.x@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Fusio\Impl\Template\Filter;

use PSX\Data\Object;
use PSX\Data\RecordInterface;
use PSX\Data\Writer;

/**
 * Json
 *
 * @author  Christoph Kappestein <k42b3.x@gmail.com>
 * @license http://www.gnu.org/licenses/agpl-3.0
 * @link    http://fusio-project.org
 */
class Json
{
    const FILTER_NAME = 'json';

    public function __invoke($value)
    {
        $writer = new Writer\Json();

        if (is_array($value)) {
            $value = new Object($value);
        } elseif ($value instanceof \stdClass) {
            $value = new Object((array) $value);
        }

        if ($value instanceof RecordInterface) {
            return $writer->write($value);
        } else {
            return '{}';
        }
    }
}