<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Throwable;

class DefaultProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "name" => "Hleb",
                "description" => "Sava",
                "amount" => "100", // => Hash:make("adminadmin")
                "price" => "70"
            ],
            [
                "name" => "Mleko",
                "description" => "Kravica",
                "amount" => "20", // => Hash:make("adminadmin")
                "price" => "80"
            ],
            [
                "name" => "Kafa",
                "description" => "C",
                "amount" => "33", // => Hash:make("adminadmin")
                "price" => "111"
            ]
        ];
        $amount = count($products);

        foreach ($products as $product)
        {
            try {
                Product::create($product);
            } catch (Throwable $e) {
                $amount--;
            }
        }

        $this->command->getOutput()->info("Uspesno je kreirano $amount default proizvoda");
    }
}
