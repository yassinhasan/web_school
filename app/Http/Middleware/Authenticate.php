<?php

namespace App\Http\Middleware;

use App\Http\Traits\FlashMessageTrait;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    use FlashMessageTrait;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $this->ErrorMsg("soory you have not acces to admin dashboard");
            return route('login');
        }
    }
}
