<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class EventServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'EventService';
    }
}
