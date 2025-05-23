<?php

namespace App\Observers;

use App\Actions\v1\Traits\ClearCache;

class EventObserver
{
    use ClearCache;

    public function created(): void
    {
        $this->clear([
            'events',
            'events:show'
        ]);
    }

    public function updated(): void
    {
        $this->clear([
            'events',
            'events:show'
        ]);
    }

    public function deleted(): void
    {
        $this->clear([
            'events',
            'events:show'
        ]);
    }

    public function restored(): void
    {
        $this->clear([
            'events',
            'events:show'
        ]);
    }

    public function forceDeleted(): void
    {
        $this->clear([
            'events',
            'events:show'
        ]);
    }
}