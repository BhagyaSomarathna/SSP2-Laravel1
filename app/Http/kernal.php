<?php
namespace App\Http;
use Illuminate\Foundation\Http\kernel as HttpKernel;

class Kernel extends HttpKernel{
    /*
    the application's route middleware groups.
    *
    * @var array
    */

     protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'customer'  => \App\Http\Middleware\CustomerMiddleware::class,
    ];
}