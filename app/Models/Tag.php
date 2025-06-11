<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasTranslations, SoftDeletes;

    public $translatable = [
        'name',
        'description'
    ];
    protected $fillable = [
        'name',
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
     * Summary of news
     * @return BelongsToMany<News, Tag, \Illuminate\Database\Eloquent\Relations\Pivot>
     */
    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_tag', 'tag_id', 'news_id');
    }
}
