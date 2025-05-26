<?php

namespace App\Actions\v1\Rule;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Rule\RuleResource;
use App\Models\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $key = 'rules:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $rule = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Rule::with(['school'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new RuleResource($rule)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Rule Not Found', 404);
        }
    }
}