<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterIklan;

class MasterIklanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    MasterIklan::factory()->count(20)->create();
    }
}
