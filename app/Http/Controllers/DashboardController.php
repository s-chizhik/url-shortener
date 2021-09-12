<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\Factory;

class DashboardController
{
    public function index(Factory $view, AuthManager $auth)
    {
        $user = $auth->guard()->user();

        $links = ShortLink::query()
            ->whereHas('user', function(Builder $builder) use ($user) {
                $builder->where('id', $user->id);
            })
            ->get();

        return $view->make('cabinet.dashboard', compact('user', 'links'));
    }
}
