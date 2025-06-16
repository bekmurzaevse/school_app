<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class FileController extends Controller
{

    // #[OA\Get(
    //     path: '/api/v1/files',
    //     summary: "Barliq fayllar dizimi",
    //     description: "Fayllardi aliw",
    //     tags: ["File"]
    // )]
    // #[OA\Response(response: 200, description: "Fayllar dizimi")]
    // #[OA\Response(response: 404, description: "Fayllar tabilmadi")]
    // public function index()
    // {
    //     //
    // }

    // #[OA\Post(
    //     path: '/api/v1/files/upload',
    //     summary: "Fayl ju'klew",
    //     description: "Jan'a fayl ju'klew",
    //     tags: ["File"],
    //     security: [['sanctum' => []]]
    // )]
    // #[OA\RequestBody(
    //     required: true,
    //     description: "Fayl ju'klew ushin kerekli mag'liwmatlar",
    //     content: new OA\MediaType(
    //         mediaType: "multipart/form-data",
    //         schema: new OA\Schema(
    //             type: "object",
    //             required: ["file", "name[kk]", "name[uz]", "name[ru]", "name[en]"],
    //             properties: [
    //                 new OA\Property(property: "name[kk]", type: "string", example: "Fayl ati KK"),
    //                 new OA\Property(property: "name[uz]", type: "string", example: "Fayl nomi UZ"),
    //                 new OA\Property(property: "name[ru]", type: "string", example: "Название файла RU"),
    //                 new OA\Property(property: "name[en]", type: "string", example: "File name EN"),

    //                 new OA\Property(property: "description[kk]", type: "string", example: "Description KK"),
    //                 new OA\Property(property: "description[uz]", type: "string", example: "Tavsif UZ"),
    //                 new OA\Property(property: "description[ru]", type: "string", example: "Описание RU"),
    //                 new OA\Property(property: "description[en]", type: "string", example: "Description EN"),

    //                 new OA\Property(property: "event_id", type: "integer", example: 5, description: "Event ID "),

    //                 new OA\Property(property: "file", type: "string", format: "binary", description: "Ju'klenetug'in fayl (pdf, docx, jpg, png)"),
    //             ]
    //         )
    //     )
    // )]
    // #[OA\Response(response: 200, description: "Fayl a'wmetli ju'klendi")]
    // #[OA\Response(response: 401, description: "Avtorizatsiya talap etiledi")]
    // #[OA\Response(response: 422, description: "Validation error")]
    // public function upload()
    // {
    //     //
    // }

    // #[OA\Get(
    //     path: '/api/v1/files/{id}',
    //     summary: "Fayldi ID arqali aliw",
    //     tags: ["File"]
    // )]
    // #[OA\Parameter(
    //     name: "id",
    //     in: "path",
    //     required: true,
    //     description: "Fayldin' ID si arqali aliw",
    //     example: 1
    // )]
    // #[OA\Response(response: 200, description: "Fayl a'wmetli alindi")]
    // #[OA\Response(response: 404, description: "Fayl tabilmadi")]
    // public function show()
    // {
    //     //
    // }

    // #[OA\Post(path: "/api/v1/files/update/{id}", summary: "Faylni janalaw", tags: ["File"], security: [["sanctum" => []]])]
    // #[OA\RequestBody(
    //     required: true,
    //     content: new OA\MediaType(
    //         mediaType: "multipart/form-data",
    //         schema: new OA\Schema(
    //             required: ["name[kk]", "name[uz]", "name[ru]", "name[en]", "event_id", "description[kk]", "description[uz]", "description[ru]", "description[en]", "file"],
    //             properties: [
    //                 new OA\Property(property: "name[kk]", type: "string", example: "Fayl ati KK"),
    //                 new OA\Property(property: "name[uz]", type: "string", example: "Fayl nomi UZ"),
    //                 new OA\Property(property: "name[ru]", type: "string", example: "Название файла RU"),
    //                 new OA\Property(property: "name[en]", type: "string", example: "File name EN"),
    //                 new OA\Property(property: "event_id", type: "integer", example: 5, description: "Event ID"),
    //                 new OA\Property(property: "description[kk]", type: "string", example: "Description KK"),
    //                 new OA\Property(property: "description[uz]", type: "string", example: "Tavsif UZ"),
    //                 new OA\Property(property: "description[ru]", type: "string", example: "Описание RU"),
    //                 new OA\Property(property: "description[en]", type: "string", example: "Description EN"),
    //                 new OA\Property(property: "file", type: "string", format: "binary", description: "Ju'klenetug'in fayl (pdf, docx, jpg, png)"),
    //                 new OA\Property(property: "_method", type: "string", enum: ["PUT"], example: "PUT", nullable: false, ),
    //             ]
    //         ),
    //     )
    // )]
    // #[OA\Parameter(name: "id", in: "path", required: true, description: "Fayl ID si arqali jan'alaw", example: 3)]
    // #[OA\Response(response: 200, description: "Fayl a'wmetli janalandi")]
    // #[OA\Response(response: 404, description: "Fayl tabilmadi")]
    // #[OA\Response(response: 422, description: "Validation error")]
    // #[OA\Response(response: 500, description: "Ishki server qate")]
    // public function update()
    // {
    //     //
    // }

    // #[OA\Delete(
    //     path: "/api/v1/files/delete/{id}",
    //     summary: "Fayldı óshiriw",
    //     description: "Berilgen ID boyınsha fayldı óshiredi",
    //     operationId: "deleteFile",
    //     tags: ["File"],
    //     security: [["sanctum" => []]]
    // )]
    // #[OA\Parameter(
    //     name: "id",
    //     in: "path",
    //     required: true,
    //     description: "Óshiriletuǵın fayl IDsi",
    //     schema: new OA\Schema(type: "integer")
    // )]
    // #[OA\Response(response: 200, description: "Fayl a'wmetli o'shirildi")]
    // #[OA\Response(response: 401, description: "Avtorizatsiya kerek")]
    // #[OA\Response(response: 404, description: "Fayl tabilmadi")]
    // public function delete()
    // {
    //     //
    // }
}
