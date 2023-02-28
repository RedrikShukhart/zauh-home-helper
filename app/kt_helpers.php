<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('ktHello')) {
    function ktHello()
    {
//        return app('test');
        return ('Hello from Zauhovna');
    }
}
