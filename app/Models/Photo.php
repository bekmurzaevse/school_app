<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Photo extends Model
{
    use HasTranslations, HasFactory;

    public array $translatable = ['description'];

    protected $fillable = [
        'title',
        'path',
        'album_id',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
