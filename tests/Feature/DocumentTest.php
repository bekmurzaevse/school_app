<?php

namespace Tests\Feature;

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
                            'type',
                            'size',
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
        $document = Document::inRandomOrder()->first();
        $response = $this->getJson('/api/v1/documents/show/' . $document->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'type',
                    'size',
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
            'name' => [
                'en' => 'School Annual Report',
                'ru' => 'Ежегодный отчет школы',
                'uz' => 'Maktabning yillik hisobot',
                'kk' => "Mekteptin' jıllıq esabatı",
            ],
            'description' => [
                'en' => 'Annual report detailing the school achievements and activities.',
                'ru' => 'Ежегодный отчет, в котором подробно описаны достижения и мероприятия школы.',
                'uz' => 'Maktabning yillik hisobotida maktabning yutuqlari va faoliyati haqida ma\'lumot berilgan.',
                'kk' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen",
            ],
            'school_id' => 1,
            'category_id' => 1,
            'file' => $file
        ];

        $response = $this->postJson('/api/v1/documents/upload', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Document created',
        ]);
    }

    /**
     * Summary of test_documents_can_update
     * @return void
     */
    public function test_documents_can_update(): void
    {
        $documentId = Document::inRandomOrder()->first()->id;

        $file = UploadedFile::fake()->create('document_update.pdf', 1024, 'application/pdf');

        $data = [
            'name' => [
                'en' => 'School Annual Report update',
                'ru' => 'Ежегодный отчет школы update',
                'uz' => 'Maktabning yillik hisobot update',
                'kk' => "Mekteptin' jıllıq esabatı update",
            ],
            'description' => [
                'en' => 'Annual report detailing the school achievements and activities. update',
                'ru' => 'Ежегодный отчет, в котором подробно описаны достижения и мероприятия школы. update',
                'uz' => 'Maktabning yillik hisobotida maktabning yutuqlari va faoliyati haqida ma\'lumot berilgan. update',
                'kk' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen update",
            ],
            'school_id' => 1,
            'category_id' => 2,
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
                    'type',
                    'size',
                    'created_at',
                    'download_url',
                ]
            ]);
    }

    /**
     * Summary of test_documents_can_delete
     * @return void
     */
    public function test_documents_can_delete(): void
    {
        $documentId = Document::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/documents/delete/' . $documentId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Document Deleted',
            ]);
    }

    /**
     * Summary of test_documents_can_download
     * @return void
     */
    public function test_documents_can_download()
    {
        App::setLocale('en');

        $document = Document::find(1)->first();

        $response = $this->get("/api/v1/documents/download/" . $document->id);

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/pdf')
            ->assertHeader('Content-Disposition', 'attachment; filename="' . $document->name . '"');
    }
}