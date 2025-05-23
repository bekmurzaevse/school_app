<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class FileController extends Controller
{

    #[OA\Get(
        path: '/api/v1/files',
        summary: "Barliq fayllar dizimi",
        description: "Fayllardi aliw",
        tags: ["File"]
    )]
    #[OA\Response(response: 200, description: "Fayllar dizimi")]
    #[OA\Response(response: 404, description: "Fayllar tabilmadi")]
    public function index()
    {
        //      
    }
    #[OA\Post(
        path: '/api/v1/files/upload',
        summary: "Fayl ju'klew",
        description: "Jan'a fayl ju'klew",
        tags: ["File"],
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Fayl ju'klew ushin kerekli mag'liwmatlar",
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                type: "object",
                required: ["file", "name[kk]", "name[uz]", "name[ru]", "name[en]"],
                properties: [
                    new OA\Property(property: "name[kk]", type: "string", example: "Fayl ati KK"),
                    new OA\Property(property: "name[uz]", type: "string", example: "Fayl nomi UZ"),
                    new OA\Property(property: "name[ru]", type: "string", example: "Название файла RU"),
                    new OA\Property( property: "name[en]", type: "string", example: "File name EN"),
    
                    new OA\Property(property: "description[kk]", type: "string", example: "Description KK"),
                    new OA\Property(property: "description[uz]", type: "string", example: "Tavsif UZ"),
                    new OA\Property(property: "description[ru]", type: "string", example: "Описание RU"),
                    new OA\Property(property: "description[en]", type: "string", example: "Description EN"),
    
                    new OA\Property(property: "event_id", type: "integer", example: 5, description: "Event ID "),
    
                    new OA\Property(property: "file", type: "string", format: "binary", description: "Ju'klenetug'in fayl (pdf, docx, jpg, png)"),
                ]
            )
        )
    )]
    #[OA\Response(response: 200, description: "Fayl a'wmetli ju'klendi")]
    #[OA\Response(response: 401, description: "Avtorizatsiya talap etiledi")]
    #[OA\Response(response: 422, description: "Validation error")]
    public function upload()
    {
        //
    }

    #[OA\Get(
        path: '/api/v1/files/{id}',
        summary: "Fayldi ID arqali aliw",
        tags: ["File"]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "Fayldin' ID si arqali aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: "Fayl a'wmetli alindi")]
    #[OA\Response( response: 404, description: "Fayl tabilmadi")]
    public function show()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/files/update/{id}',
        summary: "Fayldi jan'alaw",
        description: "Bul fayldi jan'alaw ushin endpoint",
        tags: ["File"],
        security: [['sanctum' => []]]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "Ju'kleniw kerek bolg'an fayldin' ID si",
        example: 1
    )]
    #[OA\RequestBody(
        required: true,
        description: "Fayl jan'alaw ushin kerekli mag'liwmatlar",
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                type: "object",
                required: ["name", "file", "event_id"],
                properties: [
                    new OA\Property(property: "name[kk]", type: "string", example: "Fayl ati KK"),
                    new OA\Property(property: "name[uz]", type: "string", example: "Fayl nomi UZ"),
                    new OA\Property(property: "name[ru]", type: "string", example: "Название файла RU"),
                    new OA\Property( property: "name[en]", type: "string", example: "File name EN"),
    
                    new OA\Property(property: "description[kk]", type: "string", example: "Description KK"),
                    new OA\Property(property: "description[uz]", type: "string", example: "Tavsif UZ"),
                    new OA\Property(property: "description[ru]", type: "string", example: "Описание RU"),
                    new OA\Property(property: "description[en]", type: "string", example: "Description EN"),
    
                    new OA\Property(property: "event_id", type: "integer", example: 5, description: "Event ID "),
    
                    new OA\Property(property: "file", type: "string", format: "binary", description: "Ju'klenetug'in fayl (pdf, docx, jpg, png)"),
                ]
            )
        )
    )]
    #[OA\Response(response: 200, description: "Fayl a'wmetli jan'alandi")]
    #[OA\Response(response: 401, description: "Avtorizatsiya kerek")]
    #[OA\Response(response: 404, description: "Fayl tabilmadi")]
    #[OA\Response(response: 422, description: "Validation error")]
    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
}