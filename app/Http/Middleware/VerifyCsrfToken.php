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
        'http://127.0.0.1:8000/create_new_product',
        'http://127.0.0.1:8000/create_new_price',
        'https://bi.nipponia.com/create_new_product'// specific route
    ];
}
