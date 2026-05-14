<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder {
    public function run(): void {
        DB::table('articles')->insert([
            [
                'title' => 'SSD или HDD: что выбрать в 2026 году?',
                'slug' => 'ssd-ili-hdd-chto-vybrat',
                'preview_text' => 'Сравниваем типы накопителей и помогаем определиться с выбором.',
                'content' => 'SSD работает в разы быстрее HDD и не боится ударов, так как не имеет движущихся частей. HDD дешевле и подходит для хранения больших архивов, но медленный и шумный. В 2026 году для системы и программ обязательно берите SSD — компьютер будет летать. HDD оставьте только под фильмы и бэкапы, если нужно много места за копейки.',                'image' => 'images/articles/ssd-vs-hdd.webp',
                'is_published' => true,
                'published_at' => now(),
                'views' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}