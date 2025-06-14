<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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

    /**
     * Summary of events
     * @return HasMany<Event, School>
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Summary of users
     * @return HasMany<User, School>
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Summary of positions
     * @return HasMany<Position, School>
     */
    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    /**
     * Summary of albums
     * @return HasMany<Album, School>
     */
    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    /**
     * Summary of faqs
     * @return HasMany<Faq, School>
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    /**
     * Summary of schoolHours
     * @return HasMany<SchoolHour, School>
     */
    public function schoolHours(): HasMany
    {
        return $this->hasMany(SchoolHour::class);
    }

    /**
     * Summary of targets
     * @return HasMany<Target, School>
     */
    public function targets(): HasMany
    {
        return $this->hasMany(Target::class);
    }

    /**
     * Summary of histories
     * @return HasMany<History, School>
     */
    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }

    /**
     * Summary of values
     * @return HasMany<Value, School>
     */
    public function values(): HasMany
    {
        return $this->hasMany(Value::class);
    }

    /**
     * Summary of rules
     * @return HasMany<Rule, School>
     */
    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class);
    }

    /**
     * Summary of clubs
     * @return HasMany<Club, School>
     */
    public function clubs(): HasMany
    {
        return $this->hasMany(Club::class);
    }

    /**
     * Summary of informations
     * @return HasMany<Information, School>
     */
    public function informations(): HasMany
    {
        return $this->hasMany(Information::class);
    }

    /**
     * Summary of documents
     * @return MorphMany<Attachment, School>
     */
    public function documents(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable')->where('type', 'document');
    }

    /**
     * Summary of schedules
     * @return MorphMany<Attachment, School>
     */
    public function schedules(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable')->where('type', 'schedule');
    }

    public function schedulesPdf(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable')
            ->where('type', 'schedule')
            ->where('name', 'like', '%pdf');
    }

    // public function schedulesByName(string $name): MorphMany
    // {
    //     return $this->morphMany(Attachment::class, 'attachable')
    //         ->where('type', 'schedule')
    //         // ->where('name', 'like', "$name%");
    //         ->where('name', $name);
    // }

    public function scheduleByName(string $name)
    {
        return $this->morphOne(Attachment::class, 'attachable')
            // ->where('type', 'schedule')
            // ->where('name', 'like', "$name%");
            ->where('name', '=', $name);
    }
}
