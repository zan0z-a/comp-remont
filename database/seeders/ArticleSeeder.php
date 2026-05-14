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
                'content' => '<h3>Скорость</h3><p>SSD работает в разы быстрее HDD.</p><h3>Надежность</h3><p>SSD не боится ударов.</p><h3>Итог</h3><p>Для системы бери SSD. Для архива подойдет HDD.</p>',
                'image' => 'images/articles/ssd.jpg',
                'is_published' => true,
                'published_at' => now(),
                'views' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}