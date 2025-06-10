<?php

namespace App\Observers;

use App\Actions\v1\Traits\ClearCache;
use App\Models\Attachment;

class AttachmentObserver
{
    use ClearCache;

    /**
     * Summary of created
     * @return void
     */
    public function created(Attachment $attachment): void
    {
        $type = $attachment->type;

        if ($type == 'document') {
            $this->clear([
                'documents',
                'documents:show',
            ]);
        } elseif ($type == 'photo') {
            $this->clear([
                'photos',
                'photos:show',
            ]);
        } elseif ($type == 'file') {
            $this->clear([
                'files',
                'files:show',
            ]);
        } elseif ($type == 'schedule') {
            $this->clear([
                'schedules',
                'schedules:show',
            ]);
        }
    }

    /**
     * Summary of updated
     * @return void
     */
    public function updated(Attachment $attachment): void
    {
        $type = $attachment->type;

        if ($type == 'document') {
            $this->clear([
                'documents',
                'documents:show',
            ]);
        } elseif ($type == 'photo') {
            $this->clear([
                'photos',
                'photos:show',
            ]);
        } elseif ($type == 'file') {
            $this->clear([
                'files',
                'files:show',
            ]);
        } elseif ($type == 'schedule') {
            $this->clear([
                'schedules',
                'schedules:show',
            ]);
        }
    }

    /**
     * Summary of deleted
     * @return void
     */
    public function deleted(Attachment $attachment): void
    {
        $type = $attachment->type;

        if ($type == 'document') {
            $this->clear([
                'documents',
                'documents:show',
            ]);
        } elseif ($type == 'photo') {
            $this->clear([
                'photos',
                'photos:show',
            ]);
        } elseif ($type == 'file') {
            $this->clear([
                'files',
                'files:show',
            ]);
        } elseif ($type == 'schedule') {
            $this->clear([
                'schedules',
                'schedules:show',
            ]);
        }
    }

    /**
     * Summary of restored
     * @return void
     */
    public function restored(Attachment $attachment): void
    {
        $type = $attachment->type;

        if ($type == 'document') {
            $this->clear([
                'documents',
                'documents:show',
            ]);
        } elseif ($type == 'photo') {
            $this->clear([
                'photos',
                'photos:show',
            ]);
        } elseif ($type == 'file') {
            $this->clear([
                'files',
                'files:show',
            ]);
        } elseif ($type == 'schedule') {
            $this->clear([
                'schedules',
                'schedules:show',
            ]);
        }
    }

    /**
     * Summary of forceDeleted
     * @return void
     */
    public function forceDeleted(Attachment $attachment): void
    {
        $type = $attachment->type;

        if ($type == 'document') {
            $this->clear([
                'documents',
                'documents:show',
            ]);
        } elseif ($type == 'photo') {
            $this->clear([
                'photos',
                'photos:show',
            ]);
        } elseif ($type == 'file') {
            $this->clear([
                'files',
                'files:show',
            ]);
        } elseif ($type == 'schedule') {
            $this->clear([
                'schedules',
                'schedules:show',
            ]);
        }
    }
}
