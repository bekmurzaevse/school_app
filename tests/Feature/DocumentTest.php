<?php

namespace Tests\Feature;

use App\Models\Attachment;
use App\Models\Document;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Summary of setUp
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $user = User::find(1)->first();
        $this->actingAs($user);
    }

    /**
     * Summary of test_documents_can_get_all
     * @return void
     */
    public function test_documents_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/documents");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'name',
                            'path',
                            'type',
                            'size',
                            'description',
                            'created_at',
                            'download_url',
                        ]
                    ],
                    'pagination' => [
                        'current_page',
                        'per_page',
                        'last_page',
                        'total'
                    ]
                ]
            ]);
    }

    /**
     * Summary of test_documents_can_show
     * @return void
     */
    public function test_documents_can_show(): void
    {
        $document = Attachment::where('type', '=', 'document')->inRandomOrder()->first();

        $response = $this->getJson('/api/v1/documents/show/' . $document->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'path',
                    'type',
                    'size',
                    'description',
                    'created_at',
                    'download_url',
                ]
            ]);
    }

    /**
     * Summary of test_documents_can_upload
     * @return void
     */
    public function test_documents_can_upload(): void
    {
        $file = UploadedFile::fake()->create('document.pdf', 1024, 'application/pdf');

        $data = [
            'name' => "Mekteptin' jıllıq esabatı",
            'description' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen",
            'file' => $file
        ];

        $response = $this->postJson('/api/v1/documents/upload', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Document created',
        ]);

        $this->assertDatabaseHas('attachments', [
            'name' => "Mekteptin' jıllıq esabatı",
            'type' => 'document',
            'size' => $file->getSize(),
            'attachable_type' => 'App\Models\School',
            'attachable_id' => 1,
            'description' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen",
        ]);
    }

    /**
     * Summary of test_documents_can_update
     * @return void
     */
    public function test_documents_can_update(): void
    {
        $documentId = Attachment::where('type', '=', 'document')->inRandomOrder()->first()->id;

        $file = UploadedFile::fake()->create('document_update.pdf', 1024, 'application/pdf');

        $data = [
            'name' => "Mekteptin' jıllıq esabatı update",
            'description' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen update",
            'file' => $file
        ];

        $response = $this->putJson('/api/v1/documents/update/' . $documentId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'path',
                    'type',
                    'size',
                    'description',
                    'created_at',
                    'download_url',
                ]
            ]);

        $this->assertDatabaseHas('attachments', [
            'id' => $documentId,
            'name' => "Mekteptin' jıllıq esabatı update",
            'type' => 'document',
            'size' => $file->getSize(),
            'attachable_type' => 'App\Models\School',
            'attachable_id' => 1,
            'description' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen update",
        ]);
    }

    /**
     * Summary of test_documents_can_delete
     * @return void
     */
    public function test_documents_can_delete(): void
    {
        $documentId = Attachment::where('type', '=', 'document')->inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/documents/delete/' . $documentId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Document Deleted',
            ]);

        $this->assertSoftDeleted('attachments', [
            'id' => $documentId,
        ]);
    }

    /**
     * Summary of test_documents_can_download
     * @return void
     */
    public function test_documents_can_download()
    {
        $documentId = Attachment::where('type', '=', 'document')->inRandomOrder()->first()->id;

        $response = $this->get("/api/v1/documents/download/" . $documentId);

        $response->assertStatus(200);
    }
}