<?php

namespace App\Domain\Groups\Services;

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
        return $this->entities->all();
    }

    public function create(array $request): Groups
    {
        $group = $this->entities;
        $group->fill($request);
        $group->save();

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
        $group->delete();
        
        return $group;
    }
}