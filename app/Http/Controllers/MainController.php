<?php

namespace App\Http\Controllers;

use App\Actions\v1\Main\FaqsIndexAction;
use App\Actions\v1\Main\IndexAction;
use App\Actions\v1\Main\RulesIndexAction;
use App\Actions\v1\Main\AboutAction;
use App\Actions\v1\Main\AddAction;
use App\Actions\v1\Main\EducationAction;
use App\Actions\v1\Main\IndexAction;
use App\Actions\v1\Main\ListAction;
use App\Actions\v1\Main\ScheduleAction;
use App\Dto\v1\Main\AddDto;
use App\Http\Requests\v1\Main\AddRequest;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{

    // /**
    //  * Summary of index
    //  * @param \App\Actions\v1\Main\IndexAction $action
    //  * @return JsonResponse
    //  */
    // public function index(IndexAction $action): JsonResponse
    // {
    //     return $action();
    // }

    // /**
    //  * Summary of congratulation
    //  * @param \App\Http\Requests\v1\Main\AddRequest $request
    //  * @param \App\Actions\v1\Main\AddAction $action
    //  * @return JsonResponse
    //  */
    // public function congratulation(AddRequest $request, AddAction $action): JsonResponse
    // {
    //     return $action(AddDto::from($request));
    // }

    // /**
    //  * Summary of list
    //  * @param \App\Actions\v1\Main\ListAction $action
    //  * @return JsonResponse
    //  */
    // public function list(ListAction $action): JsonResponse
    // {
    //     return $action();
    // }

    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    public function rules(RulesIndexAction $action): JsonResponse
    {
        return $action();
    }

    public function faqs(FaqsIndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of about
     * @param \App\Actions\v1\Main\AboutAction $action
     * @return JsonResponse
     */
    public function about(AboutAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of education
     * @param \App\Actions\v1\Main\EducationAction $action
     * @return JsonResponse
     */
    public function education(EducationAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of schedules
     * @param \App\Actions\v1\Main\ScheduleAction $action
     * @return JsonResponse
     */
    public function schedules(ScheduleAction $action): JsonResponse
    {
        return $action();
    }
}
