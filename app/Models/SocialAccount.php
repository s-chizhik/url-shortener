<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property User user
 * @property string uid
 * @property string email
 */
class SocialAccount extends Model
{
    protected $fillable = [
        'email',
        'uid',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
