<?php declare(strict_types=1);

namespace App\Services;

use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialUser;

class CreateSocialAccount
{
    private DatabaseManager $databaseManager;
    private Hasher $hasher;

    public function __construct(DatabaseManager $databaseManager, Hasher $hasher)
    {
        $this->databaseManager = $databaseManager;
        $this->hasher = $hasher;
    }

    public function __invoke(SocialUser $socialUser): SocialAccount
    {
        return $this->databaseManager->transaction(function () use ($socialUser) {
            $user = new User([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => $this->hasher->make(Str::random()),
            ]);
            $user->save();

            $account = new SocialAccount([
                'uid' => $socialUser->getId(),
                'email' => $socialUser->getEmail()
            ]);
            $account->user()->associate($user);
            $account->save();

            return $account;
        });
    }
}
