<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Album extends Model
{
    use HasTranslations, HasFactory, SoftDeletes;

    public array $translatable = ['title', 'description'];
    protected $fillable = [
        'title',
        'school_id',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Summary of school
     * @return BelongsTo<School, Album>
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Summary of photos
     * @return MorphMany<Attachment, Album>
     */
    public function photos(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable')->where('type', 'photo');
    }
}
