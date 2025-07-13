<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class SkipCsrfForMidtrans extends Middleware
{
    /**
     * URIs yang dikecualikan dari CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/midtrans/callback',
    ];
}
