<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Position extends Model
{
    use HasTranslations, HasFactory, SoftDeletes;

    public array $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
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
     * @return BelongsTo<School, Position>
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Summary of employees
     * @return HasMany<Employee, Position>
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
