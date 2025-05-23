<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Rule extends Model
{
    use HasTranslations;

    /**
     * Summary of translatable
     * @var array
     */
    public $translatable = [
        'title',
        'text',
    ];

    protected $fillable = [
        'title',
        'school_id',
        'text',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Summary of school
     * @return BelongsTo<School, Rule>
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
