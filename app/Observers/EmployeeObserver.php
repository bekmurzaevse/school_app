<?php

namespace App\Observers;

use App\Actions\v1\Traits\ClearCache;

class EmployeeObserver
{
    use ClearCache;

    /**
     * Summary of created
     * @return void
     */
    public function created(): void
    {
        $this->clear([
            'employees',
            'employees:show',
            'schools:show'
        ]);
    }

    /**
     * Summary of updated
     * @return void
     */
    public function updated(): void
    {
        $this->clear([
            'employees',
            'employees:show',
            'schools:show'
        ]);
    }

    /**
     * Summary of deleted
     * @return void
     */
    public function deleted(): void
    {
        $this->clear([
            'employees',
            'employees:show',
            'schools:show'
        ]);
    }

    /**
     * Summary of restored
     * @return void
     */
    public function restored(): void
    {
        $this->clear([
            'employees',
            'employees:show',
            'schools:show'
        ]);
    }

    /**
     * Summary of forceDeleted
     * @return void
     */
    public function forceDeleted(): void
    {
        $this->clear([
            'employees',
            'employees:show',
            'schools:show'
        ]);
    }
}
