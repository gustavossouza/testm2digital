<?php

namespace Database\Seeders;

use App\Domain\Discounts\Entities\Discounts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountsTableSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discounts::factory()->count(50)->create();
    }
}
