<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'description',
        'school_id',
        'start_time',
        'location',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'start_time' => 'datetime',
        ];
    }
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }
}
