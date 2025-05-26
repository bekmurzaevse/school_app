<?php

namespace App\Observers;

use App\Actions\v1\Traits\ClearCache;

class HistoryObserver
{
    use ClearCache;

    public function created(): void
    {
        $this->clear([
            'histories',
            'histories:show'
        ]);
    }

    public function updated(): void
    {
        $this->clear([
            'histories',
            'histories:show'
        ]);
    }

    public function deleted(): void
    {
        $this->clear([
            'histories',
            'histories:show'
        ]);
    }

    public function restored(): void
    {
        $this->clear([
            'histories',
            'histories:show'
        ]);
    }

    public function forceDeleted(): void
    {
        $this->clear([
            'histories',
            'histories:show'
        ]);
    }
}