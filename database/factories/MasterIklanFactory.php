<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MasterProduk;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterIklan>
 */
class MasterIklanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_iklan' => Str::uuid(),
            'id_produk' => MasterProduk::inRandomOrder()->first()?->produk_id ?? MasterProduk::factory(),
            'nama_campaign' => $this->faker->sentence(),
            'durasi_campaign' => $this->faker->randomElement(['1 minggu', '2 minggu', '3 minggu', '4 minggu', '5 minggu']),
            'tanggal_mulai' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'harga_iklan' => $this->faker->randomFloat(2, 10000, 100000),
            'bidding_iklan' => $this->faker->randomFloat(2, 5000, 90000),
            'tanggal_selesai' => $this->faker->dateTimeBetween('+1 day', '+1 year'),
            'ctr_target' => $this->faker->randomNumber(2),
            'ctr_persen_target' => $this->faker->randomFloat(2, 0, 100),
            'crt_target' => $this->faker->randomNumber(2),
            'cr_persen_target' => $this->faker->randomFloat(2, 0, 100),
            'roas_target' => $this->faker->randomFloat(2, 0, 100),
            'roas_bep' => $this->faker->randomFloat(2, 0, 100),
            'ctr_update' => $this->faker->randomNumber(2),
            'ctr_persen_update' => 0,
            'cr_update' => 0,
            'cr_persen_update' => 0,
            'roas_update' => 0,
        ];
    }
}
