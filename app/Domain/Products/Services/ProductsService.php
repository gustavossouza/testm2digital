<?php

namespace App\Domain\Products\Services;

use App\Domain\Products\Entities\Products;
use Illuminate\Database\Eloquent\Collection;

class ProductsService
{
    private Products $entities;

    public function __construct()
    {
        $this->entities = new Products();
    }

    public function get(): Collection
    {
        return $this->entities->all();
    }

    public function create(array $request): Products
    {
        $city = $this->entities;
        $city->fill($request);
        $city->save();

        return $city;
    }

    public function update(Products $city, array $request): Products
    {
        $city->fill($request);
        $city->update();

        return $city;
    }

    public function delete(Products $city): Products
    {
        $city->delete();
        
        return $city;
    }
}