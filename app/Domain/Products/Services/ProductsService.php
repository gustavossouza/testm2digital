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
        return $this->entities->orderBy('id', 'desc')->get();
    }

    public function create(array $request): Products
    {
        $product = $this->entities;
        $product->fill($request);
        $product->save();

        return $product;
    }

    public function update(Products $product, array $request): Products
    {
        $product->fill($request);
        $product->update();

        return $product;
    }

    public function delete(Products $product): Products
    {
        $product->delete();
        
        return $product;
    }
}