<?php

namespace App\Domain\Discounts\Services;

use App\Domain\Discounts\Entities\Discounts;
use Illuminate\Database\Eloquent\Collection;

class DiscountsService
{
    private Discounts $entities;

    public function __construct()
    {
        $this->entities = new Discounts();
    }

    public function get(): Collection
    {
        return $this->entities->with('campaign','product')
            ->get();
    }

    public function create(array $request): Discounts
    {
        $city = $this->entities;
        $city->fill($request);
        $city->save();

        return $city;
    }

    public function update(Discounts $city, array $request): Discounts
    {
        $city->fill($request);
        $city->update();

        return $city;
    }

    public function delete(Discounts $city): Discounts
    {
        $city->delete();
        
        return $city;
    }
}