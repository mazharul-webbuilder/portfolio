<?php

use Illuminate\Support\Facades\Auth;

/**
 * Get auth admin user
*/
if (!function_exists('authAdmin')) {
    function authAdmin()
    {
        return Auth::guard('admin')->user();
    }
}
