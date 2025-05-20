<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MasterProduk;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailProduk>
 */
class DetailProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'produk_detail_id' => Str::uuid(),
            'id_produk' => MasterProduk::inRandomOrder()->first()?->produk_id ?? MasterProduk::factory(),
            'deskripsi' => $this->faker->paragraphs(3, true),
            'gambar' => $this->faker->imageUrl(),
        ];
    }
}
