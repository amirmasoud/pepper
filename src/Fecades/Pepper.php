<?php

namespace Amirmasoud\Pepper\Fecades;

use Illuminate\Support\Facades\Facade;

class Pepper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Amirmasoud\Pepper\Pepper::class;
    }
}
