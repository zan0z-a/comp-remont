<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder {
    public function run(): void {
        DB::table('services')->insert([
            [
                'title' => 'Чистка ноутбука от пыли',
                'slug' => 'chistka-noutbuka',
                'description' => 'Полная разборка и чистка системы охлаждения.',
                'full_description' => 'Профилактическая чистка. Разборка, удаление пыли, замена термопасты.',
                'price' => 1500.00,
                'image' => 'images/service/cleaning.webp',
                'is_active' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Установка Windows',
                'slug' => 'ustanovka-windows',
                'description' => 'Установка ОС и драйверов.',
                'full_description' => 'Чистая установка Windows 10/11. Драйверы и базовые программы.',
                'price' => 1200.00,
                'image' => 'images/service/windows.webp',
                'is_active' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}