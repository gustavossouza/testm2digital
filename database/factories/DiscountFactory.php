<?php

namespace Database\Factories;

use App\Domain\Campaigns\Entities\Campaigns;
use App\Domain\Discounts\Entities\Discounts;
use App\Domain\Products\Entities\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DiscountFactory extends Factory
{
    protected $model = Discounts::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => Products::inRandomOrder()->first(),
            'campaign_id' => Campaigns::inRandomOrder()->first(),
            'price' => $this->faker->numberBetween(1500, 6000)
        ];
    }
}
