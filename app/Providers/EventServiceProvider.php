<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \App\Models\School::observe(\App\Observers\SchoolObserver::class);
        \App\Models\Position::observe(\App\Observers\PositionObserver::class);
        \App\Models\Album::observe(\App\Observers\AlbumObserver::class);
        \App\Models\Photo::observe(\App\Observers\PhotoObserver::class);
        \App\Models\File::observe(\App\Observers\FileObserver::class);
        \App\Models\Category::observe(\App\Observers\CategoryObserver::class);
        \App\Models\Event::observe(\App\Observers\EventObserver::class);
        \App\Models\Faq::observe(\App\Observers\FaqObserver::class);
        \App\Models\SchoolHour::observe(\App\Observers\SchoolHourObserver::class);
    }
}
