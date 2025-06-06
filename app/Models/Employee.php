<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasTranslations, SoftDeletes;

    public $translatable = ['full_name', 'description'];
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'position_id',
        'birth_date',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Summary of position
     * @return BelongsTo<Position, Employee>
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Summary of photo
     * @return MorphOne<Attachment, Employee>
     */
    public function photo(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }
}
