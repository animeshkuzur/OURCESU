<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [ 'api/login', 'api/register', 'api/logout' , 'api/getuser', 'api/gettoken', 'api/getstl', 'api/getsap',
    					  'api/savesettings','api/changepassword', 'api/apiemobilereceipt'
        //
    ];
}
