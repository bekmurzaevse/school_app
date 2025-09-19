<?php

namespace App\Observers;

use App\Actions\v1\Traits\ClearCache;

class ValueObserver
{
    use ClearCache;

    /**
     * Summary of created
     * @return void
     */
    public function created(): void
    {
        $this->clear([
            'values',
            'values:show',
            'about:'
        ]);
    }

    /**
     * Summary of updated
     * @return void
     */
    public function updated(): void
    {
        $this->clear([
            'values',
            'values:show',
            'about:'
        ]);
    }

    /**
     * Summary of deleted
     * @return void
     */
    public function deleted(): void
    {
        $this->clear([
            'values',
            'values:show',
            'about:'
        ]);
    }

    /**
     * Summary of restored
     * @return void
     */
    public function restored(): void
    {
        $this->clear([
            'values',
            'values:show',
            'about:'
        ]);
    }

    /**
     * Summary of forceDeleted
     * @return void
     */
    public function forceDeleted(): void
    {
        $this->clear([
            'values',
            'values:show',
            'about:'
        ]);
    }
}
