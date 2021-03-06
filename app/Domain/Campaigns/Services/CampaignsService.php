<?php

namespace App\Domain\Campaigns\Services;

use App\Domain\Campaigns\Entities\Campaigns;
use App\Domain\Products\Services\ProductsService;
use Illuminate\Database\Eloquent\Collection;

class CampaignsService
{
    private Campaigns $entities;

    public function __construct()
    {
        $this->entities = new Campaigns();
    }

    public function get(): Collection
    {
        return $this->entities
            ->with(['products', 'group'])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $request): Campaigns
    {
        $campaign = $this->entities;
        $campaign->fill($request);
        
        if ($campaign->save()) {
            $products = (new ProductsService())->getAllById($request['product_id']);
            $campaign->products()->attach($products);
        }

        return $campaign;
    }

    public function update(Campaigns $campaign, array $request): Campaigns
    {
        $campaign->fill($request);
        $campaign->update();

        return $campaign;
    }

    public function delete(Campaigns $campaign): Campaigns
    {
        $campaign->products()->update([
            'campaign_id' => null
        ]);
        $campaign->delete();
        
        return $campaign;
    }
}