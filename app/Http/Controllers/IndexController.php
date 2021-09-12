<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;

class IndexController
{
    public function index(Factory $view)
    {
        return $view->make('index');
    }
}
