<?php declare(strict_types=1);

namespace App\Http\Binders;

use App\Models\ShortLink;
use DateTime;
use Illuminate\Database\Eloquent\Builder;

class ShortLinkBinder
{
    public function resolve($value): ShortLink
    {
        /** @var ShortLink $link */
        $link = ShortLink::query()
            ->where('name', $value)
            ->where(function (Builder $builder) {
                $builder
                    ->whereDate('ttl', '>=', new DateTime())
                    ->orWhereNull('ttl');
            })
            ->firstOrFail();
        return $link;
    }
}
