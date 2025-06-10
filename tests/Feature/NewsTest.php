<?php

namespace Tests\Feature;

use App\Helpers\FileUploadHelper;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_news_can_get_all
     * @return void
     */
    public function test_news_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/news");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'title',
                            'short_content',
                            'content',
                            'author',
                            'cover_image',
                            'tags',
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
     * Summary of test_news_can_show
     * @return void
     */
    public function test_news_can_show(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $newsId = News::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/news/' . $newsId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'short_content',
                    'content',
                    'author',
                    'cover_image',
                    'tags',
                ]
            ]);
    }

    /**
     * Summary of test_news_can_create
     * @return void
     */
    public function test_news_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $photo = UploadedFile::fake()->image('news1.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $data = [
            'title' => [
                'en' => 'Local Artist Unveils Stunning New Exhibition',
                'ru' => 'Местный художник представляет потрясающую новую выставку',
                'uz' => 'Mahalliy rassom hayratlanarli yangi ko\'rgazmasini ochdi',
                'kk' => 'Jergilikli súwretshi tańlanıwlanarli jańa kórgezmesin ashtı.',
            ],
            'short_content' => [
                'en' => 'An exhibition featuring the latest works of Nukus-based artist, Aybek Muratov, has opened at the Regional Museum of Art.',
                'ru' => 'В Региональном музее искусств открылась выставка, представляющая последние работы нукусского художника Айбека Муратова.',
                'uz' => 'Nukuslik rassom Aybek Muratovning so\'nggi asarlari namoyishi Viloyat san\'at muzeyida ochildi.',
                'kk' => 'Nókislik súwretshi Aybek Muratovning sońǵı dóretpeleri kórgezbesi wálayat kórkem óner muzeyinde ashıldı.',
            ],
            'content' => [
                'en' => 'Aybek Muratov\'s new collection, titled \'Echoes of the Aral,\' explores the themes of environmental change and cultural resilience through vibrant paintings and intricate sculptures. The exhibition showcases his unique artistic vision and his deep connection to the region\'s history and landscape. Visitors can experience a powerful visual narrative that blends traditional motifs with contemporary techniques. The exhibition will run until the end of next month.',
                'ru' => 'Новая коллекция Айбека Муратова под названием \'Эхо Арала\' исследует темы экологических изменений и культурной устойчивости через яркие картины и замысловатые скульптуры. Выставка демонстрирует его уникальное художественное видение и глубокую связь с историей и ландшафтом региона. Посетители могут увидеть мощное визуальное повествование, сочетающее традиционные мотивы с современными техниками. Выставка продлится до конца следующего месяца.',
                'uz' => 'Aybek Muratovning \'Orol sadosi\' deb nomlangan yangi to\'plami yorqin rasmlar va murakkab haykallar orqali ekologik o\'zgarishlar va madaniy barqarorlik mavzularini o\'rganadi. Ko\'rgazma uning noyob badiiy qarashlari va mintaqa tarixi va landshafti bilan chuqur bog\'liqligini namoyish etadi. Tashrif buyuruvchilar an\'anaviy naqshlarni zamonaviy texnikalar bilan uyg\'unlashtirgan kuchli vizual hikoyani boshdan kechirishlari mumkin. Ko\'rgazma kelasi oyning oxirigacha davom etadi.',
                'kk' => 'Aybek Muratovning \'Aral sadosi\' dep atalǵan jańa kompleksi jaqtı súwretler hám quramalı háykeller arqalı ekologiyalıq ózgerisler hám mádeniy turaqlılıq temaların úyrenedi. Kórgezbe onıń kem ushraytuǵın kórkem qarawları hám region tariyxı hám landshaftı menen tereń baylanıslılıǵın kórsetip beredi. Keliwshiler dástúriy naǵıslardı zamanagóy texnikaler menen uyqaslastırǵan kúshli vizual gúrrińni basdan keshirimleri múmkin. Kórgezbe kelesi aynıń aqırıǵa shekem dawam etedi.',
            ],
            'author_id' => auth()->user()->id,
            'cover_image' => $photo
        ];

        $response = $this->postJson('/api/v1/news/create', $data);

        $news1 = News::latest()->first();
        $news1->coverImage()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'News created',
        ]);

        $this->assertDatabaseHas('news', [
            'title->en' => $data['title']['en'],
            'title->ru' => $data['title']['ru'],
            'title->uz' => $data['title']['uz'],
            'title->kk' => $data['title']['kk'],
            'short_content->en' => $data['short_content']['en'],
            'short_content->ru' => $data['short_content']['ru'],
            'short_content->uz' => $data['short_content']['uz'],
            'short_content->kk' => $data['short_content']['kk'],
            'content->ru' => $data['content']['ru'],
            'content->uz' => $data['content']['uz'],
            'content->kk' => $data['content']['kk'],
            'content->en' => $data['content']['en'],
            'author_id' => auth()->user()->id,
        ]);
    }

    /**
     * Summary of test_news_can_update
     * @return void
     */
    public function test_news_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $news = News::inRandomOrder()->first();

        $photo = UploadedFile::fake()->image('news1New.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $data = [
            'title' => [
                'en' => 'Local Artist Unveils Stunning New Exhibition',
                'ru' => 'Местный художник представляет потрясающую новую выставку',
                'uz' => 'Mahalliy rassom hayratlanarli yangi ko\'rgazmasini ochdi',
                'kk' => 'Jergilikli súwretshi tańlanıwlanarli jańa kórgezmesin ashtı.',
            ],
            'short_content' => [
                'en' => 'An exhibition featuring the latest works of Nukus-based artist, Aybek Muratov, has opened at the Regional Museum of Art.',
                'ru' => 'В Региональном музее искусств открылась выставка, представляющая последние работы нукусского художника Айбека Муратова.',
                'uz' => 'Nukuslik rassom Aybek Muratovning so\'nggi asarlari namoyishi Viloyat san\'at muzeyida ochildi.',
                'kk' => 'Nókislik súwretshi Aybek Muratovning sońǵı dóretpeleri kórgezbesi wálayat kórkem óner muzeyinde ashıldı.',
            ],
            'content' => [
                'en' => 'Aybek Muratov\'s new collection, titled \'Echoes of the Aral,\' explores the themes of environmental change and cultural resilience through vibrant paintings and intricate sculptures. The exhibition showcases his unique artistic vision and his deep connection to the region\'s history and landscape. Visitors can experience a powerful visual narrative that blends traditional motifs with contemporary techniques. The exhibition will run until the end of next month.',
                'ru' => 'Новая коллекция Айбека Муратова под названием \'Эхо Арала\' исследует темы экологических изменений и культурной устойчивости через яркие картины и замысловатые скульптуры. Выставка демонстрирует его уникальное художественное видение и глубокую связь с историей и ландшафтом региона. Посетители могут увидеть мощное визуальное повествование, сочетающее традиционные мотивы с современными техниками. Выставка продлится до конца следующего месяца.',
                'uz' => 'Aybek Muratovning \'Orol sadosi\' deb nomlangan yangi to\'plami yorqin rasmlar va murakkab haykallar orqali ekologik o\'zgarishlar va madaniy barqarorlik mavzularini o\'rganadi. Ko\'rgazma uning noyob badiiy qarashlari va mintaqa tarixi va landshafti bilan chuqur bog\'liqligini namoyish etadi. Tashrif buyuruvchilar an\'anaviy naqshlarni zamonaviy texnikalar bilan uyg\'unlashtirgan kuchli vizual hikoyani boshdan kechirishlari mumkin. Ko\'rgazma kelasi oyning oxirigacha davom etadi.',
                'kk' => 'Aybek Muratovning \'Aral sadosi\' dep atalǵan jańa kompleksi jaqtı súwretler hám quramalı háykeller arqalı ekologiyalıq ózgerisler hám mádeniy turaqlılıq temaların úyrenedi. Kórgezbe onıń kem ushraytuǵın kórkem qarawları hám region tariyxı hám landshaftı menen tereń baylanıslılıǵın kórsetip beredi. Keliwshiler dástúriy naǵıslardı zamanagóy texnikaler menen uyqaslastırǵan kúshli vizual gúrrińni basdan keshirimleri múmkin. Kórgezbe kelesi aynıń aqırıǵa shekem dawam etedi.',
            ],
            'author_id' => auth()->user()->id,
            'cover_image' => $photo
        ];

        if (Storage::disk('public')->exists($news->coverImage->path)) {
            Storage::disk('public')->delete($news->coverImage->path);
        }

        $response = $this->putJson('/api/v1/news/update/' . $news->id, $data);

        $news->coverImage()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'short_content',
                    'content',
                    'author',
                    'cover_image',
                    'tags',
                ]
            ]);

        $this->assertDatabaseHas('news', [
            'id' => $news->id,
            'title->en' => $data['title']['en'],
            'title->ru' => $data['title']['ru'],
            'title->uz' => $data['title']['uz'],
            'title->kk' => $data['title']['kk'],
            'short_content->en' => $data['short_content']['en'],
            'short_content->ru' => $data['short_content']['ru'],
            'short_content->uz' => $data['short_content']['uz'],
            'short_content->kk' => $data['short_content']['kk'],
            'content->ru' => $data['content']['ru'],
            'content->uz' => $data['content']['uz'],
            'content->kk' => $data['content']['kk'],
            'content->en' => $data['content']['en'],
            'author_id' => auth()->user()->id,
        ]);
    }

    /**
     * Summary of test_news_can_delete
     * @return void
     */
    public function test_news_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $newsId = News::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/news/delete/' . $newsId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'News Deleted',
            ]);

        $this->assertSoftDeleted('news', [
            'id' => $newsId,
        ]);
    }
}
