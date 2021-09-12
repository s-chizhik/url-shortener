<?php declare(strict_types=1);

namespace App\Http\Requests;

use DateTimeImmutable;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string url
 * @property DateTimeImmutable ttl
 */
class CreateLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => 'required|url',
            'ttl' => 'nullable|date|after:now',
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge(array_filter([
            'ttl' => $this->get('ttl') ? new DateTimeImmutable($this->get('ttl')) : null,
        ]));
    }
}
