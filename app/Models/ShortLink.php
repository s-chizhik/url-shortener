<?php declare(strict_types=1);

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string url
 * @property string name
 * @property DateTime ttl
 * @property int visits
 */
class ShortLink extends Model
{
    protected $fillable = [
        'url',
        'name',
        'ttl',
    ];

    protected $casts = [
        'ttl' => 'timestamp',
        'visits' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
