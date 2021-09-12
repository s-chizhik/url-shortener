<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\View\Factory;

class DashboardController
{
    public function index(Factory $view, AuthManager $auth)
    {
        return $view->make('dashboard', [
            'user' => $auth->guard()->user(),
        ]);
    }
}
