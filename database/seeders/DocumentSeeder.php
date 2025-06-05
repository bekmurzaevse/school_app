<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = UploadedFile::fake()->create('school_3O.pdf', 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('documents', $file, $fileName);
        
        Attachment::create([
            'name' => "Mekteptin' jıllıq esabatı",
            'path' => $path,
            'type' => 'document',
            'size' => $file->getSize(),
            'attachable_type' => School::class,
            'attachable_id' => 1,
            'description' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $file = UploadedFile::fake()->create('school_31.pdf', 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('documents', $file, $fileName);
        
        Attachment::create([
            'name' => "Oqıtıw joybarı",
            'path' => $path,
            'type' => 'document',
            'size' => $file->getSize(),
            'attachable_type' => School::class,
            'attachable_id' => 1,
            'description' =>  "Mektep oqıtıw rejesi boyınsha hu'jjet",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
