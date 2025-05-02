<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'name' => [
                'en' => 'Climate Change',
                'ru' => 'Изменение климата',
                'uz' => 'Iqlim o\'zgarishi',
                'kk' => 'Íqlım ózgeriwi',
            ],
            'description' => [
                'en' => 'News and analysis about the impacts and studies of climate change.',
                'ru' => 'Новости и аналитика о воздействии и исследованиях изменения климата.',
                'uz' => 'Iqlim o\'zgarishining ta\'siri va tadqiqotlari haqida yangiliklar va tahlillar.',
                'kk' => 'Íqlım ózgeriwiniń tásiri hám izertlewleri haqqında jańalıqlar hám analizler.',
            ],
        ]);

        Tag::create([
            'name' => [
                'en' => 'Russian Science',
                'ru' => 'Российская наука',
                'uz' => 'Rossiya fani',
                'kk' => 'Rossiya páni',
            ],
            'description' => [
                'en' => 'Updates and discoveries from the Russian scientific community.',
                'ru' => 'Новости и открытия от российского научного сообщества.',
                'uz' => 'Rossiya ilmiy hamjamiyatidan yangiliklar va kashfiyotlar.',
                'kk' => 'Rossiya ilimiy jámiyetshiliginen jańalıqlar hám jańa ashılıwlar.',
            ],
        ]);

        Tag::create([
            'name' => [
                'en' => 'UK Economy',
                'ru' => 'Экономика Великобритании',
                'uz' => 'Buyuk Britaniya iqtisodiyoti',
                'kk' => 'Ullı Britaniya ekonomikası',
            ],
            'description' => [
                'en' => 'News and analysis related to the economic situation in the United Kingdom.',
                'ru' => 'Новости и аналитика, связанные с экономической ситуацией в Соединенном Королевстве.',
                'uz' => 'Buyuk Britaniyadagi iqtisodiy vaziyat bilan bog\'liq yangiliklar va tahlillar.',
                'kk' => 'Ullı Britaniyadaǵı ekonomikalıq jaǵday menen baylanıslı jańalıqlar hám analizler.',
            ],
        ]);

        Tag::create([
            'name' => [
                'en' => 'Green Jobs',
                'ru' => 'Зеленые рабочие места',
                'uz' => 'Yashil ish o\'rinlari',
                'kk' => 'Jasıl jumıs orınların',
            ],
            'description' => [
                'en' => 'Information about employment opportunities in environmentally sustainable sectors.',
                'ru' => 'Информация о возможностях трудоустройства в экологически устойчивых секторах.',
                'uz' => 'Ekologik jihatdan barqaror sohalarda bandlik imkoniyatlari haqida ma\'lumot.',
                'kk' => 'Ekologiyalıq tárepten turaqlı tarawlarda bántlik múmkinshilikleri haqqında maǵlıwmat.',
            ],
        ]);

        Tag::create([
            'name' => [
                'en' => 'Digital Literacy',
                'ru' => 'Цифровая грамотность',
                'uz' => 'Raqamli savodxonlik',
                'kk' => 'Cifrlı sawatlılıq',
            ],
            'description' => [
                'en' => 'Articles and resources related to improving digital skills and knowledge.',
                'ru' => 'Статьи и ресурсы, связанные с повышением цифровых навыков и знаний.',
                'uz' => 'Raqamli ko\'nikmalar va bilimlarni oshirishga oid maqolalar va resurslar.',
                'kk' => 'Cifrlı kónlikpeler hám bilimlerdi asırıwǵa tiyisli maqalalar hám resurslar.',
            ],
        ]);

        Tag::create([
            'name' => [
                'en' => 'Uzbekistan Development',
                'ru' => 'Развитие Узбекистана',
                'uz' => 'O\'zbekiston taraqqiyoti',
                'kk' => 'Ózbekstan rawajlanıwı ',
            ],
            'description' => [
                'en' => 'News about the progress and initiatives in Uzbekistan.',
                'ru' => 'Новости о прогрессе и инициативах в Узбекистане.',
                'uz' => 'O\'zbekistondagi taraqqiyot va tashabbuslar haqida yangiliklar.',
                'kk' => 'Ózbekstandaǵı rawajlanıw hám baslamalar haqqında jańalıqlar.',
            ],
        ]);

    }
}
