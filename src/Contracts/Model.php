<?php

namespace Vdhicts\Rebrandly\Contracts;

use stdClass;

interface Model
{
    public static function fromResponse(stdClass $response);
}
