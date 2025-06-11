<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Target extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['name', 'description'];

    protected $fillable = ['name', 'description', 'school_id'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Summary of school
     * @return BelongsTo<School, Target>
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

}
