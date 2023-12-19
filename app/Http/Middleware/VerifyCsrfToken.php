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
        'rent/create',
        'rent',
        'volunteer',
        'volunteer/find',
        'volunteer/be',
        'dashboard/IT_eqpt/upload_progress',
        'dashboard/system_config'
    ];
}
