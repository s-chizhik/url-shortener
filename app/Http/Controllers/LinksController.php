<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Services\CreateShortLink;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\Response;

class LinksController
{
    public function show(Factory $view)
    {
        return $view->make('cabinet.new_link');
    }

    public function create(CreateLinkRequest $request, CreateShortLink $createShortLink, Redirector $redirector): Response
    {
        $createShortLink($request->user(), $request->url, $request->ttl);

        return $redirector->route('dashboard');
    }
}
