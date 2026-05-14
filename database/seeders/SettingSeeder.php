<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder {
    public function run(): void {
        DB::table('settings')->insert([
            ['key' => 'contact_phone', 'value' => '+7 (999) 123-45-67', 'type' => 'string', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_email', 'value' => 'info@pcrepair.ru', 'type' => 'string', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_address', 'value' => 'г. Ижевск, ул. Пушкина, д. 123', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'seo_title', 'value' => 'Ремонт Компьютеров | Ижевск', 'type' => 'string', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'seo_description', 'value' => 'Профессиональный ремонт компьютеров и ноутбуков.', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}