<?php

namespace App\Domain\Products\Services;

use App\Domain\Campaigns\Entities\Campaigns;
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
        return $this->entities->orderBy('id', 'desc')->with('campaign')->get();
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

    public function likeCampaign(array $productIds, int $campaignId)
    {
        $products = $this->entities->whereIn('id', $productIds)
            ->update([
                'campaign_id' => $campaignId
            ]);
        return $products;
    }
}