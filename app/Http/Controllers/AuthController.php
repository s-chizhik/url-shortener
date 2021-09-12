<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\Response;

class AuthController
{
    public function logout(AuthManager $manager, Redirector $redirector): Response
    {
        $manager->guard()->logout();

        return $redirector->route('index');
    }
}
