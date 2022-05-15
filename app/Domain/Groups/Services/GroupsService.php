<?php

namespace App\Domain\Groups\Services;

use App\Domain\Cities\Services\CitiesService;
use App\Domain\Groups\Entities\Groups;
use Illuminate\Database\Eloquent\Collection;

class GroupsService
{
    private Groups $entities;

    public function __construct()
    {
        $this->entities = new Groups();
    }

    public function get(): Collection
    {
        return $this->entities->with(['campaign','cities'])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $request): Groups
    {
        $group = $this->entities;
        $group->fill($request);
        $group->save();

        (new CitiesService())->likeCampaign($request['city_id'], $group->id);

        return $group;
    }

    public function update(Groups $group, array $request): Groups
    {
        $group->fill($request);
        $group->update();

        return $group;
    }

    public function delete(Groups $group): Groups
    {
        $group->cities()->update([
            'group_id' => null
        ]);
        $group->delete();
        
        return $group;
    }
}