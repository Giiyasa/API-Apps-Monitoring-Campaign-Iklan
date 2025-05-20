<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterProduk>
 */
class MasterProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'produk_id' => Str::uuid(),
            'nama_produk' => generate_indonesian_product_name(), 
            'kategori_produk' => $this->faker->randomElement(['Elektronik', 'Pakaian', 'Makanan', 'Minuman']),
            'sell_price' => $this->faker->randomFloat(2, 10000, 100000),
            'cogs_price' => $this->faker->randomFloat(2, 5000, 90000),
        ];
    }
}
