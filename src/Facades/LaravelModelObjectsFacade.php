<?php

namespace WeArePixel\LaravelModelObjects\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \WeArePixel\LaravelModelObjects\LaravelModelObjects
 */
class LaravelModelObjectsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-model-objects';
    }
}
