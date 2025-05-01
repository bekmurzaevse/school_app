<?php

namespace App\Http\Controllers\Event;

use App\Actions\v1\Event\CreateEventAction;
use App\Dto\v1\Event\EventDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventRequest;

class EventController extends Controller
{
    public function store(EventRequest $request, CreateEventAction $action)
    {
        return $action->__invoke(EventDto::fromRequest($request));
    }
}