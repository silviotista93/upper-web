<?php

use Illuminate\Database\Seeder;
use \App\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();

        $brand = new Brand;
        $brand->name = "Mazda";
        $brand->save();

        $brand = new Brand;
        $brand->name = "Mercedez";
        $brand->save();

        $brand = new Brand;
        $brand->name = "Renault";
        $brand->save();

        $brand = new Brand;
        $brand->name = "Ford";
        $brand->save();

        $brand = new Brand;
        $brand->name = "Kia";
        $brand->save();

        $brand = new Brand;
        $brand->name = "Hyundai";
        $brand->save();
    }

}
