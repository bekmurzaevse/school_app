<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Schedule\CreateAction;
use App\Actions\v1\Schedule\DeleteAction;
use App\Actions\v1\Schedule\DownloadAction;
use App\Actions\v1\Schedule\IndexAction;
use App\Actions\v1\Schedule\ShowAction;
use App\Actions\v1\Schedule\UpdateAction;
use App\Dto\v1\Schedule\CreateDto;
use App\Dto\v1\Schedule\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Schedule\CreateRequest;
use App\Http\Requests\v1\Schedule\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ScheduleController extends Controller
{
    public function index(Request $request, IndexAction $action): JsonResponse
    {
        return $action($request);
    }

    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    public function download(int $id, DownloadAction $action):  StreamedResponse
    {
        return $action($id);
    }

    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}