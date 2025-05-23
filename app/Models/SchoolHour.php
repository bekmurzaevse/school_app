<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SchoolHour extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'workday', 'holiday'];

    protected $fillable = ['school_id', 'title', 'workday', 'holiday'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
