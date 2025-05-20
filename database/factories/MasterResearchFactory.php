<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterResearch>
 */
class MasterResearchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $price = $this->faker->randomFloat(2, 10000, 100000);
            $jumlah_penjualan = $this->faker->randomFloat(2, 100, 1000); 
            $keuntungan = $price * $jumlah_penjualan;

        return [
            'research_id' => Str::uuid(),
            'nama_toko' => generate_indonesian_product_name(), 
            // 'kategori_produk' => $this->faker->randomElement(['Elektronik', 'Pakaian', 'Makanan', 'Minuman']),
            'Deskripsi' => $this->faker->paragraphs(3, true),
            'alamat' => $this->faker->address(),
            'price' => $price,
            'rating' => $this->faker->randomFloat(2, 1, 5),
            'jumlah_penjualan' => $jumlah_penjualan,
            'jumlah_keuntungan' => $keuntungan
        ];
    }
}
