<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class RedirectController
{
    public function redirect(ShortLink $link): Response
    {
        $link->incrementVisit();

        return new RedirectResponse(
            $link->url,
        );
    }
}
