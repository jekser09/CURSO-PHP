<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->insert([
            ["name"=>"Laptop","price"=>3500000,"stock"=>20,"created_at"=>now(),"updated_at"=>now()],
            ["name"=>"Audifonos","price"=>487000,"stock"=>150,"created_at"=>now(),"updated_at"=>now()],
            ["name"=>"Teclado","price"=>135000,"stock"=>80,"created_at"=>now(),"updated_at"=>now()]
        ]);
    }
}
