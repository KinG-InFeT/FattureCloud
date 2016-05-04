<?php
namespace Kiboko\FattureCloud\Facade;

use Illuminate\Support\Facades\Facade;

class FattureCloud extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'FattureCloud';
    }
}