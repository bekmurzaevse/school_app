<?php

namespace App\Http\Controllers;

use App\Actions\v1\Main\FaqsIndexAction;
use App\Actions\v1\Main\IndexAction;
use App\Actions\v1\Main\RulesIndexAction;
use App\Actions\v1\Main\AboutAction;
use App\Actions\v1\Main\EducationAction;
use App\Actions\v1\Main\ScheduleAction;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Main\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of rules
     * @param \App\Actions\v1\Main\RulesIndexAction $action
     * @return JsonResponse
     */
    public function rules(RulesIndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of faqs
     * @param \App\Actions\v1\Main\FaqsIndexAction $action
     * @return JsonResponse
     */
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
