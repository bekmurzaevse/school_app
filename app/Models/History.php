<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class History extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['text'];

    protected $fillable = ['year', 'text'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

}
