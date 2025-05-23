<?php

namespace App\Actions\v1\Faq;

use App\Http\Resources\v1\Faq\FaqCollection;
use App\Models\Faq;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'faqs:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $faqs = Cache::remember($key, now()->addDay(), function () {
            return Faq::with('school')->paginate(10);
        });

        return static::toResponse(
            message: 'Faq list',
            data: new FaqCollection($faqs)
        );
    }
}
