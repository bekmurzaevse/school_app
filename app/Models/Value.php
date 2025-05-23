<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Value extends Model
{
    use HasTranslations;

    /**
     * Summary of translatable
     * @var array
     */
    public $translatable = [
        'name',
        'text'
    ];

    protected $fillable = [
        'name',
        'school_id',
        'photo_id',
        'text',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Summary of school
     * @return BelongsTo<School, Value>
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    /**
     * Summary of photo
     * @return BelongsTo<Photo, Value>
     */
    public function photo(): BelongsTo
    {
        return $this->belongsTo(Photo::class, 'photo_id', 'id');
    }
}
