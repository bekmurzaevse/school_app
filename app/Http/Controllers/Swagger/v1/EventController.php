<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
// use OpenApi\Attributes as OA;

class EventController extends Controller
{

    // #[OA\Get(
    //     path: '/api/v1/events',
    //     summary: 'Eventler dizimi',
    //     description: 'Toliq eventler dizimi',
    //     tags: ['Event'],
    // )]
    // #[OA\Response(response: 401, description: 'Unauthorized')]
    // #[OA\Response(response: 500, description: 'Server error')]
    // public function index()
    // {
    //     //
    // }

    // #[OA\Post(
    //     path: '/api/v1/events/create',
    //     summary: 'Ta\'dbir jaratiw',
    //     description: 'Ja\'na ta\'dbir jaratiw',
    //     tags: ['Event'],
    //     security: [['sanctum' => []]]
    // )]
    // #[OA\RequestBody(
    //     required: true,
    //     description: 'Ta\'dbir jaratiw ushin mag\'liwmatlar',
    //     content: new OA\JsonContent(
    //         required: ['name', 'start_time', 'location', 'description'],
    //         properties: [
    //             new OA\Property(
    //                 property: 'name',
    //                 type: 'object',
    //                 required: ['kk', 'uz', 'ru', 'en'],
    //                 properties: [
    //                     new OA\Property(property: 'kk', type: 'string', example: 'kk name'),
    //                     new OA\Property(property: 'uz', type: 'string', example: 'uz name'),
    //                     new OA\Property(property: 'ru', type: 'string', example: 'ru name'),
    //                     new OA\Property(property: 'en', type: 'string', example: 'en name'),
    //                 ]
    //             ),
    //             new OA\Property(
    //                 property: 'description',
    //                 type: 'object',
    //                 required: ['kk', 'uz', 'ru', 'en'],
    //                 properties: [
    //                     new OA\Property(property: 'kk', type: 'string', example: 'kk description'),
    //                     new OA\Property(property: 'uz', type: 'string', example: 'uz description'),
    //                     new OA\Property(property: 'ru', type: 'string', example: 'ru description'),
    //                     new OA\Property(property: 'en', type: 'string', example: 'en description'),
    //                 ]
    //             ),
    //             new OA\Property(property: 'start_time', type: 'string', format: 'date-time', example: '2025-05-20 14:00:00'),
    //             new OA\Property(property: 'location', type: 'string', example: '1-mektep sport zali'),
    //         ]
    //     )
    // )]
    // #[OA\Response(response: 200, description: 'Ta\'dbir a\'wmetli jaratildi!')]
    // #[OA\Response(response: 401, description: 'Not allowed')]
    // #[OA\Response(response: 422, description: 'Validation error')]
    // public function create()
    // {
    //     //
    // }

    // #[OA\Get(
    //     path: '/api/v1/events/{id}',
    //     summary: 'Ta\'dbir haqqinda mag\'liwmat',
    //     description: 'ID boyinsha ta\'dbir haqqinda mag\'liwmat aliw',
    //     tags: ['Event']
    // )]
    // #[OA\Parameter(
    //     name: 'id',
    //     in: 'path',
    //     required: true,
    //     description: 'Ta\'dbir ID si',
    //     schema: new OA\Schema(type: 'integer'),
    //     example: 1
    // )]
    // #[OA\Response(response: 200, description: 'Ta\'dbir haqqinda mag\'liwmatlar alindi')]
    // #[OA\Response(response: 404, description: 'Ta\'dbir tabilmadi')]
    // #[OA\Response(response: 401, description: 'Not authenticated')]
    // public function show()
    // {
    //     //
    // }

    // #[OA\Put(
    //     path: '/api/v1/events/update/{id}',
    //     summary: 'Ta\'dbir jan\'alaw',
    //     description: 'ID boyinsha ta\'dbirdi jan\'alaw',
    //     tags: ['Event'],
    //     security: [['sanctum' => []]]
    // )]
    // #[OA\Parameter(
    //     name: 'id',
    //     in: 'path',
    //     required: true,
    //     description: 'Jan\'alanatug\'in ta\'dbirdiń ID si',
    //     schema: new OA\Schema(type: 'integer'),
    //     example: 3
    // )]
    // #[OA\RequestBody(
    //     required: true,
    //     description: 'Jan\'alaw ushin ta\'dbir mag\'liwmatlari',
    //     content: new OA\JsonContent(
    //         required: ['name', 'start_time', 'location', 'description'],
    //         properties: [
    //             new OA\Property(
    //                 property: 'name',
    //                 type: 'object',
    //                 required: ['kk', 'uz', 'ru', 'en'],
    //                 properties: [
    //                     new OA\Property(property: 'kk', type: 'string', example: 'kk name'),
    //                     new OA\Property(property: 'uz', type: 'string', example: 'uz name'),
    //                     new OA\Property(property: 'ru', type: 'string', example: 'ru name'),
    //                     new OA\Property(property: 'en', type: 'string', example: 'en name'),
    //                 ]
    //             ),
    //             new OA\Property(
    //                 property: 'description',
    //                 type: 'object',
    //                 required: ['kk', 'uz', 'ru', 'en'],
    //                 properties: [
    //                     new OA\Property(property: 'kk', type: 'string', example: 'kk description'),
    //                     new OA\Property(property: 'uz', type: 'string', example: 'uz description'),
    //                     new OA\Property(property: 'ru', type: 'string', example: 'ru description'),
    //                     new OA\Property(property: 'en', type: 'string', example: 'en description'),
    //                 ]
    //             ),
    //             new OA\Property(property: 'start_time', type: 'string', format: 'date-time', example: '2025-06-01 10:30:00'),
    //             new OA\Property(property: 'location', type: 'string', example: '2-mektep sport zali'),
    //         ]
    //     )
    // )]
    // #[OA\Response(response: 200, description: 'Ta\'dbir a\'wmetli jan\'alandi')]
    // #[OA\Response(response: 404, description: 'ID li ta\'dbir tabilmadi!')]
    // #[OA\Response(response: 422, description: 'Validation error')]
    // public function update()
    // {
    //     //
    // }

    // #[OA\Delete(
    //     path: '/api/v1/events/delete/{id}',
    //     summary: 'Ta\'dbirdi o‘shiriw',
    //     description: 'ID boyinsha ta\'dbirdi o‘shiriw',
    //     tags: ['Event'],
    //     security: [['sanctum' => []]]
    // )]
    // #[OA\Parameter(
    //     name: 'id',
    //     in: 'path',
    //     required: true,
    //     description: 'O\'shiriletug\'in ta\'dbirdiń ID si',
    //     schema: new OA\Schema(type: 'integer'),
    //     example: 4
    // )]
    // #[OA\Response(response: 200, description: 'ID li ta\'dbir o‘shirildi!')]
    // #[OA\Response(response: 404, description: 'ID li ta\'dbir tabilmadi!')]
    public function delete()
    {
        //
    }
}
