<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'path',
        'type',//photo,document,schedule
        'attachable_type',
        'attachable_id',
        'size',
        'description',
    ];

    /**
     * Summary of casts
     * @return array{created_at: string, updated_at: string}
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Summary of attachable
     * @return MorphTo<Model, Attachment>
     */
    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }
}
