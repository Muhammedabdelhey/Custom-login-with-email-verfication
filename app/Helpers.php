<?php

use Illuminate\Support\Facades\Auth;
//you should put your file on autoload array on composer.jeson file

if (!function_exists('getName')) {
    function getName()
    {
        return Auth::user()->name;
    }
}
//now you can call this function anywhere you want
