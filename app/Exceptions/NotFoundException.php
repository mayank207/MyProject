<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function render($request)
    {
 		 return back()->withError($this->message)->withInput();
    }
}
