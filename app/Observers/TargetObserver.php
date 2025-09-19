<?php

namespace App\Observers;

use App\Actions\v1\Traits\ClearCache;

class TargetObserver
{
    use ClearCache;

    public function created(): void
    {
        $this->clear([
            'targets',
            'targets:show',
            'about',
        ]);
    }

    public function updated(): void
    {
        $this->clear([
            'targets',
            'targets:show',
            'about'
        ]);
    }

    public function deleted(): void
    {
        $this->clear([
            'targets',
            'targets:show',
            'about'
        ]);
    }

    public function restored(): void
    {
        $this->clear([
            'targets',
            'targets:show',
            'about'
        ]);
    }

    public function forceDeleted(): void
    {
        $this->clear([
            'targets',
            'targets:show',
            'about'
        ]);
    }
}