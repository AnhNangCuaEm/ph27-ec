<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daikon = new Product;
        $daikon->name = 'だいこん';
        $daikon->price = 200;
        $daikon->stock = 50;
        $daikon->image = '/product-images/daikon.png';
        $daikon->save();

        $ninjin = new Product;
        $ninjin->name = 'にんじん';
        $ninjin->price = 80;
        $ninjin->stock = 50;
        $ninjin->image = '/product-images/ninjin.png';
        $ninjin->save();

        $kabocha = new Product;
        $kabocha->name = 'かぼちゃ';
        $kabocha->price = 300;
        $kabocha->stock = 50;
        $kabocha->image = '/product-images/kabocha.png';
        $kabocha->save();
    }
}
