<?php declare(strict_types=1);

namespace App\Services;

use App\Models\ShortLink;
use App\Models\User;
use DateTimeInterface;

class CreateShortLink
{
    public function __invoke(User $user, string $url, ?DateTimeInterface $ttl = null): ShortLink
    {
        $link = new ShortLink([
            'url' => $url,
            'ttl' => $ttl,
            'name' => $this->generateId(),
        ]);
        $link->user()->associate($user);
        $link->save();

        return $link;
    }

    private function generateId(): string
    {
        return \Str::random(8);
    }
}
