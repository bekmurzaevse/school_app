<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Club extends Model
{
    use HasTranslations;

    /**
     * Summary of translatable
     * @var array
     */
    public $translatable = [
        'name',
        'text',
        'schedule'
    ];

    protected $fillable = [
        'name',
        'school_id',
        'text',
        'schedule',
        'photo_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Summary of school
     * @return BelongsTo<School, Club>
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Summary of photo
     * @return BelongsTo<Photo, Club>
     */
    public function photo(): BelongsTo
    {
        return $this->belongsTo(Photo::class);
    }
}
