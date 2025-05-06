<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Event;
use App\Models\File;
use App\Observers\CategoryObserver;
use App\Observers\EventObserver;
use App\Observers\FileObserver;
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
        File::observe(FileObserver::class);
        Category::observe(CategoryObserver::class);
        Event::observe(EventObserver::class);
    }
}
