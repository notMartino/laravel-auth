<?php

use Illuminate\Database\Seeder;
use App\Car;
use App\Brand;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Car::class, 30) -> make() -> each(function($car){
            $brands = Brand::inRandomOrder() -> first();
            $car -> brand() -> associate($brands);
            $car -> save(); 
        });
    }
}
