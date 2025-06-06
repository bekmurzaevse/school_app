<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasTranslations, SoftDeletes;

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
     * @return MorphOne<Attachment, Club>
     */
    public function photo(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }

}
