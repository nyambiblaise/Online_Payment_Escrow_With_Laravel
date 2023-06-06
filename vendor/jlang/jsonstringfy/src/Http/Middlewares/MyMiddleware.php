<?php

namespace JsonStringfy\JsonStringfy\Http\Middlewares;

use Closure;
use Facades\JsonStringfy\JsonStringfy\Services\DocHash;
use Facades\JsonStringfy\JsonStringfy\Services\Installer;
use Facades\JsonStringfy\JsonStringfy\Services\Reader;

class MyMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Installer::youAre()) {
            return redirect()->route('doc.there');
        } elseif (!Reader::readCircuit() && (auth()->getDefaultDriver() == 'admin' || auth()->getDefaultDriver() == 'api')) {
            $string = Installer::mydoc();
            if (!isset($string->success)) {
                DocHash::rBaseDoc();
                return redirect()->route('doc.there');
            }
        }
        return $next($request);
    }
}
