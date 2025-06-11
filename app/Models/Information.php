<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Information extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $table = 'informations';

    public $translatable = ['title', 'description'];

    protected $fillable = ['title', 'description', 'school_id', 'count'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Summary of school
     * @return BelongsTo<School, Information>
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
