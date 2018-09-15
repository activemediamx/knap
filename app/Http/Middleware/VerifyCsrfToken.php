<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    
    public function handle($request, \Closure $next)
    {
        if (env('APP_ENV') !== 'testing') {
            return parent::handle($request, $next);
        } else {
            return $this->addCookieToResponse($request, $next($request));
        }
    }
}







/*
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{

    protected $except = [

    ];

    public function handle($request, \Closure $next)
    {
        if (env('APP_ENV') !== 'testing') {
            return parent::handle($request, $next);
        } else {
            return $this->addCookieToResponse($request, $next($request));
        }
    }
}
*/
