<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
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
                'en' => 'Aybek Muratov\'s new collection, titled \"Echoes of the Aral,\" explores the themes of environmental change and cultural resilience through vibrant paintings and intricate sculptures. The exhibition showcases his unique artistic vision and his deep connection to the region\'s history and landscape. Visitors can experience a powerful visual narrative that blends traditional motifs with contemporary techniques. The exhibition will run until the end of next month.',
                'ru' => 'Новая коллекция Айбека Муратова под названием \"Эхо Арала\" исследует темы экологических изменений и культурной устойчивости через яркие картины и замысловатые скульптуры. Выставка демонстрирует его уникальное художественное видение и глубокую связь с историей и ландшафтом региона. Посетители могут увидеть мощное визуальное повествование, сочетающее традиционные мотивы с современными техниками. Выставка продлится до конца следующего месяца.',
                'uz' => 'Aybek Muratovning \"Orol sadosi\" deb nomlangan yangi to\'plami yorqin rasmlar va murakkab haykallar orqali ekologik o\'zgarishlar va madaniy barqarorlik mavzularini o\'rganadi. Ko\'rgazma uning noyob badiiy qarashlari va mintaqa tarixi va landshafti bilan chuqur bog\'liqligini namoyish etadi. Tashrif buyuruvchilar an\'anaviy naqshlarni zamonaviy texnikalar bilan uyg\'unlashtirgan kuchli vizual hikoyani boshdan kechirishlari mumkin. Ko\'rgazma kelasi oyning oxirigacha davom etadi.',
                'kk' => 'Aybek Muratovning \"Aral sadosi\" dep atalǵan jańa kompleksi jaqtı súwretler hám quramalı háykeller arqalı ekologiyalıq ózgerisler hám mádeniy turaqlılıq temaların úyrenedi. Kórgezbe onıń kem ushraytuǵın kórkem qarawları hám region tariyxı hám landshaftı menen tereń baylanıslılıǵın kórsetip beredi. Keliwshiler dástúriy naǵıslardı zamanagóy texnikaler menen uyqaslastırǵan kúshli vizual gúrrińni basdan keshirimleri múmkin. Kórgezbe kelesi aynıń aqırıǵa shekem dawam etedi.',
            ],
            'author_id' => 1,
            'cover_image' => 1
        ]);

        News::create([
            'title' => [
                'en' => 'Russian Scientists Develop New Arctic Research Station',
                'ru' => 'Российские ученые разрабатывают новую арктическую исследовательскую станцию',
                'uz' => 'Rossiyalik olimlar Arktikada yangi tadqiqot stantsiyasini ishlab chiqmoqdalar',
                'kk' => 'Rossiyalıq ilimpazlar Arktikada jańa izertlew stanciyasın islep shıǵıp atırlar',
            ],
            'short_content' => [
                'en' => 'A state-of-the-art research complex is being built to study the changing Arctic environment.',
                'ru' => 'Строится современный исследовательский комплекс для изучения меняющейся арктической среды.',
                'uz' => 'O\'zgarayotgan Arktika muhitini o\'rganish uchun zamonaviy tadqiqot majmuasi qurilmoqda.',
                'kk' => 'Ózgerip atırǵan Arktika ortalıǵın úyreniw ushın zamanagóy izertlew kompleksi qurılıp atır..',
            ],
            'content' => [
                'en' => 'Russian scientists have announced the development of \"Sever-2025,\" a new advanced research station designed to enhance their understanding of the Arctic region. Equipped with cutting-edge technology, the station will facilitate long-term monitoring of climate change impacts, permafrost thaw, and Arctic biodiversity. The project underscores Russia\'s commitment to scientific exploration in this critical and rapidly evolving environment. Construction is expected to be completed by the end of 2025.',
                'ru' => 'Российские ученые объявили о разработке \"Север-2025\" - новой передовой исследовательской станции, предназначенной для углубления их понимания Арктического региона. Оснащенная передовыми технологиями, станция обеспечит долгосрочный мониторинг воздействия изменения климата, таяния вечной мерзлоты и арктического биоразнообразия. Проект подчеркивает приверженность России научным исследованиям в этой критически важной и быстро меняющейся среде. Строительство планируется завершить к концу 2025 года.',
                'uz' => 'Rossiyalik olimlar Arktika mintaqasini chuqurroq tushunishga qaratilgan "Sever-2025" nomli yangi ilg\'or tadqiqot stantsiyasini ishlab chiqarayotganliklarini e\'lon qildilar. Zamonaviy texnologiyalar bilan jihozlangan stantsiya iqlim o\'zgarishi ta\'sirini, abadiy muzloqlarning erishini va Arktika bioxilma-xilligini uzoq muddatli monitoring qilishni osonlashtiradi. Loyiha Rossiyaning ushbu muhim va tez o\'zgaruvchan muhitda ilmiy izlanishlarga sodiqligini ta\'kidlaydi. Qurilish 2025-yilning oxiriga qadar yakunlanishi kutilmoqda.',
                'kk' => 'Rossiyalıq ilimpazlar Arktika regionin tereńrek túsiniwge qaratılǵan \"Sever-2025\" atlı jańa aldıńǵı izertlew stanciyasın islep shıǵarayotganliklarini járiyaladılar. Zamanagóy texnologiyalar menen úskenelestirilgen stanciya ıqlım ózgeriwi tásirin, máńgi tońlıqlardıń eriwin hám Arktika bioxilma-xilligini uzaq múddetli monıtorıń qılıwdı ańsatlastıradı. Joybar Rossiyanıń bul zárúrli hám tez ózgeriwshen ortalıqta ilimiy izertlewlerge óziniń jaqlaytuǵinliǵin aytıp otedi. Qurılıs 2025-jıldıń aqırına shekem juwmaqlanıwı kútilip atır.',
            ],
            'author_id' => 1,
            'cover_image' => 2
        ]);

        News::create([
            'title' => [
                'en' => 'England Announces New Investment in Renewable Energy Sector',
                'ru' => 'Англия объявляет о новых инвестициях в сектор возобновляемой энергетики',
                'uz' => 'Angliya qayta tiklanuvchi energiya sohasiga yangi investitsiyalar kiritilishini e\'lon qildi',
                'kk' => 'Angliya qayta tikleniwshi energiya tarawına jańa investitsiyalar kiritiliwin járiyaladı',
            ],
            'short_content' => [
                'en' => 'The government has unveiled a significant funding package to boost wind and solar power projects across the country.',
                'ru' => 'Правительство объявило о значительном пакете финансирования для поддержки проектов в области ветровой и солнечной энергетики по всей стране.',
                'uz' => 'Hukumat mamlakat bo\'ylab shamol va quyosh energiyasi loyihalarini qo\'llab-quvvatlash uchun muhim moliyalashtirish paketini e\'lon qildi.',
                'kk' => 'Húkimet mámleket boylap samal hám quyash energiyası joybarların qollap-quwatlaw ushın zárúrli finanslıq támiynlew paketin járiyaladı.',
            ],
            'content' => [
                'en' => 'In a bid to meet its ambitious climate goals, the English government has pledged a multi-billion pound investment in the renewable energy sector. The funding will be allocated to the development of offshore wind farms, large-scale solar power plants, and research into innovative energy storage solutions. Prime Minister Rishi Sunak stated that this investment will not only help the UK achieve net-zero emissions but also create thousands of green jobs and enhance energy security. Several projects are already in the planning stages, with construction expected to begin in the next fiscal year.',
                'ru' => 'Стремясь к достижению своих амбициозных климатических целей, правительство Англии выделило многомиллиардные инвестиции в сектор возобновляемой энергетики. Финансирование будет направлено на развитие морских ветряных электростанций, крупных солнечных электростанций и исследования в области инновационных решений для хранения энергии. Премьер-министр Риши Сунак заявил, что эти инвестиции не только помогут Великобритании достичь нулевых выбросов, но и создадут тысячи "зеленых" рабочих мест и повысят энергетическую безопасность. Несколько проектов уже находятся на стадии планирования, и строительство планируется начать в следующем финансовом году.',
                'uz' => 'Angliya hukumati o\'zining ambitsiyali iqlimiy maqsadlariga erishish maqsadida qayta tiklanuvchi energiya sohasiga ko\'p milliard funt sterling miqdorida investitsiya kiritishga va\'da berdi. Mablag\'lar dengiz shamol fermalarini, yirik quyosh elektr stantsiyalarini rivojlantirishga va innovatsion energiya saqlash yechimlarini tadqiq qilishga yo\'naltiriladi. Bosh vazir Rishi Sunakning ta\'kidlashicha, bu investitsiyalar Buyuk Britaniyaga nafaqat nol emissiyaga erishishga yordam beradi, balki minglab \"yashil\" ish o\'rinlari yaratadi va energiya xavfsizligini oshiradi. Bir nechta loyihalar allaqachon rejalashtirish bosqichida, qurilish kelgusi moliya yilida boshlanishi kutilmoqda.',
                'kk' => 'Angliya húkimeti óziniń ambitsiyali ıqlımlıq maqsetlerine erisiw maqsetinde qayta tikleniwshi energiya tarawına kóp milliard funt sterling muǵdarında investitsiya kirgiziwge wáde berdi. Aqshalar teńiz samal fermaların, iri quyash elektr stanciyaların rawajlandırıwǵa hám innovciyalıq energiya saqlaw sheshimlerin izertlewge joo\'neltirildi. Bas ministr Rishi Sunakning atap ótiwishe, bul investitsiyalar Ullı Britaniyaǵa tekǵana nol emissiyaga erisiwge járdem beredi, bálki mińlaǵan \"jasıl\" jumıs orınların jaratadı hám energiya qawipsizligin asıradı. Bir neshe joybarlar qashannan berli joybarlaw basqıshında, qurılıs kelesi finans jılında baslanıwı kútilip atır.',
            ],
            'author_id' => 2,
            'cover_image' => 3
        ]);

        News::create([
            'title' => [
                'en' => 'Uzbekistan Launches National Program for Digital Literacy',
                'ru' => 'В Узбекистане запускается национальная программа по цифровой грамотности',
                'uz' => 'O\'zbekistonda raqamli savodxonlik bo\'yicha milliy dastur ishga tushirildi',
                'kk' => 'Ózbekstanda cifrlı sawatlılıq boyınsha milliy programma jumısqa tusirildi',
            ],
            'short_content' => [
                'en' => 'A nationwide initiative aims to equip citizens with essential digital skills for the 21st century.',
                'ru' => 'Общенациональная инициатива направлена на то, чтобы обеспечить граждан необходимыми цифровыми навыками для XXI века.',
                'uz' => 'Umummilliy tashabbus fuqarolarni XXI asr uchun zarur bo\'lgan raqamli ko\'nikmalar bilan ta\'minlashga qaratilgan.',
                'kk' => 'Ulıwma milliy baslama puqaralardı XXI ásir ushın zárúr bolǵan cifrlı kónlikpeler menen támiyinlewge qaratılǵan.',
            ],
            'content' => [
                'en' => 'The government of Uzbekistan has announced a comprehensive national program to enhance digital literacy among its population. The initiative, titled \"Digital Future for All,\" will offer free training courses and resources across the country, focusing on basic computer skills, internet usage, online safety, and digital communication. President Shavkat Mirziyoyev emphasized the importance of digital literacy for the nation\'s economic development and the empowerment of its citizens in the modern world. The program will be implemented in partnership with educational institutions and technology companies, with the goal of reaching millions of Uzbek citizens over the next five years.',
                'ru' => 'Правительство Узбекистана объявило о всеобъемлющей национальной программе по повышению цифровой грамотности среди населения. Инициатива под названием \"Цифровое будущее для всех\" предложит бесплатные учебные курсы и ресурсы по всей стране, с акцентом на базовые компьютерные навыки, использование интернета, онлайн-безопасность и цифровую коммуникацию. Президент Шавкат Мирзиёев подчеркнул важность цифровой грамотности для экономического развития страны и расширения прав и возможностей ее граждан в современном мире. Программа будет реализована в партнерстве с образовательными учреждениями и технологическими компаниями с целью охвата миллионов граждан Узбекистана в течение следующих пяти лет.',
                'uz' => 'O\'zbekiston hukumati aholi o\'rtasida raqamli savodxonlikni oshirish bo\'yicha keng qamrovli milliy dasturni e\'lon qildi. "Hamma uchun raqamli kelajak" deb nomlangan tashabbus mamlakat bo\'ylab bepul o\'quv kurslari va resurslarini taklif etadi, bunda kompyuterning asosiy ko\'nikmalari, internetdan foydalanish, onlayn xavfsizlik va raqamli aloqa kabi yo\'nalishlarga e\'tibor qaratiladi. Prezident Shavkat Mirziyoyev mamlakatning iqtisodiy rivojlanishi va zamonaviy dunyoda fuqarolarining imkoniyatlarini kengaytirish uchun raqamli savodxonlikning muhimligini ta\'kidladi. Dastur ta\'lim muassasalari va texnologiya kompaniyalari bilan hamkorlikda amalga oshiriladi va kelgusi besh yil ichida millionlab o\'zbekistonliklarni qamrab olish maqsad qilingan.',
                'kk' => 'Ózbekstan húkimeti xalıq arasında cifrlı sawatlılıqtı asırıw boyınsha keń qamtılǵan milliy programmanı járiyaladı. \"Hámme ushın cifrlı keleshek\" dep atalǵan baslama mámleket boylap biypul oqıw kursları hám resurslarini usınıs etedi, bunda kompyuterdiń tiykarǵı kónlikpeleri, internetten paydalanıw, onlayn qawipsizlik hám cifrlı baylanıs sıyaqlı jónelislerge itibar qaratıladı. Prezident Shavkat Mirziyoyev mámlekettiń ekonomikalıq rawajlanıwı hám zamanagóy dúnyada puqaralarina múmkinshiliklerin keńeytiw ushın cifrlı sawatlılıqtıń zárúrligini aytıp ótdi. Programma tálim mákemeleri hám texnologiya kompaniyaları menen sheriklikte ámelge asıriladı hám kelesi bes jıl ishinde millionlap Ózbekstanlıqlardı qamtıp alıw maqset etilgen.',
            ],
            'author_id' => 2,
            'cover_image' => 3
        ]);
    }
}
