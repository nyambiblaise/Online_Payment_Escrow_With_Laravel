<?php

namespace JsonStringfy\JsonStringfy\Http\Middlewares;

use Closure;
use Facades\JsonStringfy\JsonStringfy\Services\BasicServices;

class CheckPid
{


    public function handle($request, Closure $next)
    {
        $pid = BasicServices::getPid();
        if(!$pid){
            return redirect()->route('installer');
        }
        return $next($request);
    }
}
