<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Vacancy extends Model
{
    use HasTranslations, SoftDeletes;

    /**
     * Summary of translatable
     * @var array
     */
    public $translatable = [
        'title',
        'content',
    ];

    protected $fillable = [
        'title',
        'content',
        'school_id',
        'salary',
        'active',
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
        return $this->belongsTo(School::class);
    }
}
