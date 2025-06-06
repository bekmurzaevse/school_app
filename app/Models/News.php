<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasTranslations, SoftDeletes;

    public $translatable = [
        'title',
        'short_content',
        'content'
    ];
    protected $fillable = [
        'title',
        'short_content',
        'content',
        'author_id',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * Summary of tags
     * @return BelongsToMany<Tag, News, \Illuminate\Database\Eloquent\Relations\Pivot>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'news_tag', 'news_id', 'tag_id');
    }

    /**
     * Summary of coverImage
     * @return MorphOne<Attachment, News>
     */
    public function coverImage(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }
}
