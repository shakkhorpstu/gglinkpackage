<?php

namespace Mahmud\GglinkTest;

use Exception;

class ApiException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Something went wrong');
    }
}
