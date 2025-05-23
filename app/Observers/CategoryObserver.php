<?php

namespace App\Observers;

use App\Actions\v1\Traits\ClearCache;

class CategoryObserver
{
    use ClearCache;

    public function created(): void
    {
        $this->clear([
            'categories',
            'categories:show'
        ]);
    }

    public function updated(): void
    {
        $this->clear([
            'categories',
            'categories:show'
        ]);
    }

    public function deleted(): void
    {
        $this->clear([
            'categories',
            'categories:show'
        ]);
    }

    public function restored(): void
    {
        $this->clear([
            'categories',
            'categories:show'
        ]);
    }

    public function forceDeleted(): void
    {
        $this->clear([
            'categories',
            'categories:show'
        ]);
    }
}