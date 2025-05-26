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
            'targets:show'
        ]);
    }

    public function updated(): void
    {
        $this->clear([
            'targets',
            'targets:show'
        ]);
    }

    public function deleted(): void
    {
        $this->clear([
            'targets',
            'targets:show'
        ]);
    }

    public function restored(): void
    {
        $this->clear([
            'targets',
            'targets:show'
        ]);
    }

    public function forceDeleted(): void
    {
        $this->clear([
            'targets',
            'targets:show'
        ]);
    }
}