<?php

namespace App\Observers;

use App\Actions\v1\Traits\ClearCache;

class FileObserver
{
    use ClearCache;

    public function created(): void
    {
        $this->clear([
            'files',
            'files:show'
        ]);
    }

    public function updated(): void
    {
        $this->clear([
            'files', 
            'files:show'
        ]);
    }

    public function deleted(): void
    {
        $this->clear([
            'files', 
            'files:show'
        ]);
    }

    public function restored(): void
    {
        $this->clear([
            'files', 
            'files:show'
        ]);
    }

    public function forceDeleted(): void
    {
        $this->clear([
            'files',
            'files:show'
        ]);
    }
}