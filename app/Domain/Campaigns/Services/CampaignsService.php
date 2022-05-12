<?php

namespace App\Domain\Campaigns\Services;

use App\Domain\Campaigns\Entities\Campaigns;
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
        return $this->entities->all();
    }

    public function create(array $request): Campaigns
    {
        $group = $this->entities;
        $group->fill($request);
        $group->save();

        return $group;
    }

    public function update(Campaigns $group, array $request): Campaigns
    {
        $group->fill($request);
        $group->update();

        return $group;
    }

    public function delete(Campaigns $group): Campaigns
    {
        $group->delete();
        
        return $group;
    }
}