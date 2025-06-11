<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = ['school_id', 'question', 'answer'];

    public $translatable = ['question', 'answer'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Summary of school
     * @return BelongsTo<School, Faq>
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
