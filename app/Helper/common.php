<?php

use App\Models\Admin;

/**
 * get admin user
 */
if (!function_exists('getAdmin')) {
    function getAdmin()
    {
        return Admin::first();
    }
}
