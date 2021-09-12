<?php declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthGoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use Illuminate\Routing\Router;

/**
 * @var Router $router
 */

$router->get('/', [IndexController::class, 'index'])->name('index');

$router->group(['middleware' => 'auth:web'], function (Router $router) {
    $router->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    $router->get('/logout', [AuthController::class, 'logout'])->name('logout');
});

$router->group(['as' => 'oauth.', 'prefix' => '/oauth'], function (Router $router) {
    $router->get('/google', [AuthGoogleController::class, 'redirect'])->name('google');
    $router->get('/google/callback', [AuthGoogleController::class, 'callback'])->name('google.callback');
});
