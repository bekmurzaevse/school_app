<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class School extends Model
{
    use HasTranslations, HasFactory, SoftDeletes;

    public array $translatable = ['name', 'history', 'description'];

    protected $fillable = [
        'name',
        'history',
        'phone',
        'location',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function schoolHours(): HasMany
    {
        return $this->hasMany(SchoolHour::class);
    }

    public function targets(): HasMany
    {
        return $this->hasMany(Target::class);
    }

    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }

    public function values(): HasMany
    {
        return $this->hasMany(Value::class);
    }

    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class);
    }

    public function clubs(): HasMany
    {
        return $this->hasMany(Club::class);
    }

    public function informations(): HasMany
    {
        return $this->hasMany(Information::class);
    }

}
