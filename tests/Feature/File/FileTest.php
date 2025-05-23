<?php

namespace Tests\Feature\File;

use App\Models\Event;
use App\Models\File;
use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Summary of test_file_index
     * @return void
     */
    public function test_file_can_get_all(): void
    {
        $this->seed();

        $user = User::find(1)->first();
        $this->actingAs($user);

        $response = $this->getJson('api/v1/files');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        '*' => [
                            'id',
                            'name',
                            'description',
                            'type',
                            'size',
                            'download_url',
                            'created_at',
                        ]
                    ],
                    'pagination' => [
                        'current_page',
                        'per_page',
                        'last_page',
                        'total',
                    ]
                ]
            ]);
    }

    /**
     * Summary of test_file_show
     * @return void
     */
    public function test_file_show(): void
    {
        $this->seed();

        $file = UploadedFile::fake()->create('example.txt', 100);

        $savedPath = Storage::disk('public')->putFileAs('files', $file, 'test');

        $data = [
            'name' => 'name',
            'event_id' => 1,
            'description' => 'description',
            'path' => $savedPath
        ];

        $fileId = File::inRandomOrder()->first()->id;

        $response = $this->getJson("/api/v1/files/" . $fileId);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'description',
                    'type',
                    'size',
                    'download_url',
                    'created_at',
                ]
            ]);
    }

    /**
     * Summary of test_file_upload
     * @return void
     */
    public function test_file_can_upload(): void
    {
        $this->seed();

        Storage::fake('public');

        $file = UploadedFile::fake()->create('school.pdf', 100);

        $user = User::find(1)->first();
        $this->actingAs($user);

        $data = [
            'name' => [
                'en' => 'Science Project Report',
                'ru' => 'Отчет о научном проекте',
                'uz' => 'Fan loyihasi hisobot',
                'kk' => "Pa'n joybarı esabatı",
            ],
            'description' => [
                'en' => 'Report for the science project of the school science fair',
                'ru' => 'Отчет о научном проекте для школьной научной ярмарки',
                'uz' => 'Maktab fan ko‘rgazmasi uchun fan loyihasi hisobot',
                'kk' => "Mektep pa'n ko'rgizbesi ushın pa'n joybarı esabatı",
            ],
            'event_id' => 1,
            'file' => $file,
        ];

        $response = $this->post('/api/v1/files/upload', $data);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'File uploaded successfully',
            ]);

        // $path = 'files/' . $file->name;
        // $this->assertTrue(Storage::disk('public')->exists($path));
    }

    /**
     * Summary of test_file_update
     * @return void
     */
    public function test_file_can_update(): void
    {
        $this->seed();

        Storage::fake('public');

        $user = User::find(1)->first();
        $this->actingAs($user);

        $oldFile = UploadedFile::fake()->create('oldfile.pdf', 100);
        $oldFilePath = Storage::disk('public')->putFileAs('files', $oldFile, 'oldfile.pdf');

        $file = File::inRandomOrder()->first();

        $newFile = UploadedFile::fake()->create('newfile.pdf', 200);

        $updateData = [
            'name' => [
                'en' => 'New Name',
                'ru' => 'Новое имя',
                'uz' => 'Yangi nom',
                'kk' => "Jan'a atı",
            ],
            'description' => [
                'en' => 'Updated description',
                'ru' => 'Обновленное описание',
                'uz' => 'Yangilangan tavsif',
                'kk' => "Jan'alang'an bayannama",
            ],
            'event_id' => 1,
            'file' => $newFile,
        ];

        $response = $this->put("api/v1/files/update/{$file->id}", $updateData);


        $response->assertStatus(200)
            ->assertJson([
                'message' => 'File Updated',
            ]);
    }

    /**
     * Summary of test_deletes_file
     * @return void
     */
    public function test_file_can_delete()
    {
        $this->seed();

        Storage::fake('public');

        $user = User::find(1)->first();
        $this->actingAs($user);

        $uploadedFile = UploadedFile::fake()->create('test.pdf', 100, 'application/pdf');
        $filePath = $uploadedFile->store('files', 'public');

        $file = File::inRandomOrder()->first();

        $response = $this->deleteJson("api/v1/files/delete/{$file->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'message' => "{$file->id} - id li fayl o'shirildi!"
        ]);
    }
}
