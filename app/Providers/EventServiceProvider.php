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
        \App\Models\Faq::observe(\App\Observers\FaqObserver::class);
        \App\Models\SchoolHour::observe(\App\Observers\SchoolHourObserver::class);
        \App\Models\Target::observe(\App\Observers\TargetObserver::class);
        \App\Models\History::observe(\App\Observers\HistoryObserver::class);
        \App\Models\Vacancy::observe(\App\Observers\VacancyObserver::class);
        \App\Models\Employee::observe(\App\Observers\EmployeeObserver::class);
        \App\Models\News::observe(\App\Observers\NewsObserver::class);
        \App\Models\Tag::observe(\App\Observers\TagObserver::class);
        \App\Models\Attachment::observe(\App\Observers\AttachmentObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Rule::observe(\App\Observers\RuleObserver::class);
        \App\Models\Value::observe(\App\Observers\ValueObserver::class);
        \App\Models\Club::observe(\App\Observers\ClubObserver::class);
    }
}
