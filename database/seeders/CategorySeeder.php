<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Ноутбуки',
            'alias' => 'laptops',
            'img' => '/img/Apple.jpg'
        ]);

        Category::create([
            'name' => 'Компьютеры',
            'alias' => 'desktops',
            'img' => '/img/msi_mag_infinite.jpg'
        ]);

        Category::create([
            'name' => 'Мониторы',
            'alias' => 'monitors',
            'img' => '/img/monitor_acer_ek240ycbi.jpg'
        ]);

        Category::create([
            'name' => 'Клавиатуры',
            'alias' => 'keyboards',
            'img' => '/img/keyboard_logitech_gpro.jpg'
        ]);

        Category::create([
            'name' => 'Мыши',
            'alias' => 'mouses',
            'img' => '/img/mouse_razer_deathadder.jpg'
        ]);
    }
}
