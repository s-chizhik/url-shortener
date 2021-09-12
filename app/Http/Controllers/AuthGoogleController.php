<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use App\Services\CreateSocialAccount;
use Illuminate\Auth\AuthManager;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\Contracts\Provider;
use Symfony\Component\HttpFoundation\Response;

class AuthGoogleController
{
    private Provider $driver;

    public function __construct(Factory $factory)
    {
        $this->driver = $factory->driver('google');
    }

    public function redirect(): Response
    {
        return $this->driver->redirect();
    }

    public function callback(AuthManager $manager, Redirector $redirector, CreateSocialAccount $action): Response
    {
        $socialUser = $this->driver->user();

        /** @var SocialAccount $account */
        $account = SocialAccount::query()
            ->where('uid', $socialUser->getId())
            ->first();

        if (!$account) {
            $account = $action($socialUser);
        }

        $manager->guard()->login($account->user);
        return $redirector->route('dashboard');
    }
}
