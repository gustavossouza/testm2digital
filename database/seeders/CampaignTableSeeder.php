<?php

namespace Database\Seeders;

use App\Domain\Campaign\Entities\Campaign;
use App\Domain\Campaigns\Entities\Campaigns;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignTableSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaigns::factory()->count(50)->create();
    }
}
